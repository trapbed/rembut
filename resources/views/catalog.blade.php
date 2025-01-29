@extends('layouts.header')

@section('title', 'Главная')

@section('content')
<?php $count = 0;?>
<div class="df fdr_c w90">
                <div class="df fdr_c">
    @foreach ($prods as $p)
        @foreach ($exe as $e)
            @if($e->product_id  == $p->id)
                    @if($count == 0 )
                        <h3 class="ff_ml fsz_1_2">{{$p->name }}</h3>
                    @endif

                    @if($count == 0)
                        {{$count}}
                        <div class="df fdr_r w90 jc_spb">
                    @endif
                    <div class="">
                        {{$count}}
                        {{$e->name}}
                    </div>
                    @if($count%3 == 0 && $count!= 0)
                        </div>
                        <div class="df fdr_r w90 jc_spb">
                        {{$count}}
                    @endif
                    <?php $count++; ?>
                
            <br>
            @endif
        @endforeach
        <?php $count = 0; ?>
    @endforeach</div>
</div>
@endsection