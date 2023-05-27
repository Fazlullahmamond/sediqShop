<?php
    $title = $blog->title;
    $type = "website";
    $url = "https://www.sediq.net/blog/" . $blog->id;
    $image = $blog->image_url;
    $description = $blog->description;
    $site_name = "W World";
?>

@extends('front.components.layout')

@section('main')
        <!-- Ec Blog page -->
        <section class="ec-page-content section-space-p">
            <div class="container">
                <div class="row">
                    <div class="ec-blogs-rightside col-lg-8 col-md-12">
    
                        <!-- Blog content Start -->
                        <div class="ec-blogs-content">
                            <div class="ec-blogs-inner">
                                <div class="ec-blog-main-img">
                                    <img class="blog-image" src="{{ $blog->image_url }}" alt="{{ $blog->tag }}" />
                                </div>
                                <div class="ec-blog-date">
                                    <p class="date">{{ $blog->created_at->diffForHumans() }} </p>
                                </div>
                                <div class="ec-blog-detail">
                                    <h3 class="ec-blog-title">{{ $blog->title }}</h3>
                                    <p>{{ $blog->description }}</p>
                                </div>
                                <div class="ec-blog-tags">{{ $blog->tag }}</div>
                            </div>
                        </div>
                        <!--Blog content End -->
                    </div>
                    <!-- Sidebar Area Start -->
                    <div class="ec-blogs-leftside col-lg-4 col-md-12">
                        <div class="ec-blog-search">
                            <form class="ec-blog-search-form" action="#">
                                <input class="form-control" placeholder="Search Our Blog" type="text" id="blog-input">
                                <div id="search-results" style="position: absolute; z-index: 99; background-color: white; width: 300px; padding: 20px; box-shadow: black 10px 10px 20px; display:none;"></div>
                            </form>
                        </div>
                        <div class="ec-sidebar-wrap">
                            <!-- Sidebar Recent Blog Block -->
                            <div class="ec-sidebar-block ec-sidebar-recent-blog">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Recent Articles</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    @foreach ($recent_blogs as $blog)
                                        
                                        <div class="ec-sidebar-block-item">
                                            <img src="{{ $blog->image_url }}" alt="{{ $blog->description }}" style="width: 30%; float: right; margin: 10px;">
                                            <h5 class="ec-blog-title"><a href="{{ route('blog.details', $blog->id) }}">{{ $blog->title }}</a></h5>
                                            <p><a href="{{ route('blog.details', $blog->id) }}">{{ $blog->title }}{{ substr($blog->description, 0, 50) }}...</a></p>
                                            <div class="ec-blog-date">{{ $blog->created_at->diffForHumans() }}</div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                            <!-- Sidebar Recent Blog Block -->
                            <!-- Sidebar Category Block -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        const selectElement = document.querySelector('#blog-input');
        selectElement.addEventListener('input', (event) => {
        var query = $('#blog-input').val();
            $.ajax({
            url: '/searchBlog',
            data: {query: query},
            success: function(response) {
                var results = response;
                var dropdown = $('#search-results');
                dropdown.empty();
                dropdown.show();
                if (results.length > 0) {
                $.each(results, function(index, result) {
                    var link = '<a href="/blog/'+result.id+'">'+result.title+'</a>';
                    dropdown.append('<div class="result">'+link+'</div>');
                });
                } else {
                dropdown.append('<div class="no-results">No results found</div>');
                }
                dropdown.show();
            },
            error: function(response) {
                alert(response);
            }
            });
    });

        $(document).click(function() {
            $('#search-results').hide();
        });
    });
</script>

@endsection