<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $productModel = new ProductModel();
        $data['productos'] = $productModel->findAll();

        return view('productos/catalogo', $data);
    }

    public function detalle($id)
    {
        $productModel = new ProductModel();
        $producto = $productModel->find($id);

        if (!$producto) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Producto no encontrado");
        }

        return view('productos/detalle', ['producto' => $producto]);
    }
}
