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
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                Admin profile
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                Add project
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

                            <form>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">First name</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault02">Last name</label>
                                        <input type="text" class="form-control" id="validationDefault02" placeholder="Last name" value="Otto" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefaultUsername">Username</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                            </div>
                                            <input type="text" class="form-control" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationDefault03">City</label>
                                        <input type="text" class="form-control" id="validationDefault03" placeholder="City" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault04">State</label>
                                        <input type="text" class="form-control" id="validationDefault04" placeholder="State" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault05">Zip</label>
                                        <input type="text" class="form-control" id="validationDefault05" placeholder="Zip" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                        <label class="form-check-label" for="invalidCheck2">
                                            Agree to terms and conditions
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit form</button>
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

                                    <label for="formFile" class="form-label mt-3">URL image</label>
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
