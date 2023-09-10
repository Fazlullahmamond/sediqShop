@extends('front.components.layout')


@section('main')
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="row">
            <div class="container">
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
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">User Profile</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="ec-breadcrumb-item active">Profile</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- User profile section -->
    <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
        <div class="container">
            <div class="row">

                @include('front.user.sidebar.sidebar')


                <div class="ec-shop-rightside col-lg-9 col-md-12">
                    <div class="ec-vendor-dashboard-card ec-vendor-setting-card">
                        <div class="ec-vendor-card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ec-vendor-block-profile">
                                        <div class="ec-vendor-block-img space-bottom-30">
                                            <div class="ec-vendor-block-bg">
                                                <a href="#" class="btn btn-lg btn-primary"
                                                    data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal"
                                                    data-bs-target="#edit_modal">Edit Detail</a>
                                            </div>
                                            <div class="ec-vendor-block-detail">
                                                <img class="v-img" src="{{ $users->image }}" alt="vendor image">
                                                <h5 class="name">{{ $users->name }}</h5>
                                                <p>( Business Man )</p>
                                            </div>
                                            <p>Hello <span>{{ $users->name }}</span></p>
                                            <p>From your account you can easily view and track orders. You can manage and
                                                change your account information like address, contact information and
                                                history of orders.</p>
                                        </div>
                                        <h5>Account Information</h5>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-address mar-b-30">
                                                    <h6>Address<a href="javasript:void(0)" data-link-action="editmodal"
                                                            title="Edit Detail" data-bs-toggle="modal"
                                                            data-bs-target="#address_modal"><i class="fi-rr-edit"></i></a>
                                                    </h6>
                                                    <ul>
                                                        <li><strong>Home : </strong>{{ $users->full_address }}</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-address">
                                                    <h6>Change Password<a href="javasript:void(0)"
                                                            data-link-action="editmodal" title="Edit Detail"
                                                            data-bs-toggle="modal" data-bs-target="#password_modal"><i
                                                                class="fi-rr-edit"></i></a></h6>
                                                    <ul>
                                                        <li><strong>Office : </strong>123, 2150 Sycamore Street, dummy text
                                                            of
                                                            the, San Jose, California - 95131.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End User profile section -->


    <!-- Modal -->
    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="ec-vendor-block-img space-bottom-30">
                            <div class="ec-vendor-block-bg cover-upload">
                                <div class="thumb-upload">
                                    <div class="thumb-edit">
                                        <input type='file' id="thumbUpload01" class="ec-image-upload"
                                            accept=".png, .jpg, .jpeg" />
                                        <label><i class="fi-rr-edit"></i></label>
                                    </div>
                                    <div class="thumb-preview ec-preview">
                                        <div class="image-thumb-preview">
                                            <img class="image-thumb-preview ec-image-preview v-img"
                                                src="{{ asset('front/assets/images/banner/8.jpg') }}" alt="edit" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ec-vendor-upload-detail">
                                <form class="row g-3" action="{{ route('profile') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="ec-vendor-block-detail">
                                        <div class="thumb-upload">
                                            <div class="thumb-edit">
                                                <input type='file' name="profile_photo_path" id="thumbUpload02"
                                                    value="{{ $users->image }}" class="ec-image-upload"
                                                    accept=".png, .jpg, .jpeg" />
                                                <label><i class="fi-rr-edit"></i></label>
                                            </div>
                                            <div class="thumb-preview ec-preview">
                                                <div class="image-thumb-preview">
                                                    <img class="image-thumb-preview ec-image-preview v-img"
                                                        src="{{ $users->image }}" alt="edit"
                                                        name='profile_photo_path' />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 space-t-15">
                                        <label for="name">Full Name</label>
                                        @if ($errors->has('name'))
                                            <span style="color: red;">{{ $errors->first('name') }}</span>
                                        @endif
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name', $users->name) }}" placeholder="Enter your name">
                                    </div>

                                    <div class="col-md-6 space-t-15">
                                        <label for="email">Email</label>
                                        @if ($errors->has('email'))
                                            <span style="color: red;">{{ $errors->first('email') }}</span>
                                        @endif
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ old('email', $users->email) }}" placeholder="example@gmail.com">
                                    </div>

                                    <div class="col-md-6 space-t-15">
                                        <label>Gender</label>
                                        @if ($errors->has('gender'))
                                            <span style="color: red;">{{ $errors->first('gender') }}</span>
                                        @endif
                                        <select name="gender" class="form-control">
                                            <option @selected(old('gender', $users->gender) == 1) value="1" selected>Male </option>
                                            <option @selected(old('gender', $users->gender) == 0) value="0">Female</option>
                                            <option @selected(old('gender', $users->gender) == 2)value="2">Not Intressted </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 space-t-15">
                                        <label>Status</label>
                                        @if ($errors->has('status'))
                                            <span style="color: red;">{{ $errors->first('status') }}</span>
                                        @endif
                                        <select name="status" class="form-control">
                                            <option @selected(old('status', $users->status) == 1) value="1">Active</option>
                                            <option @selected(old('status', $users->status) == 0) value="0">inActive</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 space-t-15">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="#" class="btn btn-lg btn-secondary qty_close"
                                            data-bs-dismiss="modal" aria-label="Close">Close</a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->


    <!-- Modal -->
    <div class="modal fade" id="address_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="ec-vendor-block-img space-bottom-30">

                            <div class="ec-vendor-upload-detail">
                                <form class="row g-3" action="{{ route('updateAddress') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-md-12 space-t-15">
                                        <label>Country</label>
                                        @if ($errors->has('country_id'))
                                            <span style="color: red;">{{ $errors->first('country_id') }}</span>
                                        @endif
                                        <select name="country_id" class="form-control"
                                            style="border: 1px solid lightgray !important;">
                                            @foreach ($countries as $country)
                                                <option @selected(old('country_id', $users->addresses ? $users->addresses->state->country->id : '') == $country->id) value="{{ $country->id }}">
                                                    {{ $country->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 space-t-15">
                                        <label>State</label>
                                        @if ($errors->has('state_id'))
                                            <span style="color: red;">{{ $errors->first('state_id') }}</span>
                                        @endif
                                        <select name="state_id" class="form-control"
                                            style="border: 1px solid lightgray !important;">
                                            @foreach ($states as $state)
                                                <option @selected(old('state_id', $users->addresses ? $users->addresses->state->id : '') == $state->id) value="{{ $state->id }}">
                                                    {{ $state->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 space-t-15">
                                        <label for="address_line">Address Line</label>
                                        @if ($errors->has('address_line'))
                                            <span style="color: red;">{{ $errors->first('address_line') }}</span>
                                        @endif
                                        <input type="text" class="form-control" name="address_line" id="address_line"
                                            value="{{ old('address_line', $users->addresses ? $users->addresses->address_line : '') }}"
                                            placeholder="Enter your address">
                                    </div>

                                    <div class="col-md-6 space-t-15">
                                        <label for="post_code">Post Code</label>
                                        @if ($errors->has('post_code'))
                                            <span style="color: red;">{{ $errors->first('post_code') }}</span>
                                        @endif
                                        <input type="text" class="form-control" name="post_code" id="post_code"
                                            value="{{ old('post_code', $users->addresses ? $users->addresses->post_code : '') }}"
                                            placeholder="Enter your Post Code">
                                    </div>

                                    <div class="col-md-12 space-t-15">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="#" class="btn btn-lg btn-secondary qty_close"
                                            data-bs-dismiss="modal" aria-label="Close">Close</a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
    <!-- Modal -->
    <div class="modal fade" id="password_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="ec-vendor-block-img space-bottom-30">

                            <div class="ec-vendor-upload-detail">
                                <form class="row g-3" action="{{ route('userPassword') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label for="oldPassword">Old password</label>
                                        @if ($errors->has('oldPassword'))
                                            <span style="color: red;">{{ $errors->first('oldPassword') }}</span>
                                        @endif
                                        <input type="password" class="form-control" name="oldPassword"
                                            placeholder="********">
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="newPassword">New password</label>
                                        @if ($errors->has('newPassword'))
                                            <span style="color: red;">{{ $errors->first('newPassword') }}</span>
                                        @endif
                                        <input type="password" class="form-control" name="newPassword"
                                            placeholder="********">
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="confirmPassword">Confirm password</label>
                                        @if ($errors->has('confirmPassword'))
                                            <span style="color: red;">{{ $errors->first('confirmPassword') }}</span>
                                        @endif
                                        <input type="password" class="form-control" name="confirmPassword"
                                            placeholder="********">
                                    </div>
                                    <div class="col-md-12 space-t-15">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="#" class="btn btn-lg btn-secondary qty_close"
                                            data-bs-dismiss="modal" aria-label="Close">Close</a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
@endsection

@section('scripts')
    <!-- Datatables -->
    <script src="{{ asset('back/assets/plugins/data-tables/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('back/assets/plugins/data-tables/datatables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('back/assets/plugins/data-tables/datatables.responsive.min.js') }}"></script>
    <script>
        @if ($errors->any())
            $(document).ready(function() {
                $('#edit_modal').modal('show');
            });
        @endif

        @if ($errors->any())
            $(document).ready(function() {
                $('#password_modal').modal('show');
            });
        @endif
    </script>
@endsection
