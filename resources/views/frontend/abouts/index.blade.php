@extends('frontend.layouts.app')

@section('title') | About us @endsection

@section('css')
@endsection

@section('content')
    <div class="container_12">
    <div style="margin-top:10px;">
        @include('flash::message')
    </div>
      <div class="col col-lg-8">
      @foreach($about_us as $intro)
        <h2>{{ $intro->title }}</h2>
        {!! $intro->content !!}
      @endforeach
        <div class="clear"></div>
      </div>
      <div class="col col-lg-3 col-lg-offset-1">
        <h2 class="head2">About us</h2>
        <ul class="list l1">
        @foreach($abouts as $about)
          <li><a href="{!! route('about-us.show', [$about->id]) !!}"> {{ $about->title }}</a></li>
        @endforeach  
        </ul>
        <h2 class="head1">Hanoi Tour</h2>
        <ul class="list">
        @foreach($categories as $category)
          <li><a href="{{ route('tours-travel.filter', $category->category_tours_id) }}"> {{ $category->category_tours->name }}</a></li>
        @endforeach 
        </ul>
        <h2 class="head1">Travel with us</h2>
        <ul class="list">
        @foreach($travels as $travel)
          <li><a href="{!! route('travel-us.show', [$travel->id]) !!}"> {{ $travel->title }}</a></li>
        @endforeach
        </ul>
      </div>
      <div class="clear"></div>
    </div>
@endsection

@section('scripts')

@endsection
