<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Product;
use App\Models\Exemplar;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
    //

    public function index(){
        $products = Product::select('*')->get();
        return view('index', ['products'=>$products]);
    }

    public function catalog(){
        $exemplars = Exemplar::select('*')->where('name', '!=', 'Все')->get();
        $prods = Product::select('*')->get();
        return view('catalog', ['exe'=>$exemplars, 'prods'=>$prods]);
    }
    
    public function exemplairs_page($id){
        $product = Product::select('id', 'name')->where('id', '=', $id)->get();
        $exemplar = Exemplar::select('*')->where('product_id', '=', $id)->simplePaginate(3);
        $count = Exemplar::select('*')->where('product_id', '=', $id)->count();
        return view('exemplairs_page', ['exemplar'=>$exemplar,'id_prod'=>$product[0]->id, 'name'=>$product[0]->name, 'count'=>$count]);
    }

    public function pre_application($id, $id_prod){
        $exemplar = Exemplar::select('*')->where('id', '=', $id)->get()[0];
        $prod = Product::select('*')->where('id','=',$id_prod)->get()[0];
        return view('pre_application', ['exe'=>$exemplar, 'prod'=>$prod]);
    }

    public function send_application(Request $request){
        $data = [
            'phone'=>$request->phone,
            'type'=>$request->type,
            'date'=>$request->date,
            'place'=>$request->place,
        ];
        $rule = [
            'phone'=>['required','regex:/^(\+7|8)[0-9]{10}$/'],
            'type'=>'required|min:10',
            'date'=>'required',
            'place'=>'required|min:10',
        ];
        $mess = [
            'phone.required'=>'Укажите номер телефона!',
            'phone.regex'=>'Введите корректный номер телефона!',
            'type.required'=>'Опишите проблему!',
            'type.min'=>'Минимальная длина поля типа проблемы- 10 символов',
            'date.required'=>'Дата визита обязательна!',
            'place.required'=>'Введите адрес!',
            'place.min'=>'Минимальная длина поля адрес- 10 символов!',
        ];
        $validate = Validator::make($data, $rule, $mess);
        if($validate->fails()){
            return redirect()->route('pre_application', ['id'=>$request->exemplar_id, 'id_prod'=>$request->product_id])->withErrors($validate)->withInput();
        }
        else{
            $appl = Application::insert([
                'user_id'=>$request->user_id,
                'product_id'=>$request->product_id,
                'exemplar_id'=>$request->exemplar_id,
                'phone'=>$request->phone,
                'type'=>$request->type,
                'date'=>$request->date,
                'place'=>$request->place,
            ]);
            if($appl){
                return redirect()->route('index')->withErrors(['er'=>'Заявка отправлена!']);
            }
            else{
                return redirect()->route('index')->withErrors(['er'=>'Не удалось отправить заявку!']);
            }
        }
    }
}
