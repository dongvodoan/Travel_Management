@extends('frontend.layouts.app')

@section('title') | Tours @endsection

@section('css')
  <link rel="stylesheet" href="{{ url('frontend/css/prettyPhoto.css') }}">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
    <div class="container_12">
      <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h2 style="text-transform:uppercase">{{ $tour->title }}</h2>
      </div>
      <div class="clear"></div>
      <div class="portfolio">
      @foreach($images as $image)
        <div class="col col-lg-6 col-md-6 col-sm-4 col-xs-4 text-center">
          <a href="{{ url(config('path.upload_img').$image->name) }}" data-gal="prettyPhoto[1]"><span></span><img src="{{ url(config('path.upload_img').$image->name) }}" alt=""></a>
        </div>
      @endforeach
      </div>
      <div class="clear"></div>
        <div class="extra_wrapper">
          <div class="" style="margin-top:8px;margin-bottom: 8px;"><label>from </label>
          <span style="color: red;"> ${{ $tour->prices->price }}</span> 
          <i class="fa fa-clock-o " style="margin-left: 20px;margin-top: 3px;"></i>
          <span><a href="{{route('tours-travel.filterChoiceTime',$tour->times->id)}}">{{ $tour->times->time }}</a></span> 
          <label><i style="margin-left: 20px;margin-top: 3px;" class="fa fa-map-marker"></i> @foreach($tour->places as $place) 
            <span>
              <a href="{{route('tours-travel.filterAddress',$place->id)}}">
                  {!! $place->name !!},</a>
            </span> 
            @endforeach</label></div>
          <p>{{ $tour->describe }}</p>
      </div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li  role="presentation" class="active"><a style="font-size: 20px;" href="#home" aria-controls="home" role="tab" data-toggle="tab">Itinerary</a></li>
    <li role="presentation"><a style="font-size: 20px;" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Price</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content" style="border: 1px solid #dddddd; background-color: #fff; padding: 10px;border-top: none;">
    <div role="tabpanel" class="tab-pane fade in active" id="home">{!! $tour->prices->content !!}</div>
    <div role="tabpanel" class="tab-pane fade" id="profile">{!! $tour->itineraries->content !!}</div>
  </div>

</div>
@endsection

@section('scripts')
  <script src="{{ url('frontend/js/jquery.prettyPhoto.js') }}"></script>
  <script>
    $(document).ready(function () {
        $("a[data-gal^='prettyPhoto']").prettyPhoto({
            theme: 'facebook',
            social_tools: false,
        });
    });
  </script>
@endsection
