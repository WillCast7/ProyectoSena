<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Http\Request;

class ProfileController extends Controller{
    
    public function getProfile(Request $request,$persona_id){

        if( session()->get('persona_id') != null ){
            echo "<h1>usted inicio sesion</h1>";
        }

        // // productos
        $persona = Persona::find($persona_id);
        // echo "<pre>";
        // print_r($persona);


        // $products = new ProductsController();
        // $listProducts = $products->get();
        // // categorias
        // $categories = new CategoriesController();
        // $categoriesArray = $categories->get();
        // // data - vista
        $data = [];

        // $data['categories']     = $categoriesArray;
        // $data['products']       = $listProducts;
        return view('theme-ecommerce.profile',$persona);
    }
}
