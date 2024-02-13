@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <form>
        <h1 class="text-warning">New Project</h1>
        @csrf

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label text-warning">Project Name</label>
                <input type="text" class="form-control" id="title" aria-describedby="title" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label text-warning">Description</label>
                <textarea class="form-control " name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label text-warning">Language Type</label>
                <select class="form-select" aria-label="Default select example" name="type_id">
                    <option selected>Please choose the language used:</option>

                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="technology" class="form-label text-warning">Technology</label>
                @foreach ($technologies as $tech)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tag-{{ $tag->id }}"
                            value="{{ $tech->id }}" name="technologies"
                            {{ in_array($tech->id, old('technologies', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tech->title }}</label>
                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <label for="post_image" class="form-label text-warning">Add an Image to your Project</label>
                <input class="form-control" type="file" id="post_image" name="post_image">
            </div>
            <button type="submit" class="btn btn-warning">Submit the entry</button>
        </form>
    @endsection
