@extends('backend.layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/vendor.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Activity
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'activities.store', 'files' => 'true']) !!}

                        @include('backend.activities.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection 

@section('scripts')
    <script src="{{ url('backend/js/vendor.js') }}"></script>
    <script src="{{ url('backend/js/displayimages.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#activities-textarea').summernote({
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
            });
        });
  </script>
@endsection


