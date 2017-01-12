@extends('backend.layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/selectize.bootstrap3.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Tour
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tour, ['route' => ['tours.update', $tour->id], 'method' => 'patch', 'files' => 'true']) !!}

                        @include('backend.tours.edit_fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('scripts')
    <script src="{{ url('backend/js/displayimages.js')}}"></script>
    <script src="{{ url('backend/js/selectize.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#subject').selectize({
                maxItems: 5
            });
        });
    </script>
@endsection