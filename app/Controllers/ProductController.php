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
        $precio_max = $this->request->getGet('precio_max');
        $busqueda = $this->request->getGet('busqueda');

        // Pasar los valores de los parámetros a la vista
        $data['pais_origen'] = $pais_origen;
        $data['precio_max'] = $precio_max;
        $data['busqueda'] = $busqueda;

        // Construir consulta base
        $productos = $this->productModel->where('estado', 1);

        // Filtrar por país de origen
        if ($pais_origen) {
            $productos = $productos->where('pais_origen', $pais_origen);
        }

        // Filtrar por precio máximo
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

        // Obtener el precio máximo para el slider
        $maxPrecio = $this->productModel->selectMax('precio')->first()['precio'] ?? 100; // Valor por defecto si no hay productos
        $data['maxPrecio'] = $maxPrecio;

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