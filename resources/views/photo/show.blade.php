@extends('layouts.main')
@section('content')
<div class="callout primary">
            <div class="row column">
            <a href="/gallery">Back To Gallery
              <h1>{{$gallery->name}}</h1>
              </a>
              <p class="lead">{{$gallery->description}}</p>
              <a class="button button-upload" href="{!! url('/photo/create',$gallery->id); !!}">Upload Photo</a>
            </div>
          </div>
          <div class="row small-up-2 medium-up-3 large-up-4">

          @foreach($photos as $photo)
            <div class="column">
            <a href="/gallery/show/{{$photo->id}}">
              <img class="thumbnail" src="/images/{{$photo->cover_image}}">
              </a>
              <h5>{{$photo->name}}</h5>
              <p>{{$photo->description}}</p>
            </div>
          @endforeach
            
           
          </div>

          
@endsection