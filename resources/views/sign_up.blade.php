@extends('layouts.header')

@section('title', 'Регистрация')

@section('content')

<div class="df fdr_c ali_c w90">
    <form class="w35 brc_db br_03 paa_1 df fdr_c g1" action="{{route('sign_up')}}" method="POST">
        @csrf
        <span class="lh_3 fsz_1_5 ff_mr c_dp als_c">Зарегистрируйтесь</span>
        <label class="df fdr_c g1 fsz_1 ff_mr c_dp" for="email">Имя
            <input class="paa_0_5 ou_n brc_lp ff_mr fsz_0_8 br_03" type="text" name="name" value="{{old('name')}}">
        </label>
        <label class="df fdr_c g1 fsz_1 ff_mr c_dp" for="email">Почта
            <input class="paa_0_5 ou_n brc_lp ff_mr fsz_0_8 br_03" type="email" name="email" value="{{old('email')}}">
        </label>
        <label class="df fdr_c g1 fsz_1 ff_mr c_dp" for="pass">Пароль
            <input class="paa_0_5 ou_n brc_lp ff_mr fsz_0_8 br_03" type="password" name="pass" value="{{old('pass')}}">
        </label>
        <input class="btn_lp_dp ou_n w6 paa_1 ff_m br_03 als_e" type="submit" value="Войти">
        <span class="als_c ff_mr fsz_0_8">Уже есть аккаунт? <a href="{{route('sign_in_show')}}">Войдите!</a></span>
    </form>
    @if ($errors->any())
        <div class="pos_r">
            <div class="t_m_4 l_20 pos_a w24 ">
                    <ul class="paa_1 df fdr_c g1 ls_n fsz_0_8">
                        @foreach ($errors->all() as $e)
                            <li class="paa_1 bg_lp br_03 c_dp ff_mr fsz_0_8">{{$e}}</li>
                        @endforeach
                        
                    </ul>
                    
                </div>
            </div>
        @endif
</div>



@endsection