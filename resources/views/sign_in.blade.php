@extends('layouts.header')

@section('title', 'Авторизация')

@section('content')

<div class="df fdr_c ali_c w90">
    <form class="w35 brc_db br_03 paa_1 df fdr_c g1" action="" method="POST">
        @csrf
        <span class="lh_3 fsz_1_5 ff_mr c_dp als_c">Войдите в аккаунт</span>
        <label class="df fdr_c g1 fsz_1 ff_mr c_dp" for="email">Почта
            <input class="paa_0_5 ou_n brc_lp ff_mr fsz_0_8 br_03" type="email" name="email">
        </label>
        <label class="df fdr_c g1 fsz_1 ff_mr c_dp" for="pass">Пароль
            <input class="paa_0_5 ou_n brc_lp ff_mr fsz_0_8 br_03" type="password" name="pass">
        </label>
        <input class="btn_lp_dp ou_n w6 paa_1 ff_m br_03 als_e" type="submit" value="Войти">
        <span class="als_c ff_mr fsz_0_8">Еще нет аккаунта? <a href="{{route('sign_up_show')}}">Зарегистрируйтесь!</a></span>
    </form>
</div>

@endsection