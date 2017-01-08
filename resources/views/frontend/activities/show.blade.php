@extends('frontend.layouts.app')

@section('title') | Things to do @endsection

@section('css')
@endsection

@section('content')
    <div class="container_12">
      <div class="col col-lg-8">
      
        <h2>{{ $item->title }}</h2>
        {!! $item->content !!}
      
        <div class="clear"></div>
      </div>
      <div class="col col-lg-3 col-lg-offset-1">
        <h2 class="head1">Things to do</h2>
        <ul class="list">
        @foreach($types as $type)
          <li><a href="{{route('activities.filter',$type->types_id)}}"> {{ $type->types->name }}</a></li>
        @endforeach 
        </ul>
      </div>
      <div class="clear"></div>
    </div>
@endsection

@section('scripts')

@endsection
