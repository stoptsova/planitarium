
@extends('front.layout')

@section('content')


@include('front.includes.bredcrumb')
    <!-- best_burgers_area_start  -->
    <div class="best_burgers_area">
        <div class="container">

            <div class="alert alert-success" id="message"></div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-80">
                        <span>Бургерное Меню</span>
                    </div>
                </div>
            </div>
            <div class="row">




                @foreach($products as $product)
                <div class="col-xl-6 col-md-6 col-lg-6">
                    <div class="single_delicious d-flex align-items-center">
                        <div class="thumb">
                            <img src="{{ $product->image }}" alt="" style="width: 166px; height: 166px;">
                        </div>
                        <div class="info">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                            <div style="display: flex;justify-content: space-around;">
                                <span>{{ $product->prise }}₽</span>
                                <p class="btn-holder"><a href="javascript:void(0);" data-id="{{ $product->id }}" class="btn btn-warning btn-block text-center add-to-cart" role="button">Заказать</a>
                                    <i class="fa fa-circle-o-notch fa-spin btn-loading" style="font-size:24px; display: none"></i>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- best_burgers_area_end  -->

    <!-- features_room_startt -->
    <div class="Burger_President_area">
        <div class="Burger_President_here">
            <div class="single_Burger_President">
                <div class="room_thumb">
                    <img src="front/img/burgers/1.png" alt="">
                    <div class="room_heading d-flex justify-content-between align-items-center">
                        <div class="room_heading_inner">
                            <span>650₽</span>
                            <h3>Бургер Президент</h3>
                            <a href="#" class="boxed-btn3">Заказать</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="single_Burger_President">
                <div class="room_thumb">
                    <img src="front/img/burgers/2.png" alt="">
                    <div class="room_heading d-flex justify-content-between align-items-center">
                        <div class="room_heading_inner">
                            <span>590₽</span>
                            <h3>Бургер Первая Леди</h3>
                            <a href="#" class="boxed-btn3">Заказать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- features_room_end -->




@endsection
@section('scripts')

    <script type="text/javascript">
        $("#message").hide();
        $(".add-to-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            ele.siblings('.btn-loading').show();

            $.ajax({
                url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
                method: "get",
                data: {_token: '{{ csrf_token() }}'},
                dataType: "json",
                success: function (response) {
                    ele.siblings('.btn-loading').hide();
                    $("#header-bar").html(response.data);
                    $("#message").html('<button type="button" class="close" data-dismiss="alert">x</button>'+response.msg);
                    $("#message").fadeTo(2000, 500).slideUp(500, function() {
                        $("#message").slideUp(500);
                    });
                }
            });
        });
    </script>

@stop





