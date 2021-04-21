@extends('layouts.app')
@section('title')
    Status Details
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Детали статуса</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('statuses.index') }}"
                 class="btn btn-primary form-btn float-right">Назад</a>
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
           <div class="card">
            <div class="card-body">
                    @include('statuses.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection
