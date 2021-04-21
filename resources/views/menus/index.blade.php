@extends('layouts.app')
@section('title')
    Меню
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Меню</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('menus.create')}}" class="btn btn-primary form-btn">Добавить <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('menus.table')
            </div>
       </div>
   </div>

        @include('stisla-templates::common.paginate', ['records' => $menus])

    </section>
@endsection

