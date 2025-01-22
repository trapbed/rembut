@extends('layouts.header')

@section('title', $name)

@section('content')
<div class="df fdr_c g2">

    <span class="w96 als_c ff_m fsz_1_4">{{$name}}</span>
    <span class="ff_m fsz_0_8 c_lg">Всего: {{$count}}</span>
    
    <div class="df fdr_r w87 jc_spb">

        @foreach ($exemplar as $exmp)
        <div class="w30 df fdr_c ali_c g1">
            <img class="h20" src="{{asset("img/exemplars/".$exmp->image)}}" alt="">
            <span class="fsz_1 ff_m">{{$exmp->name}}</span>
            <a href="" class="bg_dp paa_0_8 c_w td_n ff_m fsz_0_8 br_1">Отправить заявку</a>
        </div>
        @endforeach
    </div>
    
    
    {{$exemplar->links()}}
</div>

@endsection