<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends Controller
{
public function index()
{
    $productModel = new ProductModel();

    $data['productos'] = $productModel
        ->where('estado', 1)
        // ->where('stock >', 0)
        ->findAll();

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

        return view('productos/detalle', ['producto' => $producto]);
    }
}
