
@extends('front.layout')

@section('content')
    @include('front.includes.slider')
    <!-- slider_area_end -->

    <div class="best_burgers_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-80">
                        <span>Бургерное Меню</span>
                        <h3>Лучшие Бургеры</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($hitMenu as $hit)
                    <div class="col-12 col-sm-12  col-md-6 col-lg-6 ">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="{{ $hit->image }}" alt="" style="width: 166px; height: 166px;">
                            </div>
                            <div class="info">
                                <h3>{{ $hit->name }}</h3>
                                <p>{{ $hit->description }}</p>
                                <div style="display: flex;justify-content: space-around;">
                                    <span>{{ $hit->prise }}₽</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="iteam_links">
                        <a class="boxed-btn5" href="/menu">Полное Меню</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- features_room_startt -->
    <div class="Burger_President_area">
        <div class="Burger_President_here">
            <div class="single_Burger_President">
                <div class="room_thumb">
                    <img src="front/img/burgers/1.webp" alt="">
                    <div class="room_heading d-flex justify-content-between align-items-center">
                        <div class="room_heading_inner">
                            <span>650₽</span>
                            <h3>Бургер Президент</h3>
                            <a href="contact.php" class="boxed-btn3">Заказать</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="single_Burger_President">
                <div class="room_thumb">
                    <img src="front/img/burgers/2.webp" alt="">
                    <div class="room_heading d-flex justify-content-between align-items-center">
                        <div class="room_heading_inner">
                            <span>590₽</span>
                            <h3>Бургер Первая Леди</h3>
                            <a href="contact.php" class="boxed-btn3">Заказать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- features_room_end -->
    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="about_thumb2">
                        <div class="img_1">
                            <img src="front/img/about/1.webp" alt="">
                        </div>
                        <div class="img_2">
                            <img src="front/img/about/2.webp" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 offset-lg-1 col-md-6">
                    <div class="about_info">
                        <div class="section_title mb-20px">
                            <span>О нас</span>
                            <h3>BURGER</h3>
                        </div>
                        <p>  — это сеть бургер-баров, где мы делаем бургеры из отличного мяса по оригинальным рецептам и продаём их по максимально демократичным ценам.<br>
                            Наша миссия — Расширять гастрономические горизонты день за днем.
                            Менять ресторанную индустрию в сторону честности и простоты.
                            Быть надежным другом каждому.</p>
                        <div class="img_thumb">
                            <img src="front/img/jessica-signature.webp" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->
    <!-- video_area_start -->
    <div class="video_area video_bg overlay">
        <div class="video_area_inner text-center">
            <h3>Бургер Бойз</h3>
            <span>Узнай как мы делаем вкусные бургеры</span>
            <div class="video_payer">
                <a href="https://www.youtube.com/watch?v=T_dHSP9s1BY" class="video_btn popup-video">
                    <i class="fa fa-play"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- video_area_end -->

    <!-- testimonial_area_start  -->
    <div class="testimonial_area ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-60 text-center">
                        <span>Отзывы</span>
                        <h3>Довольные клиенты</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <p>Всё очень вкусно!)) Обслуживание прекрасное! Обслуживал Максим, очень приятно всё было, порекомендовал бургеры с учётом всех пожеланий!) Очень понравилось) хотелось бы, чтобы обслуживание и дальше оставалось на уровне как и кухня!) А официанты заслуживали поощрения🤗😊😊😊</p>
                                        <div class="testmonial_author">
                                            <div class="thumb">
                                                <img src="front/img/testmonial/1.png" alt="">
                                            </div>
                                            <h4>Кристина</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <p>Очень вкусные, сочные бургеры с натуральной котлетой и крутой подачей, персонал приветливый и отзывчивый. Очень понравились бургер Ракета, котлета супер сочная так и тает во рту, а барное меню так и радует соим выбором.</p>
                                        <div class="testmonial_author">
                                            <div class="thumb">
                                                <img src="front/img/testmonial/2.png" alt="">
                                            </div>
                                            <h4>Кирилл</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <p>Приходил с подругой. Хочу отметить, что сервис в данном заведении на уровне, очень вкусные блюда, внимательные официанты. Все очень понравилось. Обязательно придём снова!</p>
                                        <div class="testmonial_author">
                                            <div class="thumb">
                                                <img src="front/img/testmonial/3.png" alt="">
                                            </div>
                                            <h4>Алекс</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial_area_ned  -->

    <!-- instragram_area_start -->
    <div class="instragram_area d-none d-xl-block d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 col-md-6 ">
                    <div class="single_instagram">
                        <img src="front/img/instragram/1.webp" alt="">
                        <div class="ovrelay">
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 col-md-6">
                    <div class="single_instagram">
                        <img src="front/img/instragram/2.webp" alt="">
                        <div class="ovrelay">
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 col-md-6">
                    <div class="single_instagram">
                        <img src="front/img/instragram/3.webp" alt="">
                        <div class="ovrelay">
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 col-md-6">
                    <div class="single_instagram">
                        <img src="front/img/instragram/4.webp" alt="">
                        <div class="ovrelay">
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- instragram_area_end -->
@endsection

