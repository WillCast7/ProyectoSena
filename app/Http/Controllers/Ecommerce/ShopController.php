<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Ecommerce\ProductsController;
use App\Http\Controllers\Ecommerce\CategoriesController;
use Illuminate\Http\Request;

class ShopController extends Controller{
    
    public function getShop(Request $request){
        // productos
        $products = new ProductsController();
        $listProducts = $products->get();
        // categorias
        $categories = new CategoriesController();
        $categoriesArray = $categories->get();
        // data - vista
        $data = [];
        $data['categories']     = $categoriesArray;
        $data['products']       = $listProducts;
        return view('shop',$data);
    }
}
