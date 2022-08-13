@extends('layouts.blank')

@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ getSetting('portfolio_name') }}</h5>
                            <p class="text-muted mb-1">{{ getSetting('portfolio_work') }}</p>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">

                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-github fa-lg" style="color: #333333;"></i> {{ getSetting('github_url') }}
                                    <p class="mb-0"><a href="https://github.com/{{ getSetting('github_url') }}">View</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ getSetting('portfolio_email') }}</p>
                                </div>
                            </div>


                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">About me</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ getSetting('portfolio_about') }}</p>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Projects created</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $posts->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        @if($posts->count())
                            <h3>Projects</h3>
                        @else
                            <h3>Projects not found</h3>
                        @endif
                    </div>

                    @foreach($posts as $post)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->description }}</p>
                                <p class="card-text"><small class="text-muted">Created at: {{ date('d/m/Y H:i', strtotime($post->created_at)) }}</small></p>
                                <form method="post" action="{{ route('post.destroy', $post->id) }}">
                                    @csrf
                                    @auth
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-success">Edit</a>
                                    @endauth
                                </form>

                            </div>
                            <img class="card-img-bottom" src="{{ Storage::url($post->image) }}" alt="Card image cap">
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection
