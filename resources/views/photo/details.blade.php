@extends('layouts.main')
@section('content')
<div class="callout primary">
            <div class="row column">
            <a href="{{url('/gallery/show', ['gallery_id' => $photo->gallery_id])}}">Back To Gallery</a>
              <h1>{{$photo->title}}</h1>
              <p class="lead">{{$photo->description}}</p>
              <p class="lead">Location: {{$photo->location}}</p>
            </div>
          </div>
          <div class="row small-up-2 medium-up-3 large-up-4">
            <div class='main'>
            {!! Html::image("images/$photo->image", 'alt text', array('class' => 'main-img')) !!}
            </div>
          </div>
@endsection