@extends('backend.layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('backend/css/vendor.css')}}">
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Travel
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($travel, ['route' => ['travels.update', $travel->id], 'method' => 'patch']) !!}

                        @include('backend.travels.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('scripts')
    <script src="{{ url('backend/js/vendor.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#travel-textarea').summernote({
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
            });
        });
  </script>
@endsection