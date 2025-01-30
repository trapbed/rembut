@extends('layouts.header')

@section('title', $prod->name.' > '.$exe->name)

@section('content')




{{--dd(date('d-m-Y h:i:s'), $prod, $exe);--}}
<div class="df fdr_r g1 w90 ff_m jc_spb">
    <div class="df fdr_c g1 c_dp">
        <h3 class="fsz_1_5">Заявка на вызов мастера</h3>
        <span class="fsz_1_2">Техника: {{$prod->name}} ({{$exe->name}})</span>
        @auth
            <form action="{{route('send_application')}}" method="POST" class="df fdr_c g1">
                @csrf
                <input required type="hidden" name="user_id" value="{{isset(Auth::user()->id) ? Auth::user()->id : '1'}}">
                <input required type="hidden" name="product_id" value="{{$prod->id}}">
                <input required type="hidden" name="exemplar_id" value="{{$exe->id}}">


                <label for="phone" class="df fdr_c g0_5 fsz_0_8">Телефонный номер <span class="fsz_0_6">(с вами свяжется мастер)</span>
                    <input value="{{old('phone')}}" required type="text" name="phone" class="paa_0_5 brc_lp br_03 ou_n">
                </label>
                <label for="type" class="df fdr_c g0_5 fsz_0_8">Тип проблемы
                    <input value="{{old('type')}}" required type="text" name="type" class="paa_0_5 brc_lp br_03 ou_n">
                </label>
                <label for="date" class="df fdr_c g0_5 fsz_0_8">Дата визита
                    <input value="{{old('date')}}" required type="datetime-local" name="date" class="paa_0_5 brc_lp br_03 ou_n" min="{{date('Y-m-d h:i')}}">
                </label>
                <label for="place" class="df fdr_c g0_5 fsz_0_8">Адрес
                    <input value="{{old('place')}}" required type="text" name="place" class="paa_0_5 brc_lp br_03 ou_n">
                </label>
                <input type="submit" class="paa_0_5 fsz_1 btn_lp_dp w10 ou_n br_03" value="Отправить">
            </form>
        @endauth

        @guest
            <span>Зарегистрируйтесь для вызова мастера</span>
        @endguest
    </div>
    @if ($errors->any())
    
    <div class="pos_r">
        <div class="t_25 l_20 pos_a w24">
            <ul class="paa_1 df fdr_c g1 ls_n fsz_0_8">
                
                @foreach ($errors->all() as $e)
                    {{-- <script>
                        alert("{{$e}}");
                    </script> --}}
                    <li class="paa_1 bg_lp br_03 c_dp">{{$e}}</li>
                @endforeach
                
            </ul>
            
        </div>
    </div>
    @endif
    <img class="w20" src="{{asset("img/exemplars/".$exe->image)}}" alt="{{$prod->name}}">
</div>
{{-- 29-01-2025 07:19:29 --}}
@endsection