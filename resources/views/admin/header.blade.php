<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    {{--dd(Auth::user())--}}
<div class="df fdr_c ali_c container w98_9vx">
    <div class="df fdr_r jc_c bg_db w98_9vx pos_f">
        <div class="w90 h4 df fdr_r ali_c g6 ">
            <a class="td_n c_w" href="{{route('admin_index')}}"><span class="logo ff_m fsz_1 hvr">Верный</span></a>
            <div class="w60  h6 df fdr_r ali_c jc_spb ff_m fsz_0_8">
                <div class="df fdr_r g4">
                    <a class="td_n c_w hvr" href="{{route('admin_index')}}">Заявки</a>
                    <a class="td_n c_w hvr" href="{{route('admin_index')}}">Детали</a>
                </div>
                
                <div class="df fdr_r g2 c_w">
                    <span>☎️ 8 (999) 345 - 12 -14 </span>
                    <span>📍 Уфа, Кирова 65</span>
                </div>
                
            </div>
            <div class="w17 h6 df fdr_r ali_c g2 c_w ff_m">
                @guest
                    <a href="{{route('sign_in_show')}}" class="fsz_0_8 js_e hvr c_w td_n">Войти</a>
                    <a href="{{route('sign_up_show')}}" class="fsz_0_8 js_e hvr c_w td_n">Зарегистрироваться</a>
                @endguest

                @auth
                    <a class="c_w td_n ff_m fsz_0_8" class="td_n c_w fsz_1" href="{{route('sign_out')}}">Выйти</a>
                @endauth
            </div>
        </div>
    </div>
    <div class="w98_9vx h10"></div>
    @yield('content')
</div>
</body>
</html>
    @if ($errors->any())
    @foreach ($errors->all() as $e)
        <script>
            alert("{{$e}}");
        </script> 
    @endforeach
    @endif
