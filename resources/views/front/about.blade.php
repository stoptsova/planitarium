@extends('front.layout')

@section('content')
@include('front.includes.bredcrumb')
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
                    <p>  — это сеть бургер-баров, где мы делаем бургеры из отличного мяса
                        по оригинальным рецептам и продаём их по максимально демократичным ценам.<br>
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

<!-- gallery_start -->
<div class="gallery_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-70 text-center">
                    <span>Галерея</span>
                    <h3>Аппетитные блюда</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="single_gallery big_img">
        <a class="popup-image" href="front/img/gallery/1.webp">
            <i class="ti-plus"></i>
        </a>
        <img src="front/img/gallery/1.webp" alt="">
    </div>
    <div class="single_gallery small_img">
        <a class="popup-image" href="front/img/gallery/2.webp">
            <i class="ti-plus"></i>
        </a>
        <img src="front/img/gallery/2.webp" alt="">
    </div>
    <div class="single_gallery small_img">
        <a class="popup-image" href="front/img/gallery/3.webp">
            <i class="ti-plus"></i>
        </a>
        <img src="front/img/gallery/3.webp" alt="">
    </div>

    <div class="single_gallery small_img">
        <a class="popup-image" href="front/img/gallery/4.webp">
            <i class="ti-plus"></i>
        </a>
        <img src="front/img/gallery/4.webp" alt="">
    </div>
    <div class="single_gallery small_img">
        <a class="popup-image" href="front/img/gallery/5.webp">
            <i class="ti-plus"></i>
        </a>
        <img src="front/img/gallery/5.webp" alt="">
    </div>
    <div class="single_gallery big_img">
        <a class="popup-image" href="front/img/gallery/6.webp">
            <i class="ti-plus"></i>
        </a>
        <img src="front/img/gallery/6.webp" alt="">
    </div>
</div>

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
<div class="instragram_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="single_instagram">
                    <img src="front/img/instragram/1.webp" alt="">
                    <div class="ovrelay">
                        <a href="#">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single_instagram">
                    <img src="front/img/instragram/2.webp" alt="">
                    <div class="ovrelay">
                        <a href="#">

                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single_instagram">
                    <img src="front/img/instragram/3.webp" alt="">
                    <div class="ovrelay">
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
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
@endsection
