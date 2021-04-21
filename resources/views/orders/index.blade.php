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

