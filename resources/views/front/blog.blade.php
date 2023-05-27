<?php
    $title = "Visit Our Blog";
    $type = "website";
    $url = "https://www.sediq.net/blog";
    $image = "front/assets/images/blog-image/blog.jpg";
    $description = "On our blog, we share the latest trends, tips on styling and accessorizing, and other news related to the fashion industry. We believe that fashion is a form of self-expression, and we want to help our customers find the perfect pieces to express themselves with. Thanks for visiting!";
    $site_name = "W World";
?>
@extends('front.components.layout')

@section('main')

	<!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Blog</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                                <li class="ec-breadcrumb-item active">Blog</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- Ec breadcrumb end -->

    <!-- START Blog Style -->
	<section class="ec-card-blog section-space-p">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="section-title">
						<h2 class="ec-bg-title">Blogs</h2>
						<h2 class="ec-title">Blogs</h2>
						<p class="sub-title" style="text-align: justify">Welcome to the W World blog! We're a leading e-commerce platform offering a wide range of products including clothing, shoes, bags, and more. Our goal is to provide our customers with a seamless shopping experience, from browsing our extensive selection to placing their order and receiving their items. On our blog, we share the latest trends, tips on styling and accessorizing, and other news related to the fashion industry. We believe that fashion is a form of self-expression, and we want to help our customers find the perfect pieces to express themselves with. Thanks for visiting!</p>
					</div>
				</div>
			</div>
            
			<div class="row margin-minus-t-15">
                @foreach ($blogs as $blog)
					<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
						<a href="{{ route('blog.details', $blog->id) }}">
                            <div class="ec-blog-card media-1" style="background-image: url({{ $blog->image_url }})">
                                <div class="ec-title-content">
                                    <h3><a href="{{ route('blog.details', $blog->id) }}">{{ substr($blog->title, 0, 40) }}...</a></h3>
                                </div>
                                <div class="ec-card-info">
                                    {{ substr($blog->description, 0, 100) }}...
                                    <a href="{{ route('blog.details', $blog->id) }}">Read Article</a>
                                </div>
                                <div class="ec-utility-info">
                                    <ul class="ec-utility-list">
                                        <li><span class="licon icon-dat"></span><p>{{ $blog->created_at->diffForHumans() }}</p></li>
                                    </ul>
                                </div>
                                <div class="ec-color-overlay"></div>
                            </div>
                        </a>
					</div>
                @endforeach
			</div>
		</div>
	</section>
	<!--/END Blog Style -->

    	
@endsection