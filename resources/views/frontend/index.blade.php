<?php use App\Components\Util; ?>
@extends('frontend.layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}">
	<link rel="stylesheet" href="{{ url('frontend/css/slider.css') }}">
@endsection

@section('content')
 <div class="slider-relative">
    <div class="slider-block">
      <div class="slider">
        <ul class="items">
          <li><img src="{{ url('frontend/images/slide6.jpg') }}" alt=""></li>
          <li><img src="{{ url('frontend/images/slide5.jpg') }}" alt=""></li>
          <li class="mb0"><img src="{{ url('frontend/images/slide4.jpg') }}" alt=""></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="content page1">
    <div class="container_12">
    
      <div class="grid_7">
        <h2>Welcome</h2>
        <div class="page1_block col1"> <img style="border-radius: 50%;width: 150px;height: 150px;" src="{{ url('frontend/images/wel.png') }}" alt="">
          <div class="extra_wrapper">
            <p>Welcome to Hanoi Travel</p>
            Aenean nonummy hendrerit mau rellus porta. Fusce suscipit varius m sociis natoque penaibet magni parturient montes nasetur ridiculumula dui. <br>
            </div>
          <div class="clear"></div>
        </div>
      </div>
      <div class="grid_3 prefix_2">
        <h2>Hanoi Tour</h2>
        <ul class="list">
          @foreach($categories as $category)
          <li><a href="{{ route('tours-travel.filter', $category->category_tours_id) }}"> {{ $category->category_tours->name }}</a></li>
          @endforeach 
        </ul>
      </div>
      <div class="clear"></div>
      <div class="grid_12">
        <div class="hor_separator"></div>
      </div>
      <div class="grid_5">
        <h2>Hot Tour</h2>
        <img style="width: 375px; height: 220px;" src="{!! url(config('path.upload_img').$hot_image->name) !!}" alt="" class="img_inner">
        <h3 style="margin-bottom:20px;text-transform:uppercase" >{{ $tour_hot->title }}</h3>
        <p>{{ $tour_hot->describe }}<br>
        <a href="{!! route('tours-travel.show', [$tour_hot->id]) !!}" class="btn m1">More</a> </div>
      <div class="grid_5 prefix_2">
        <h2>Abouts</h2>
        <ul class="carousel2">
        @foreach($abouts as $about)
          <li>
            <blockquote>
              <div class="extra_wrapper">
                <div class="title"><a href="{!! route('about-us.show', [$about->id]) !!}">{{ $about->title }}</a></div><br />
              </div>
              <div class="clear"></div>
              <p>{{ Util::theExcerpt($about->content, 600) }}</p>
            </blockquote>
          </li>
          @endforeach
        </ul>
        <a href="#" class="next1"></a> <a href="#" class="prev1"></a> </div>
      <div class="clear"></div>
      <div class="grid_12">
        <div class="hor_separator"></div>
      </div>
      <div class="grid_12">
        <div class="car_wrap">
          <h2>Best Choice</h2>
          <a href="#" class="prev"></a><a href="#" class="next"></a>
          <ul class="carousel1">
             @foreach($tours as $tour)
            <li>
              <div>
                <img style="width: 200px; height: 150px;" src="@foreach($data_images as $image) @if($tour->id===$image->tours_id) 
                {!! url(config('path.upload_img').$image->name) !!} @endif @endforeach" alt="">
                <div class="col1 upp">
                  <a href="{!! route('tours-travel.show', [$tour->id]) !!}">{{ $tour->title }}</a>
                </div>
                <div>
                  <span>{{ Util::theExcerpt($tour->describe, 30) }}</span>
                </div>
                <div class="price">{{ $tour->prices->price }}$</div>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="clear"></div>
@endsection

@section('scripts')
  <script src="{{ url('frontend/js/jquery.carouFredSel-6.1.0-packed.js') }}"></script>
	<script src="{{ url('frontend/js/tms-0.4.1.js') }}"></script>
	<script src="{{ url('frontend/js/frontend.js') }}"></script>
@endsection
