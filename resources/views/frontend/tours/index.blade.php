<?php use App\Components\Util; ?>
@extends('frontend.layouts.app')

@section('title') | Tours @endsection

@section('css')
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}">
@endsection

@section('content')
  <div class="container_12">
    <div style="margin-top:10px;">
        @include('flash::message')
    </div>
    <div class="col col-lg-9">
      <h2 class="head2">SIGHTSEEING TOURS HANOI</h2>
      <div class="clear"></div>
      @foreach($tours as $tour)
      <div class="news"> 
        <img style="width: 200px; height: 150px;" src="@foreach($data_images as $image) @if($tour->id===$image->tours_id) {!! url(config('path.upload_img').$image->name) !!} @endif @endforeach" alt="" class="img_inner fleft">
        
        <div class="extra_wrapper">
          <h3 style="text-transform:uppercase">{{ $tour->title }}</h3>
          <div class="" style="margin-top:8px;margin-bottom: 8px;"><label>from </label><span style="color: red;"> ${{ $tour->prices->price }}</span> 
          <i class="fa fa-clock-o " style="margin-left: 20px;margin-top: 3px;"></i>
          <span><a href="{{route('tours-travel.filterChoiceTime',$tour->times->id)}}">{{ $tour->times->time }}</a></span> 
          <label><i style="margin-left: 20px;margin-top: 3px;" class="fa fa-map-marker"></i> 
          @foreach($tour->places as $place) 
            <span>
                <a href="{{route('tours-travel.filterAddress',$place->id)}}">
                {!! $place->name !!},</a>
            </span> 
            @endforeach</label></div>
          <p>{{ Util::theExcerpt($tour->describe, 10) }}</p>
          <a href="{!! route('tours-travel.show', [$tour->id]) !!}" class="btn">More</a> </div>
      </div>
        <div class="clear"></div>
      @endforeach
    </div>
    <div class="col col-lg-2 col-lg-offset-1">
      <h2 class="head2">Hanoi Tour</h2>
      <ul class="list l1">
      @foreach($categories as $category)
          <li><a href="{{ route('tours-travel.filter', $category->category_tours_id) }}"> {{ $category->category_tours->name }}</a></li>
      @endforeach
      </ul>
    </div>
    <div class="clear"></div>
   </div>
@endsection

@section('scripts')

@endsection
