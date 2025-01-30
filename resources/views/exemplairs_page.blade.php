@extends('layouts.header')

@section('title', $name)

@section('content')
<div class="df fdr_c g2 ali_c">

    <span class="w90 als_c ff_m fsz_1_4">{{$name}}</span>
    <span class="ff_m fsz_0_8 c_lg als_s">Всего: {{$count}}</span>
    
    <div class="df fdr_r w90 g10">

        @foreach ($exemplar as $exmp)
        <div class="w23 df fdr_c ali_c g1">
            <img class="h20" src="{{asset("img/exemplars/".$exmp->image)}}" alt="">
            <span class="fsz_1 ff_m">{{$exmp->name}}</span>
            <a href="{{route('pre_application', ['id'=>$exmp->id, 'id_prod'=>$id_prod])}}" class="bg_dp paa_0_8 c_w td_n ff_m fsz_0_8 br_1">Отправить заявку</a>
        </div>
        @endforeach
    </div>
    
    
    {{$exemplar->links()}}
    <div class="w90 h2"></div>
</div>

@endsection