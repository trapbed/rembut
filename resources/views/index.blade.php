@extends('layouts.header')

@section('title', 'Главная')

@section('content')

    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <script>
                alert("{{$e}}");
            </script> 
        @endforeach
    @endif


    <div class="df fdr_r ali_c w80 h35 jc_spb">
        <img class="w20" src="{{asset('img/home-appliance.png')}}" alt="">
        <div class="df fdr_c g4 w50">
            <h1 class="ff_mr fsz_2">Верный помощник в пути</h1>
            <span class="ff_m lh_2 fsz_1">
                Если у вас случилась беда-беда, и что-то не работает-не работает. То вы попали куда надо. В самые короткие сроки к вам отправят мастера, который устранит вашу поломку и все будет good.
                <br>
                У нас имеется большое количество запчастей и расходного материала на складах. Также наши работники- профессионалы своего дела, которым вы можете доверить технику.
            </span>
        </div>
    </div>

    <div class="df fdr_c g1 w87">

        <h6 class="als_c lh_3 fsz_1_4 ff_mr c_dp">Мы чиним: </h6>
        <div class="slider">
            <div class="slides">
                @foreach ($products as $prod)
                    <div class="slide df jc_c">
                        <a href="exemplairs_page/{{$prod->id}}" class="w17 br_1 brc_lp df fdr_c g1 paa_1 td_n">
                            <span class="ff_m fsz_1 c_dp">{{$prod->name}}</span>
                            <div class="df h20 ali_c jc_c">
                                <img class="als_c w12" src="{{asset('img/products/'.$prod->image)}}" alt="">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <button class="df ali_c jc_c prev bg_dp w3 h3 circle"><img class="h2 t_r180" src="{{asset('img/arrow.png')}}" alt=""></button>
            <button class="df ali_c jc_c next bg_dp w3 h3 circle"><img class="h2" src="{{asset('img/arrow.png')}}" alt=""></button>
          </div>

          
        <div class="w90 h2"></div>

        
    </div>
    <script>
        const slides = document.querySelector('.slides');
        const prevButton = document.querySelector('.prev');
        const nextButton = document.querySelector('.next');

        let currentIndex = 0;

        prevButton.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateSlider();
        }
        });

        nextButton.addEventListener('click', () => {
        if (currentIndex < slides.children.length / 3 - 1) {
            currentIndex++;
            updateSlider();
        }
        });

        function updateSlider() {
        const offset = -currentIndex * 100;
        slides.style.transform = `translateX(${offset}%)`;
        }
    </script>
@endsection