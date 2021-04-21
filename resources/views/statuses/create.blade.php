@extends('layouts.app')
@section('title')
    Create Status
@endsection
@section('page_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/css/bootstrap-colorpicker.min.css" integrity="sha512-wuFRnk4KiQftPmBWRd5TmmgnuMEMVSySF4EsQJ50FemRIHIF5JkwD57UdcWqtGwamThUWHgXf8tSiiJitWnD0w==" crossorigin="anonymous" />
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">Новый статус</h3>
            <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                <a href="{{ route('statuses.index') }}" class="btn btn-primary">Назад</a>
            </div>
        </div>
        <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="card">
                           <div class="card-body ">
                                {!! Form::open(['route' => 'statuses.store']) !!}
                                    <div class="row">
                                        @include('statuses.fields')
                                    </div>
                                {!! Form::close() !!}
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </section>
@endsection
@section('page_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/js/bootstrap-colorpicker.min.js" integrity="sha512-INXxqXxcP6zawSei7i47Xmu+6ZIBRbsYN1LHAy5H1gzl1XIfTbI/OLjUcvBnDD8F3ZSVB6mf8asEPTMxz4VNjw==" crossorigin="anonymous"></script>
    <script>
        $(function () {
            // Basic instantiation:
            $('#demo-input').colorpicker();

            // Example using an event, to change the color of the #demo div background:
            $('#demo-input').on('colorpickerChange', function(event) {
                $('#demo').css('background-color', event.color.toString());
            });
        });
    </script>
@endsection
