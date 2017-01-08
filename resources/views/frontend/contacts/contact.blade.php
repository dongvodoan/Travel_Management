@extends('frontend.layouts.app')

@section('title') | Contacts @endsection

@section('css')
@endsection

@section('content')
  <div class="container_12">
      <div style="margin-top:10px;">
        @include('flash::message')
      </div>

      <div class="col col-lg-6">
        <h2>Find Us</h2>
        <div class="map">
          <figure class="img_inner">
            <div id="googleMap" style="width: 100%;height: 308px;"></div>
          </figure>
          <address>
          <dl>
            <dt>
              <p>The Company Name Inc.<br>
                8901 Marmora Road,<br>
                Glasgow, D04 89GR.</p>
            </dt>
            <dd><span>Freephone:</span>+84 165-7474-245</dd>
            <dd><span>Telephone:</span>+84 129-377-3333</dd>
            <dd><span>FAX:</span>+1 800 889 9898</dd>
          </dl>
          </address>
        </div>
      </div>
      <div class="col col-lg-5 col-lg-offset-1">
        <h2>Contact Us</h2>
        <p>Please feel free to submit your requests, questions, travel ideas, feedback.. We are always willing to answer & advise all your requests. Fill in the form below and we will reply you as soon as possible.</p>

        <strong>If you would NOT receive our reply within 24hours (working day), then there’s certain system error which made the message did not reach us, so kindly send us email at igo@tourinHanoi.com, we are happy to help.</strong><br></br>
        <div class="clear"></div>
        {!! Form::open(['route' => 'contacts.send', 'method' => 'post', 'id' => 'form']) !!}
          
          @include('frontend.contacts.contact_field')  

        {!! Form::close() !!}
      </div>
      <div class="clear"></div>
    </div>
@endsection

@section('scripts')
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvmZnY4hNFk0C1mek1OfM-fYbw1J1f4Ww&callback=initMap"
        async defer></script>
  <script src="{{ url('frontend/js/map.js') }}"r></script>
@endsection
