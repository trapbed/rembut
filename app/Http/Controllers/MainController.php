<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Application;
use App\Models\Product;
use App\Models\Exemplar;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


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

    public function sign_in(Request $request){
        $user_exist = User::select('*')->where('email', '=', $request->email)->exists();
        if($user_exist){
            $user = User::select('id','password')->where('email', '=', $request->email)->get();
            if(Hash::check($request->pass, $user[0]->password)){
                Auth::login(User::find($user[0]->id));
                if(Auth::user()->role == 'admin'){     
                    return redirect()->route('admin_index')->withErrors(['mess'=>'Вы вошли в аккаунт!']);
                }
                else{
                    return redirect()->route('index')->withErrors(['mess'=>'Вы вошли в аккаунт!']);
                }
            }
            else{
                return redirect()->back()->withErrors(['mess'=>'Неверный пароль!'])->withInput();
            }
        }
        else{
            return redirect()->route('sign_in_show')->withErrors(['mess'=>'Такого пользователя нет, зарегистрируйтесь!'])->withInput();
        }
    }

    public function sign_up(Request $request){
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'pass'=>$request->pass,
        ];
        $rule = [
            'name'=>['required','min:2','regex:/^[А-ЯЁA-Z][а-яёa-z]*$/u'],
            'email'=>['required', 'email','unique:users'],
            'pass'=>['required', 'min:6','regex:/^[a-zA-Z0-9_]+$/'],
        ];
        $mess = [
            'name.required'=>'Заполните имя!',
            'name.min'=>'Длина имени должна быть не меньше двух символов!',
            'name.regex'=>'Имя должно начинаться с заглавной буквы!',
            'email.required'=>'Заполните почту!',
            'email.email'=>'Неверный формат почты!',
            'email.unique'=>'Такая почта уже используется!',
            'pass.required'=>'Ввелите пароль!',
            'pass.min'=>'Длина пароля: не менее 6-ти симолов!',
            'pass.regex'=>'Пароль может содержать только латиницу и цифры!',
        ];
        $validate = Validator::make($data, $rule, $mess);
        if($validate->fails()){
            return redirect('sign_up')->withErrors($validate)->withInput();
        }
        else{
            $create_user = User::insert([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->pass)
            ]);
            if($create_user){
                Auth::login(User::find(User::select('id')->where('email', '=', $request->email)->get()[0]->id));
                return redirect()->route('index')->withErrors([
                    'success'=>'Успешная регистрация!'
                ]);
            }
            else{
                return redirect()->back()->withErrors(['unsuccess'=>'Не удалось зарегистрироваться!'])->withInput();
            }
        }
    }

    public function user_appl(){
        $appls = DB::table('applications')->select( '*','applications.id as appl_id','exemplars.name as exe', 'products.name as prod')->where('user_id', '=', Auth::user()->id)->join('products', 'products.id', '=', 'applications.product_id')->join('exemplars', 'exemplars.id', '=', 'applications.exemplar_id')->simplePaginate(2);
        return view('user_appl', ['appls'=>$appls, 'count'=>$appls->count()]);
    }

    public function admin_index($where=null){
        if($where == 'yes'){
            $appls = DB::table('applications')->select( '*','applications.id as appl_id','exemplars.name as exe', 'products.name as prod')->where('status','=','Отправлена')->join('products', 'products.id', '=', 'applications.product_id')->join('exemplars', 'exemplars.id', '=', 'applications.exemplar_id')->simplePaginate(2);
        }
        else{
            $appls = DB::table('applications')->select( '*','applications.id as appl_id','exemplars.name as exe', 'products.name as prod')->join('products', 'products.id', '=', 'applications.product_id')->join('exemplars', 'exemplars.id', '=', 'applications.exemplar_id')->simplePaginate(2);
        }
        return view('/admin/index', ['appls'=>$appls, 'count'=>$appls->count()]);
    }

    public function ch_status(Request $request){
        $ch_status = Application::where('id','=',$request->appl_id)->update([
            'status'=>$request->status
        ]);
        if($ch_status){
            return redirect()->back()->withErrors(['mess'=>'Статус изменен!']);
        }
        else{
            return redirect()->back()->withErrors(['mess'=>'Не удалось изменить статус!']);
        }
    }
}
