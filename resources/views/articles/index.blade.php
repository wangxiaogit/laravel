@extends('layouts.app')
@section('content')
    <div class="container">
        <section class="content">
            <div class="pad group">
                @foreach($articles as $article)
                    <article class="format-image group">
                        <h2 class="post-title pad">
                            <a href="/article/{{ $article->id }}"> {{ $article->title }}</a>
                        </h2>

                        <ul class="post-meta pad group">
                            <li><i class="fa fa-clock-o"></i>{{ $article->published_at->diffForHumans() }}</li>
                            @if($article->tags)
                                @foreach($article->tags as $tag)
                                    <li><i class="fa fa-tag"></i>{{ $tag->name }}</li>
                                @endforeach
                            @endif
                        </ul>

                        <div class="post-inner">
                            <div class="post-deco">
                                <div class="hex hex-small">
                                    <div class="hex-inner"><i class="fa"></i></div>
                                    <div class="corner-1"></div>
                                    <div class="corner-2"></div>
                                </div>
                            </div>
                            <div class="post-content pad">
                                <div class="entry custome">
                                    {{ $article->introduction }}
                                </div>
                                <a class="more-link-custom" href="/articles/{{ $article->id }}"><span><i>更多</i></span></a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </div>
@endsection