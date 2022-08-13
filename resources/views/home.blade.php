@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Settings') }}</div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                Information
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                Add project
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                Admin profile
                            </button>
                        </li>
                    </ul>
                    @if($errors->any())

                        <div class="alert m-2 alert-danger" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                    @if(session('success'))
                    <div class="alert alert-success m-3" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <p class="text-center m-3">Information for portfolio</p>

                            <form method="post" action="{{ route('settings.update') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">Name</label>
                                        <input name="portfolio_name" type="text" class="form-control" id="validationDefault01" placeholder="User name" value="{{ getSetting('portfolio_name') }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefaultUsername">Username GitHub</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                            </div>
                                            <input name="github_url" type="text" class="form-control" id="validationDefaultUsername" placeholder="Username" value="{{ getSetting('github_url') }}" aria-describedby="inputGroupPrepend2" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationDefault03">Porfilio avatar image</label>
                                        <input name="favicon" type="file" class="form-control" id="validationDefault03">
                                        <img src="{{ Storage::url(getSetting('favicon')) }}" width="150" class="rounded mt-2" alt="">
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationDefault03">Website favicon</label>
                                            <input name="avatar" type="file" class="form-control" id="validationDefault03">
                                            <img src="{{ Storage::url(getSetting('portfolio_avatar')) }}" width="150" class="rounded mt-2" alt="">
                                        </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault04">Email for contacts</label>
                                        <input value="{{ getSetting('portfolio_email') }}" name="portfolio_email" type="email" class="form-control" id="validationDefault04" placeholder="Email">
                                    </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationDefault04">Work</label>
                                            <input value="{{ getSetting('portfolio_work') }}" name="portfolio_work" type="text" class="form-control" id="validationDefault04" placeholder="My work">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationDefault04">About me</label>
                                            <textarea name="portfolio_about" type="text" class="form-control w-100" id="validationDefault04" placeholder="About">{{ getSetting('portfolio_about') }}</textarea>
                                        </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault05">Website name</label>
                                        <input value="{{ getSetting('site_name') }}" name="site_name" type="text" class="form-control" id="validationDefault05" placeholder="Website name">
                                    </div>
                                </div>
                                </div>

                                <button class="btn btn-primary" type="submit">Save</button>
                            </form>

                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                                @csrf
                                <p class="text-center m-3">{{ __('Add new project') }}</p>
                                <label for="title" class="form-label mt-3">Project name</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter project name" aria-describedby="title">

                                <label for="url" class="form-label mt-3">Link to GitHub project (optional)</label>
                                <input type="text" name="url" id="url" class="form-control" placeholder="Enter project link" aria-describedby="passwordHelpBlock">

                                    <label for="formFile" class="form-label mt-3">Project image</label>
                                    <input class="form-control" name="image" type="file" id="image">

                                <label for="title" class="form-label mt-3">Project description</label>
                                <textarea type="text" name="description" id="title" class="form-control" placeholder="Enter project description" aria-describedby="passwordHelpBlock"></textarea>
                            <button type="submit" class="btn btn-primary mt-3">Add project</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
