@extends('layouts.app')
@section('title')
    Orders
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Заказы</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('orders.create')}}" class="btn btn-primary form-btn">Добавить <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('orders.table')
            </div>
       </div>
   </div>

        @include('stisla-templates::common.paginate', ['records' => $orders])


    </section>
    <div class="modal fade" id="ChangeStatusModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading">Изменение статуса заказа</h4>
                </div>
                <div class="modal-body">
                    <form id="change" name="productForm" class="form-horizontal">
                        <input type="hidden" name="order_id" id="order_id" value="">
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
@endsection
@section('page_js')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".ChangeStatus").click(
                function()
                {
                    var ele = $(this);
                    var id = ele.attr("data-id");

                    //alert( id );
                    $("#order_id").attr("value", id);
                    $('#ChangeStatusModal').modal('toggle');

                });
        });
        $("#message").hide();
        $("#saveBtn").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            var id = $("#order_id").val();
            var status_id = $("#status_id").val();
            //alert( id +' -+==+- '+ status_id );


            $.ajax({
                url: '{{ url('/chs') }}',
                method: "get",
                data: {_token: '{{ csrf_token() }}', id: id, status_id: status_id},
                dataType: "json",
                success: function (response) {
                    $('#ChangeStatusModal').modal('toggle');
                    alert(response.msg);
                    setTimeout('location.replace("/admin/orders")',500);
                }
            });
        });

    </script>
@endsection

