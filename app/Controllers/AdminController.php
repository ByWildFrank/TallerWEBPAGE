<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\OrdenModel;
use App\Models\ConsultaModel;

class AdminController extends Controller
{
    protected $productoModel;
    protected $consultaModel;

    public function __construct()
    {
        $this->productoModel = new ProductModel();
        $this->consultaModel = new ConsultaModel();
    }

    public function index()
    {
        return view('admin/panel');
    }

    public function productos()
    {
        $productos = $this->productoModel->findAll();
        return view('admin/productos', ['productos' => $productos]);
    }


    public function guardar()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'estado' => 'required|in_list[0,1]',
            'pais_origen' => 'required',
            'imagen' => 'uploaded[imagen]|is_image[imagen]|max_size[imagen,4096]' // Máximo 4MB
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/admin/productos')->withInput()->with('error', $validation->listErrors());
        }

        $file = $this->request->getFile('imagen');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . '../public/assets/img/Products/', $newName);
            $imagen = $newName;
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'stock' => $this->request->getPost('stock'),
            'estado' => $this->request->getPost('estado'),
            'imagen' => $imagen,
            'pais_origen' => $this->request->getPost('pais_origen'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->productoModel->insert($data);

        return redirect()->to('/admin/productos')->with('success', 'Producto agregado exitosamente');
    }

    public function usuarios()
    {
        $usuarioModel = new UserModel();
        $usuarios = $usuarioModel->findAll();
        return view('admin/usuarios', ['usuarios' => $usuarios]);
    }

    public function nuevoUsuario()
    {
        return view('admin/nuevo_usuario');
    }

    public function guardarUsuario()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|valid_email|is_unique[usuario.email]',
            'password' => 'required|min_length[6]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('error', implode('<br>', $validation->getErrors()));
        }

        $userModel = new UserModel();
        $userData = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'direccion' => $this->request->getPost('direccion'),
            'telefono' => $this->request->getPost('telefono'),
            'rol' => 'cliente', // No editable por admin
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $userModel->save($userData);

        return redirect()->to('/admin/usuarios')->with('success', 'Usuario creado exitosamente.');
    }

    public function editarUsuario($id)
    {
        $usuarioModel = new UserModel();
        $usuario = $usuarioModel->find($id);
        if (!$usuario) {
            return redirect()->to('/admin/usuarios')->with('error', 'Usuario no encontrado.');
        }
        return view('admin/editar_usuario', ['usuario' => $usuario]);
    }

    public function actualizarUsuario($id)
    {
        $usuarioModel = new UserModel();

        $rules = [
            'nombre'    => 'required',
            'apellido'  => 'required',
            'email'     => "required|valid_email",
            'direccion' => 'permit_empty',
            'telefono'  => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $data = [
            'nombre'    => $this->request->getPost('nombre'),
            'apellido'  => $this->request->getPost('apellido'),
            'email'     => $this->request->getPost('email'),
            'direccion' => $this->request->getPost('direccion'),
            'telefono'  => $this->request->getPost('telefono'),
        ];

        $usuarioModel->update($id, $data);

        return redirect()->to('/admin/usuarios')->with('success', 'Usuario actualizado correctamente.');
    }

    public function desactivarUsuario($id)
    {
        $usuarioModel = new UserModel();
        $usuarioModel->update($id, ['active' => 0]);
        return redirect()->to('/admin/usuarios')->with('success', 'Usuario desactivado.');
    }

    public function activarUsuario($id)
    {
        $usuarioModel = new UserModel();
        $usuarioModel->update($id, ['active' => 1]);
        return redirect()->to('/admin/usuarios')->with('success', 'Usuario reactivado.');
    }

    public function dashboard()
    {
        $ordenModel = new OrdenModel();
        $userModel = new UserModel();
        $productoModel = new ProductModel();

        $totalUsuarios = $userModel->countAll();
        $totalVentas = $ordenModel->where('estado', 'entregado')->countAllResults();

        // Ventas por mes
        $ventasPorMes = $ordenModel->select("MONTH(fecha_creacion) as mes, SUM(total) as total")
            ->where('estado', 'entregado')
            ->groupBy("MONTH(fecha_creacion)")
            ->orderBy("mes", "ASC")
            ->findAll();

        // Usuarios activos/inactivos
        $usuariosActivos = $userModel->where('active', 1)->countAllResults();
        $usuariosInactivos = $userModel->where('active', 0)->countAllResults();

        // Productos más vendidos (top 5)
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT p.nombre, SUM(od.cantidad) as total_vendido
            FROM orden_detalle od
            JOIN producto p ON p.id = od.producto_id
            GROUP BY p.nombre
            ORDER BY total_vendido DESC
            LIMIT 5
        ");
        $productosTop = $query->getResultArray();

        // Últimas órdenes (5 más recientes)
        $ordenesRecientes = $ordenModel->orderBy('fecha_creacion', 'DESC')->limit(5)->findAll();

        $productosStock = $productoModel->select('nombre, stock')->findAll();

        // Stock por estado
        $stockEstados = $productoModel->select("estado, COUNT(*) as cantidad")
            ->groupBy('estado')->findAll();



        return view('admin/dashboard', [
            'productosStock'    => $productosStock,
            'totalUsuarios'     => $totalUsuarios,
            'totalVentas'       => $totalVentas,
            'ventasPorMes'      => $ventasPorMes,
            'usuariosActivos'   => $usuariosActivos,
            'usuariosInactivos' => $usuariosInactivos,
            'productosTop'      => $productosTop,
            'ordenesRecientes'  => $ordenesRecientes,
            'stockEstados'      => $stockEstados,
            'noHero'            => true,
            'noFooter'          => true,
            'noEditorsChoice'   => true
        ]);
    }
    public function consultas()
    {
        $consultas = $this->consultaModel->select('consulta.*, usuario.nombre as usuario_nombre')
            ->join('usuario', 'usuario.id = consulta.usuario_id', 'left')
            ->orderBy('fecha', 'DESC')
            ->findAll();
        return view('admin/consultas', ['consultas' => $consultas]);
    }
    public function cambiarEstadoConsulta($id)
    {
        $consulta = $this->consultaModel->find($id);
        if (!$consulta) {
            return redirect()->to('/admin/consultas')->with('error', 'Consulta no encontrada.');
        }

        $nuevoEstado = $consulta['estado'] === 'pendiente' ? 'respondida' : 'pendiente';
        $this->consultaModel->update($id, ['estado' => $nuevoEstado]);

        return redirect()->to('/admin/consultas')->with('success', 'Estado de la consulta actualizado correctamente.');
    }
        public function editarProducto($id)
    {
        $producto = $this->productoModel->find($id);
        if (!$producto) {
            return redirect()->to('/admin/productos')->with('error', 'Producto no encontrado.');
        }

        return view('admin/productos', ['producto' => $producto]);
    }
    public function actualizarProducto($id)
{
    $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'precio' => 'required|numeric',
        'stock' => 'required|integer',
        'estado' => 'required|in_list[0,1]',
        'pais_origen' => 'required',
        'imagen' => 'permit_empty|is_image[imagen]|max_size[imagen,4096]'
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
    }

    $producto = $this->productoModel->find($id);
    if (!$producto) {
        return redirect()->to('/admin/productos')->with('error', 'Producto no encontrado.');
    }

    $imagen = $producto['imagen'];

    $file = $this->request->getFile('imagen');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move(WRITEPATH . '../public/assets/img/Products/', $newName);
        $imagen = $newName;
    }

    $data = [
        'nombre'       => $this->request->getPost('nombre'),
        'descripcion'  => $this->request->getPost('descripcion'),
        'precio'       => $this->request->getPost('precio'),
        'stock'        => $this->request->getPost('stock'),
        'estado'       => $this->request->getPost('estado'),
        'pais_origen'  => $this->request->getPost('pais_origen'),
        'imagen'       => $imagen
    ];

    $this->productoModel->update($id, $data);

    return redirect()->to('/admin/productos')->with('success', 'Producto actualizado exitosamente.');
}

}
