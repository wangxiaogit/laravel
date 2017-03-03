@extends('layouts.app')
@section('content')
    <div class="container">
        <section class="content">
            <div class="pad group">
                <article class="format-image group">
                    <h2 class="post-title pad">
                        <a href="/article/{{ $article->id }}" rel="bookmark"> {{ $article->title }}</a>
                    </h2>
                    <div class="post-inner">
                        <div class="post-content pad">
                            <div class="entry custome">
                                {{ $article->content }}
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    </div>
@endsection
