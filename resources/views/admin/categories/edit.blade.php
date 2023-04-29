@php
    $menu = ['dashboard' => '', 'user' => 'has-sub', 'category' => 'has-sub active', 'product' => 'has-sub', 'order' => 'has-sub', 'blog' => 'has-sub', 'review' => '', 'contact' => ''];
@endphp

@extends('admin.components.layout')



@section('main')
    <div class="row">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Edit Category</h4>

                    <form action="{{ route('categories.update' , $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <div class="form-group row">
                            <label for="text" class="col-6 col-form-label">Name</label>
                            <div class="col-6">
                                <input id="text" name="name" class="form-control here slug-title" type="text"
                                    value="{{ $category->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-6 col-form-label">Short Description</label>
                            <div class="col-6">
                                <textarea id="sortdescription" name="description" cols="40" rows="2" class="form-control"
                                    value="">{{ $category->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <img src="{{ asset('storage/images/categories/'.$category->image) }}" width="200" height="200" alt="">                            <label class="col-6 col-form-label">Image</label>
                            <div class="col-6">
                                <input type="file" id="Categoryimage" name="image" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button name="submit" type="submit" class="btn btn-primary" style="max-height: 300px">Submit</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
