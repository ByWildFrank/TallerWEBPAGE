<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends Controller
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data = [];

        // Obtener parámetros de filtrado y búsqueda
        $pais_origen = $this->request->getGet('pais_origen');
        $precio_min = $this->request->getGet('precio_min');
        $precio_max = $this->request->getGet('precio_max');
        $busqueda = $this->request->getGet('busqueda');

        // Pasar los valores de los parámetros a la vista
        $data['pais_origen'] = $pais_origen;
        $data['precio_min'] = $precio_min;
        $data['precio_max'] = $precio_max;
        $data['busqueda'] = $busqueda;

        // Construir consulta base
        $productos = $this->productModel->where('estado', 1);

        // Filtrar por país de origen
        if ($pais_origen) {
            $productos = $productos->where('pais_origen', $pais_origen);
        }

        // Filtrar por rango de precio
        if ($precio_min !== null) {
            $productos = $productos->where('precio >=', $precio_min);
        }
        if ($precio_max !== null) {
            $productos = $productos->where('precio <=', $precio_max);
        }

        // Buscar por nombre
        if ($busqueda) {
            $productos = $productos->like('nombre', $busqueda);
        }

        $data['productos'] = $productos->findAll();

        // Obtener lista de países para el filtro
        $data['paises'] = $this->productModel->distinct()->select('pais_origen')->findAll();

        // Indicadores para ocultar secciones del layout
        $data['noEditorsChoice'] = true;
        $data['noHero'] = true;

        return view('productos/catalogo', $data);
    }

    public function detalle($id)
    {
        $productModel = new ProductModel();
        $producto = $productModel->find($id);

        if (!$producto) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Producto no encontrado");
        }

        return view('productos/detalle', [
            'producto' => $producto,
            'noHero' => true,
            'noEditorsChoice' => true
        ]);
    }
}