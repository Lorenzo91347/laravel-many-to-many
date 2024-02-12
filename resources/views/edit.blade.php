@extends('layouts.admin')

@section('content')
<form>
    <h1>Edit Comic</h1>
    <form action="{{ route('admin.projects.update' ['id'=> $projects -> id]) }}" method="POST">
        @csrf

        @method('PUT')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label text-warning">Project Name</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$project->title}}">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label text-warning">Description</label>
      <textarea class="form-control " name="content" id="" cols="30" rows="10">{{$project->content}}</textarea>
    </div>
    <div class="mb-3">
      <label for="type" class="form-label text-warning">Language Type</label>
        <select class="form-select" aria-label="Default select example">
          <option selected>Please choose the language used:</option>
          <option value="Html">Html</option>
          <option value="Js">Js</option>
          <option value="Css">Css</option>
          <option value="Php">Php</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="post_image" class="form-label text-warning">Add an Image to your Project</label>
        <input class="form-control" type="file" id="post_image" name="post_image">
    </div>
    <button type="submit" class="btn btn-warning">Submit</button>
  </form>
@endsection