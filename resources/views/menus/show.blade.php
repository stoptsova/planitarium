@extends('layouts.app')
@section('title')
    Menu Details
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Детали меню</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('menus.index') }}"
                 class="btn btn-primary form-btn float-right">Назад</a>
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
           <div class="card">
            <div class="card-body">
                    @include('menus.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection
