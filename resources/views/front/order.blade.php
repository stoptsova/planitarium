@extends('front.layout')



@section('content')
    @include('front.includes.bredcrumb')

    <div class="best_burgers_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div  id="message"></div>
                    <div class="">
                        <h5 >Оформление заказа</h5>
                    </div>
                    <form action="#" >
                        <div class="modal-body">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <div class="mb-3">
                                <label for="validationTel">Телефон</label>
                                <input type="tel" class="form-control" id="validationTel" name="telephone" required placeholder="Телефон">
                            </div>
                            <div class="invalid-feedback">
                                Укажите Телефон.
                            </div>
                            <div class="mb-3">
                                <label for="validationTextarea">Адрес доставки</label>
                                <textarea class="form-control " name="address" id="validationAddress" placeholder="Укажите адрес доставки..." required></textarea>
                                <div class="invalid-feedback">
                                    Укажите адрес доставки.
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <a href="#" id="send"  onclick="validator()" class="btn btn-success">Оформить заказ</a>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#orderContent" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Содержание заказа
                                </a>

                            </p>
                            <div class="collapse" id="orderContent">
                                <div class="card card-body">
                                    <table id="cart" class="table table-hover table-condensed">
                                        <thead>
                                        <tr>
                                            <th style="width:50%">Название</th>
                                            <th style="width:10%">Цена</th>
                                            <th style="width:8%">Кол-во</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php $total = 0 ?>

                                        @if(session('cart'))

                                            @foreach((array) session('cart') as $id => $details)

                                                <?php $total += $details['prise'] * $details['quantity'] ?>

                                                <tr>
                                                    <td data-th="Product">
                                                        <div class="row">
                                                            <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                                                            <div class="col-sm-9">
                                                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td data-th="Price">{{ $details['prise'] }}₽</td>
                                                    <td data-th="Quantity">{{ $details['quantity'] }}</td>
                                                </tr>
                                            @endforeach
                                        @endif

                                        </tbody>
                                        <tfoot>
                                        <tr class="visible-xs">
                                            <td class="text-center"><strong>Итого <span class="cart-total">{{ $total }}₽</span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a class="btn btn-primary" data-toggle="collapse" href="#orderContent" role="button" aria-expanded="false" aria-controls="collapseExample">Скрыть</a>
                                            </td>


                                            <td colspan="2">

                                            </td>

                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script type="text/javascript">
        $("#message").hide();
        function showmsg(msg,type) {
            $("#message").html('<div class="alert alert-' + type + '"><button type="button" class="close" data-dismiss="alert">x</button>' + msg + '</div>');
            $("#message").fadeTo(2000, 500).slideUp(500, function () {
                $("#message").slideUp(500);
            });
        };
        function phonevalidation(phone){
            let msg = '';
            let status = '';
            let regex = /^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/;
            var i=phone.replace(/\D+/g,'').length;
            if(!regex.test(phone) && i!=11){
               msg='Не првавельно введён номер телефона !';
               status= false;
            }else{
                msg='Телефон проверен';
                status= true;
            }
            return {
                status: status,
                msg: msg
            };
        }
        function addressvlidation(address){
            let msg = 'yes';
            let status = true;
            var i=address.length;
            if( i<=20){
               msg='Адресс слишком короткий';
               status= false;
            }
            return {
                status: status,
                msg: msg
            };
        }
        function validator() {
            let phone = $('#validationTel').val(); // Получаем значение phone
            let address = $('#validationAddress').val(); // Получаем значение address
            var validphone = phonevalidation(phone);
            var validaddress = addressvlidation(address);
            if(!validphone.status || !validaddress.status ){
                showmsg(validphone.msg+'<br>'+validaddress.msg,'danger')
            }else{
                $.ajax({
                    url: '{{ url('ordering') }}',
                    method: "get",
                    data: {
                        _token: '{{ csrf_token() }},',
                        telephone: phone,
                        address: address
                    },
                    dataType: "json",
                    success: function (response) {
                        showmsg(validphone.msg+'<br>'+validaddress.msg+'<br><h1>'+response.msg+'</h1>','success');
                        $(location).attr('href', '/order-finish')
                    }
                });
            };
        }

    </script>

@endsection
