@extends('layouts.header')

@section('title', 'Главная')

@section('content')
<?php $count = 1;?>
<div class="df fdr_c w90">
    <div class="df fw_w w90">
    @foreach ($prods as $p)
        @foreach ($exe as $e)
            @if($e->product_id  == $p->id)
                {{--@if ($count%3 == 1)
                    <div class="df fdr_r jc_spb w90 bg_y">
                @endif--}}
                    @if ($count == 1) 
                        <span class="w90 fsz_1_2 ff_mr lh_3">{{$p->name}}</span>
                        <br>
                    @endif
                    <div class="df ali_c jc_c w30 h28">
                        <div class=" df fdr_c ali_c jc_spb w17 h22 brc_lp br_03 paa_1">
                            <div class="w8">
                                <img class="w8" src="{{asset('img/exemplars/'.$e->image)}}" alt="">
                            </div>
                            <div class="df fdr_c ali_c g1">
                                <span class="ff_mr fsz_1">{{$e->name}}</span>
                                <a href="{{route('pre_application', ['id'=>$e->id, 'id_prod'=>$p->id])}}" class="bg_dp paa_0_8 c_w td_n ff_m fsz_0_8 br_1">Отправить заявку</a>
                            </div>

                        </div>
                    </div>
                    @if ($count%3 == 0)
                        <br>
                    @endif 
                    
                    <?php $count++; ?>
            @endif
        @endforeach
        <?php $count = 1; ?>
    @endforeach
    </div>
</div>
@endsection