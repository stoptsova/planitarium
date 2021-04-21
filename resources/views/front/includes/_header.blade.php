<header>
    <div class="header-area " id="header-bar">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid p-0">
                <div class="row align-items-center no-gutters">
                    <div class="col-xl-5 col-lg-5">
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a class="active" href="/">Главная</a></li>
                                    <li><a href="/menu">Меню</a></li>
                                    <li><a href="/about">О нас</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo-img">
                            <a href="index.php">
                                <img src="front/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                        <div class="book_room">
                            <div class="book_btn d-none d-xl-block">
                                <a class="#" href="#">8 (999) 000 99 00</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 d-none d-lg-block" >

                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-warning btn-lg" data-toggle="dropdown">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>  <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                            </button>
                            <div class="dropdown-menu">
                                <div class="row total-header-section">
                                    <div class="col-lg-6 col-sm-6 col-6">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                    </div>

                                    <?php $total = 0 ?>
                                    @foreach((array) session('cart') as $id => $details)
                                        <?php $total += $details['prise'] * $details['quantity'] ?>
                                    @endforeach

                                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                        <p>Всего: <span class="text-info">{{ $total }}</span> руб.</p>
                                    </div>
                                </div>

                                @if(session('cart'))
                                    @foreach((array) session('cart') as $id => $details)
                                        <div class="row cart-detail">
                                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                <img src="{{ $details['image'] }}" />
                                            </div>
                                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                <p>{{ $details['name'] }}</p>
                                                <span class="price text-info"> {{ $details['prise'] }} руб.</span> <span class="count"> Кол-во:{{ $details['quantity'] }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                        <a href="{{ url('cart') }}" class="btn btn-warning btn-block">Заказать</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>



</header>
