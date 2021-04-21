@extends('layouts.app')
@section('title')
    Statuses
@endsection


@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Статус заказа</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('statuses.create')}}" class="btn btn-primary form-btn">Добавить <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('statuses.table')
            </div>
       </div>
   </div>

        @include('stisla-templates::common.paginate', ['records' => $statuses])

    </section>
@endsection

