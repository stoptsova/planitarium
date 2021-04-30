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
@endsection
@section('page_js')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".ChangeStatus").click(
                function()
                {
                    var ele = $(this);
                    var id = ele.attr("data-id");
                    alert( id );
                    //$('#ChangeStatusModal').modal();

                });
        });
       // $("#message").hide();
       {{-- $("#saveBtn").click(function (e) {--}}
       {{--     e.preventDefault();--}}

       {{--     var ele = $(this);--}}

       {{--     var id = $("#product_id").val();--}}
       {{--     var status_id = $("#status_id").val();--}}
       {{--     //alert( id +' -+==+- '+ status_id );--}}


       {{--     $.ajax({--}}
       {{--         url: '{{ url('/chs') }}',--}}
       {{--         method: "get",--}}
       {{--         data: {_token: '{{ csrf_token() }}', id: id, status_id: status_id},--}}
       {{--         dataType: "json",--}}
       {{--         success: function (response) {--}}
       {{--             $('#ChangeStatusModal').modal('toggle');--}}
       {{--             alert(response.msg);--}}
       {{--             setTimeout('location.replace("/admin/orders/{{$order->id}}")',500);--}}
       {{--         }--}}
       {{--     });--}}
       {{-- });--}}

    </script>
@endsection

