@php
    $menu = ['dashboard' => '', 'user' => 'has-sub', 'category' => 'has-sub', 'product' => 'has-sub', 'order' => 'has-sub', 'blog' => 'has-sub', 'review' => '', 'contact' => ''];
@endphp

@extends('admin.components.layout')



@section('main')
    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            @if (session('success'))
                <div class="alert alert-success">
                    <h3>{{ session('success') }}</h3>
                </div>
            @endif
			@if (session('error'))
                <div class="alert alert-danger">
                    <h3>{{ session('error') }}</h3>
                </div>
            @endif
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>User Profile</h1>
                    <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Profile
                    </p>
                </div>
                <div>
                    <a href="user-list.html" class="btn btn-primary">Edit</a>
                </div>
            </div>
            <div class="card bg-white profile-content">
                <div class="row">

                    <div class="col-lg-12 col-xl-12">
                        <div class="profile-content-right profile-right-spacing py-5">
                            <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myProfileTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link @if (!$errors->has('oldPassword') && !$errors->has('newPassword')) active @endif " id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                        aria-selected="true">Profile</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link @if ($errors->has('oldPassword') || $errors->has('newPassword')) active @endif " id="settings-tab" data-bs-toggle="tab"
                                        data-bs-target="#settings" type="button" role="tab" aria-controls="settings"
                                        aria-selected="false">Settings</button>
                                </li>
                            </ul>
                            <div class="tab-content px-3 px-xl-5" id="myTabContent">

                                <div class="tab-pane 
										@if (!$errors->has('oldPassword') && !$errors->has('newPassword')) show active @endif 
										fade"
                                    id="profile" role="tabpanel" aria-labelledby="settings-tab">
                                    <div class="tab-pane-content mt-5">
                                        <div class="card-body">
                                            <div class="card-body">
                                                <div class="row ec-vendor-uploads">
                                                    <div class="col-lg-12">
                                                        <div class="ec-vendor-upload-detail">
                                                            <form class="row g-3" action="{{ route('userupdate') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="col-lg-4">
                                                                    <div class="ec-vendor-img-upload">
                                                                        <div class="ec-vendor-main-img">
                                                                            <div class="avatar-upload">
                                                                                <div class="avatar-edit">
                                                                                    <input type='file' id="imageUpload"
                                                                                        name='profile_photo_path'
                                                                                        value="{{ $users->image }}"
                                                                                        class="ec-image-upload"
                                                                                        accept=".png, .jpg, .jpeg" />
                                                                                    <label for="imageUpload"><img
                                                                                            src="{{ asset('back/assets/img/icons/edit.svg') }}"
                                                                                            class="svg_img header_svg"
                                                                                            alt="edit"
                                                                                            name='profile_photo_path' /></label>
                                                                                </div>
                                                                                <div class="avatar-preview ec-preview">
                                                                                    <div
                                                                                        class="imagePreview ec-div-preview">
                                                                                        <img class="ec-image-preview"
                                                                                            src="{{ asset($users->image) }}"
                                                                                            alt="edit"
                                                                                            name='profile_photo_path' />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-8">
                                                                    <div class="ec-vendor-upload-detail">
                                                                        <div class="col-lg-10">
                                                                            <div class="form-group">
                                                                                <label for="name">Full Name</label>
                                                                                @if ($errors->has('name'))
                                                                                    <span
                                                                                        style="color: red;">{{ $errors->first('name') }}</span>
                                                                                @endif
                                                                                <input type="text" class="form-control"
                                                                                    name="name" id="name"
                                                                                    value="{{ old('name', $users->name) }}"
                                                                                    placeholder="Enter your name">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-10">
                                                                            <div class="form-group mb-4">
                                                                                <label for="email">Email</label>
                                                                                @if ($errors->has('email'))
                                                                                    <span
                                                                                        style="color: red;">{{ $errors->first('email') }}</span>
                                                                                @endif
                                                                                <input type="email" class="form-control"
                                                                                    name="email" id="email"
                                                                                    value="{{ old('email', $users->email) }}"
                                                                                    placeholder="example@gmail.com">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-10">
                                                                            <div class="form-group mb-4">
                                                                                <label>Gender</label>
                                                                                @if ($errors->has('gender'))
                                                                                    <span
                                                                                        style="color: red;">{{ $errors->first('gender') }}</span>
                                                                                @endif
                                                                                <select name="gender"
                                                                                    class="form-control">
                                                                                    <option @selected(old('gender', $users->gender) == 1)
                                                                                        value="1" selected>Male
                                                                                    </option>
                                                                                    <option @selected(old('gender', $users->gender) == 0)
                                                                                        value="0">Female</option>
                                                                                    <option @selected(old('gender', $users->gender) == 2)
                                                                                        value="2">Not Intressted
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-10">
                                                                            <div class="form-group mb-4">
                                                                                <label>Status</label>
                                                                                @if ($errors->has('status'))
                                                                                    <span
                                                                                        style="color: red;">{{ $errors->first('status') }}</span>
                                                                                @endif
                                                                                <select name="status"
                                                                                    class="form-control">
                                                                                    <option @selected(old('status', $users->status) == 1)
                                                                                        value="1">Active</option>
                                                                                    <option @selected(old('status', $users->status) == 0)
                                                                                        value="0">inActive</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane
										@if ($errors->has('oldPassword') || $errors->has('newPassword')) show active @endif 
										fade"
                                    id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                    <div class="tab-pane-content mt-5">
                                        <form class="row g-3" action="{{ route('passwordUpdate') }}" method="POST">
                                            @csrf
                                            <div class="form-group mb-4">
                                                <label for="oldPassword">Old password</label>
												@if ($errors->has('oldPassword'))
													<span style="color: red;">{{ $errors->first('oldPassword') }}</span>
												@endif
                                                <input type="password" class="form-control" name="oldPassword">
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="newPassword">New password</label>
												@if ($errors->has('newPassword'))
													<span style="color: red;">{{ $errors->first('newPassword') }}</span>
												@endif
                                                <input type="password" class="form-control" name="newPassword">
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="confirmPassword">Confirm password</label>
												@if ($errors->has('confirmPassword'))
													<span style="color: red;">{{ $errors->first('confirmPassword') }}</span>
												@endif
                                                <input type="password" class="form-control" name="confirmPassword">
                                            </div>

                                            <div class="d-flex justify-content-start mt-5">
                                                <button type="submit" class="btn btn-primary mb-2 btn-pill">Update
                                                    Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- End Content -->
    </div> <!-- End Content Wrapper -->
@endsection

@section('scripts')
    <!-- Datatables -->
    <script src="{{ asset('back/assets/plugins/data-tables/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('back/assets/plugins/data-tables/datatables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('back/assets/plugins/data-tables/datatables.responsive.min.js') }}"></script>
@endsection

@section('styles')
    <!-- Data Tables -->
    <link href="{{ asset('back/assets/plugins/data-tables/datatables.bootstrap5.min.css') }}" rel='stylesheet'>
    <link href="{{ asset('back/assets/plugins/data-tables/responsive.datatables.min.css') }}" rel='stylesheet'>
@endsection
