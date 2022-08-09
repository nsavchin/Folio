@extends('layouts.blank')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit post') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form method="post" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <p class="text-center m-3">{{ __('Edit project') }}</p>
                                <label for="title" class="form-label mt-3">Project name</label>
                                <input value="{{ $post->title }}" type="text" name="title" id="title" class="form-control" placeholder="Enter project name" aria-describedby="title">

                                <label for="url" class="form-label mt-3">Link to GitHub project (optional)</label>
                                <input type="text" value="{{ $post->url }}" name="url" id="url" class="form-control" placeholder="Enter project link" aria-describedby="passwordHelpBlock">

                                <label for="formFile" class="form-label mt-3">URL image</label>
                                <input class="form-control" name="image" type="file" id="image">

                                <label for="title" class="form-label mt-3">Project description</label>
                                <textarea type="text" name="description" id="title" class="form-control" placeholder="Enter project description" aria-describedby="passwordHelpBlock">{{ $post->description }}</textarea>
                                <button type="submit" class="btn btn-primary mt-3">Save</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
