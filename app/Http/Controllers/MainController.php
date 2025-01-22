<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Exemplar;
use Illuminate\Http\Request;


class MainController extends Controller
{
    //

    public function index(){
        $products = Product::select('*')->get();
        return view('index', ['products'=>$products]);
    }

    public function exemplairs_page($id){
        $product_name = Product::select('name')->where('id', '=', $id)->get()[0]->name;
        $exemplar = Exemplar::select('*')->where('product_id', '=', $id)->simplePaginate(3);
        $count = Exemplar::select('*')->where('product_id', '=', $id)->count();
        return view('exemplairs_page', ['exemplar'=>$exemplar, 'name'=>$product_name, 'count'=>$count]);
    }
}
