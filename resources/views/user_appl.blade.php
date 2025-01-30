@extends('layouts.header')

@section('title', 'Регистрация')
@section('content')
    <div class="w90 df fdr_c g1 c_dp">
        <h1 class="fsz_1 ff_ml fsz_1_5">Мои заявки</h1>
        @if ($count == 0)
            <div class="w90 ff_mr fsz_1_2">У вас нет заявок</div>
        @else
            @foreach ($appls as $appl)
                <?php
                    $month = substr($appl->date, 5, 2);
                    $time = substr($appl->date, 11, 5);
                    switch ($month) {
                        case "01":
                            $month = "Январь";
                            break;
                        case "02":
                            $month = "Февраль";
                            break;
                        case "03":
                            $month = "Март";
                            break;
                        case "04":
                            $month = "Апрель";
                            break;
                        case "05":
                            $month = "Май";
                            break;
                        case "06":
                            $month = "Июнь";
                            break;
                        case "07":
                            $month = "Июль";
                            break;
                        case "08":
                            $month = "Август";
                            break;
                        case "09":
                            $month = "Сентябрь";
                            break;
                        case "10":
                            $month = "Октябрь";
                            break;
                        case "11":
                            $month = "Ноябрь";
                            break;
                        case "12":
                            $month = "Декабрь";
                            break;
                        default:
                            $month ;
                            break;
                    }
                ?>
                <div class="df fdr_c g1 br_03 brc_lp paa_1 w20">
                    <span class="ff_m fsz_1">Заявка № {{$appl->appl_id}}</span>
                    <div class="df fdr_r g1">
                        <div class="fsz_0_8 ff_mr c_dp w6">Ремонт: </div>
                        <span class="fsz_0_8 ff_mr c_dp">{{$appl->prod}} ({{$appl->exe}})</span>
                    </div>
                    <div class="df fdr_r g1">
                        <div class="fsz_0_8 ff_mr c_dp w6">Дата и время: </div>
                        <span class="fsz_0_8 ff_mr c_dp">{{substr($appl->date, 8, 2)}} {{$month}} {{substr($appl->date, 0, 4)}}, {{$time}}</span>
                    </div>
                    <div class="df fdr_r g1">
                        <div class="fsz_0_8 ff_mr c_dp w6">Адрес: </div>
                        <span class="fsz_0_8 ff_mr c_dp">{{$appl->place}}</span>
                    </div>
                    <div class="df fdr_r g1">
                        <div class="fsz_0_8 ff_mr c_dp w6">Ваш тф: </div>
                        <span class="fsz_0_8 ff_mr c_dp">{{$appl->phone}}</span>
                    </div>
                    <div class="df fdr_r g1">
                        <div class="fsz_0_8 ff_mr c_dp w6">Статус: </div>
                        <span class="fsz_0_8 ff_mr c_dp">{{$appl->status}}</span>
                    </div>
                    {{--dd($appl)--}}
                </div>
            @endforeach
        @endif
    </div>

    {{$appls->links()}}
@endsection