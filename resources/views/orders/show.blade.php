@extends('layouts.app')
@section('title')
    Order Details
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Детали заказа</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('orders.index') }}"
                 class="btn btn-primary form-btn float-right">Назад</a>
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
        <h1>Заказ № {{$order->id}}</h1>
        <div class="row">
           <div class="card col">
            <div class="card-body">
                    @include('orders.show_fields')
            </div>
            </div>
            <div class="card col ml-1">
                <div class="card-header">
                    <h4>Содержание заказа:</h4>
                </div>
                <div class="card-body">
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
                            @foreach($sales as  $sale)
                                <?php $total += $sale->menu->prise * $sale['quantity'] ?>
                                <tr>
                                    <td data-th="Product" >
                                        <div class="row d-flex align-items-center">
                                            <div class="col-sm-3 hidden-xs">
                                                <img src="{{ $sale->menu->image }}" width="60" height="60" alt="{{ $sale->menu->name }}" class="img-responsive p-1 text-center"/>
                                            </div>
                                            <div class="col-sm-9 align-middle">
                                                <h5>{{ $sale->menu->name }}</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">{{ $sale->menu->prise }}₽</td>
                                    <td data-th="Quantity">{{ $sale['quantity'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr class="visible-xs">
                            <td class="text-center"><strong>Итого <span class="cart-total">{{ $total }}₽</span></strong></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer bg-whitesmoke">
                    <h4>Итого <span class="cart-total">{{ $total }}₽</span></h4>
                </div>
            </div>
        </div>
    </div>
    </section>

    <div class="modal fade" id="ChangeStatusModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading">Изменение статуса заказа</h4>
                </div>
                <div class="modal-body">
                    <form id="productForm" name="productForm" class="form-horizontal">
                        <input type="hidden" name="product_id" id="product_id" value="{{$order->id}}">
                        <div class="form-group">
                            <label for="name" class="col-sm-12 control-label">Новый статус</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="status_id" name="status_id" >
                                @foreach($statuses as $status )
                                    <option value="{{$status->id}}">{{$status->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    </body>
@endsection
@section('page_js')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#ChangeStatus").click(
                function()
                {
                    var ele = $(this);
                    var id = ele.attr("data-id");
                    alert( id );
                    $('#ChangeStatusModal').modal();

                });
        });
        $("#message").hide();
        $("#saveBtn").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            var id = $("#product_id").val();
            var status_id = $("#status_id").val();
            //alert( id +' -+==+- '+ status_id );


            $.ajax({
                url: '{{ url('/admin/chengestatus') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: id, status_id: status_id},
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

        </script>
@endsection
