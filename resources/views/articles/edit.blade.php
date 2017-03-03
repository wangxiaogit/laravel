@extends('layouts.app')
@section('content')
    <div class="container">
        <section class="content">
            <div class="pad group">
                <h1>撰写新文章</h1>
                {!! Form::model($article,['method'=>'PATCH','url'=>'article/'.$id]) !!}
                <div class="form-group">
                    {!! Form::label('title', '标题：') !!}
                    {!! Form::text('title',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', '正文：') !!}
                    {!! Form::textarea('content',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('published_at', '发布日期：') !!}
                    {!! Form::input('date','published_at',date('Y-m-d'),['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tag_list', '标签：') !!}
                    {!! Form::select('tag_list[]',$tags, $article->tags->lists("id")->toArray(),['class'=>'form-control js-example-basic-multiple','multiple'=>'multiple']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('发表文章',['class'=>'btn btn-success form-control']) !!}
                </div>
                {!! Form::close() !!}

                @include('errors.list')
            </div>
        </section>
    </div>
    <script type="text/javascript">
        $(function () {
            $(".js-example-basic-multiple").select2({
                placeholder:"添加标签"
            });
        });
    </script>
@endsection