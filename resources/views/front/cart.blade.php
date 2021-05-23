@extends('front.layout')



@section('content')
    @include('front.includes.bredcrumb')

    <div class="best_burgers_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success" id="message"></div>

                    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Название</th>
            <th style="width:10%">Цена</th>
            <th style="width:8%">Кол-во</th>
            <th style="width:22%" class="text-center">Сумма</th>
            <th style="width:10%"></th>
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
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center"><span class="product-subtotal">{{ $details['prise'] * $details['quantity'] }}₽</span></td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fas fa-sync-alt"></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fas fa-trash"></i></button>
                        <i class="fa fa-circle-o-notch fa-spin btn-loading" style="font-size:24px; display: none"></i>
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Итого <span class="cart-total">{{ $total }}₽</span></strong></td>
        </tr>
        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Продолжить покупки</a></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="2"> <a href="{{ url('order') }}" class="btn btn-warning">Оформить заказ <i class="fa fa-angle-right"></i></a></td>
        </tr>
        </tfoot>
    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">Оформление заказа</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/ordering" >
                    <div class="modal-body">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="validationEmail">Email address</label>
                            <input type="email" class="form-control" id="validationEmail"  name="email" aria-describedby="emailHelp" required placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small>
                            <div class="invalid-feedback">
                                Укажите Email.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="validationTel">Телефон</label>
                            <input type="tel" class="form-control" id="validationTel" name="tel" required placeholder="Телефон">
                        </div>
                        <div class="invalid-feedback">
                            Укажите Телефон.
                        </div>

                        <div class="mb-3">
                            <label for="validationTextarea">Адрес доставки</label>
                            <textarea class="form-control " name="address" id="validationTextarea" placeholder="Укажите адрес доставки..." required></textarea>
                            <div class="invalid-feedback">
                                Укажите адрес доставки.
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')


    <script type="text/javascript">
        $("#message").hide();
        $(".update-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            var parent_row = ele.parents("tr");

            var quantity = parent_row.find(".quantity").val();

            var product_subtotal = parent_row.find("span.product-subtotal");

            var cart_total = $(".cart-total");

            var loading = parent_row.find(".btn-loading");

            loading.show();

            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: quantity},
                dataType: "json",
                success: function (response) {

                    loading.hide();

                    $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');

                    $("#header-bar").html(response.data);

                    product_subtotal.text(response.subTotal);

                    cart_total.text(response.total);
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            var parent_row = ele.parents("tr");

            var cart_total = $(".cart-total");

            if(confirm("Вы уверены?")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    dataType: "json",
                    success: function (response) {

                        parent_row.remove();


                        $("#message").html('<button type="button" class="close" data-dismiss="alert">x</button>'+response.msg);
                        $("#message").fadeTo(2000, 500).slideUp(500, function() {
                            $("#message").slideUp(500);
                        });

                        $("#header-bar").html(response.data);

                        cart_total.text(response.total);
                    }
                });
            }
        });

    </script>

@endsection
