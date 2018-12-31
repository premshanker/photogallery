@extends('layouts.main')
@section('content')
<div class="callout primary">
            <div class="row column">
              <h1>Upload Photo</h1>
              <p class="lead">Upload a photo to the gallery</p>
            </div>
          </div>
          <div class="row small-up-2 medium-up-3 large-up-4">
            <div class='main'>
            {!! Form::open(array('action' => 'PhotoController@store', 'enctype' => 'multipart/form-data')) !!}
            
            {!! Form::hidden('gallery_id', $value = "$gallery_id") !!}
            {!! Form::label('title', 'Title') !!} 
            {!! Form::text('title', $value = null, $attributes = ['placeholder' => 'Photo Title', 'title' => 'Title']) !!}
            {!! Form::label('description', 'Description') !!} 
            {!! Form::text('description', $value = null, $attributes = ['placeholder' => 'Photo Description', 'name' => 'description']) !!}
            {!! Form::label('location', 'Location') !!} 
            {!! Form::text('location', $value = null, $attributes = ['placeholder' => 'Photo Location', 'name' => 'location']) !!}
            {!! Form::label('image', 'Photo') !!} 
            {!! Form::file('image') !!}
            {!! Form::submit('submit', $attributes= ['class' => 'button'])!!}
            {!! Form::close() !!}
            </div>
          </div>
@endsection