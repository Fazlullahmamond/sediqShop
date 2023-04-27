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
						<p class="sub-title">Browse The Collection of blogs</p>
					</div>
				</div>
			</div>
            
			<div class="row margin-minus-t-15">
                @foreach ($blogs as $blog)
					<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
						<div class="ec-blog-card media-1" style="background-image: url({{ $blog->image_url }})">
							<div class="ec-title-content">
								<h3><a href="{{ route('blog.details', $blog->id) }}">{{ substr($blog->title, 0, 30) }}...</a></h3>
								<div class="ec-intro"> <a href="#">Inspiration</a> </div>
							</div>
							<div class="ec-card-info">
								{{ substr($blog->description, 0, 100) }}...
								<a href="{{ route('blog.details', $blog->id) }}">Read Article</a>
							</div>
							<div class="ec-utility-info">
								<ul class="ec-utility-list">
									<li><span class="licon icon-dat"></span><a href="#">{{ $blog->created_at->diffForHumans() }}</a></li>
								</ul>
							</div>
							<div class="ec-color-overlay"></div>
						</div>
					</div>
                @endforeach
			</div>
		</div>
	</section>
	<!--/END Blog Style -->

    	
@endsection