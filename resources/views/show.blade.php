@extends('layouts.admin')

@section('content')

<H1>{{$project->title}}</H1>
<div>{{$project->content}}</div>
<img src="{{asset('storage/'. $post->cover_image)}}" alt="">
<a href="{{ route('index') }}" role="button" class="btn btn-warning ">Back to the projects</a>
@endsection