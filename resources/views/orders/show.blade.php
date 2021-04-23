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

    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="productForm" name="productForm" class="form-horizontal">
                        <input type="hidden" name="product_id" id="product_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Новый статус</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="status_id" name="status_id">
                                @foreach($statuses as $status )

                                    <option value="{{$status->id}}">{{$status->name}}</option>
                                @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Details</label>
                            <div class="col-sm-12">
                                <textarea id="detail" name="detail" required="" placeholder="Enter Details" class="form-control"></textarea>
                            </div>
                        </div>
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

        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#ChangeStatus').click(function () {
                $('#saveBtn').val("изменить статус");
                $('#product_id').val('');
                $('#productForm').trigger("reset");
                $('#modelHeading').html("Изменение статуса заказа");
                $('#ajaxModel').modal('show');

            });
@endsection
