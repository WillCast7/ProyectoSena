<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ecommerce\CategoriesModel;
use App\Http\Controllers\Ecommerce\ProductsController;

class CategoriesController extends Controller{
    
    public function get(){
        $result = CategoriesModel::get();

        $aux = "";
        $index = -1;
        $categoriesArray = [];
        foreach($result as $categorie){
            if($categorie->categoriapadre_nombre != $aux){
                $index++;
                $categoriesArray[$index] = array(
                    'categoria_id' => $categorie->categoriapadre_id,
                    'categoria_nombre'=>$categorie->categoriapadre_nombre,
                    'categoria_url'=>$categorie->categoriapadre_url
                );
                $categoriesArray[$index]['categorias_hijas'] = array();
                $categoriesArray[$index]['categorias_hijas'][] = array(
                    'categoria_id' => $categorie->categoria_id,
                    'categoria_nombre' => $categorie->categoria_nombre,
                    'categoria_url'   => $categorie->categoria_url
                );
                $aux = $categorie->categoriapadre_nombre;
            }else{
                $categoriesArray[$index]['categorias_hijas'][] = array(
                    'categoria_id' => $categorie->categoria_id,
                    'categoria_nombre' => $categorie->categoria_nombre,
                    'categoria_url'   => $categorie->categoria_url
                );
            }
        }
        return $categoriesArray;
    }

    public function shopCategories($category,$subCategory=null){

        // get category id
        $urlCategory = ($subCategory == null) ? $category : $category."/".$subCategory;

        $products = new ProductsController();
        $listProducts = $products->getByUrlCategory($urlCategory);

        // categorias
        $categories = new CategoriesController();
        $categoriesArray = $categories->get();

        // data - vista
        $data = [];
        $data['categories']     = $categoriesArray;
        $data['products']       = $listProducts;
        return view('shop',$data);

        // productos
        /* $products = new ProductsController();
        $listProducts = $products->getByCategory();
        // categorias
        $categories = new CategoriesController();
        $categoriesArray = $categories->get();
        // data - vista
        $data = [];
        $data['categories']     = $categoriesArray;
        $data['products']       = $listProducts;
        return view('shop',$data); */
    }

}
