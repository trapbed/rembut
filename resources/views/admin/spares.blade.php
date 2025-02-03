@extends('admin.header')

@section('title', 'Детали')

@section('content')
    <table class="fsz_0_8 ff_mr">
        <thead>
            <tr>
                <th class="w3 ta_s">ID</th>
                <th class="w20 ta_s">Название</th>
                <th class="w7 ta_s">В наличии (шт)</th>
                <th class="w20 ta_s">Производитель</th>
                <th class="w20 ta_s">К продукту</th>
                <th class="w10 ta_s">Вес детали (гр)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($spares as $spare)
                <tr>
                    <td class="w3">{{$spare->spare_id}}</td>
                    <td class="w20">{{$spare->spare_name}}</td>
                    <td class="w7">{{$spare->amount}}</td>
                    <td class="w20">{{$spare->manafacturer}}</td>
                    @if ($spare->exe == 'Все')
                        <td class="w20">{{$spare->exe}}</td>
                    @else
                        <td class="w20">{{$spare->prod}} ({{$spare->exe}})</td>
                    @endif
                    <td class="w10">{{$spare->weight}}</td>
                </tr>
            @endforeach            
        </tbody>
    </table>
    {{$spares->links()}}
@endsection