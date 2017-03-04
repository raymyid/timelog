@extends('layouts.app')

@section('title', '修改')

@push('css')
@endpush()

@push('javascript')
<script src='/js/tinymce/tinymce.min.js'></script>
    <script type="text/javascript">
    tinymce.init({
        selector: '#posttextarea',
        menubar: false,
        toolbar: 'bold italic underline strikethrough | link blockquote image | numlist bullist | removeformat | code | fullscreen',
        plugins: 'link image lists code fullscreen',
        language: 'zh_CN',
        height: 350,
        code_dialog_height: 220,
        default_link_target: "_blank",
        imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions"
    });
    </script>
@endpush()

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header">
                <h2>Edit post</h2>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('posts.update', $post->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <input type="text" class="form-control input-lg" name="title" placeholder="Title: sample title" value="{!! $post->post_title !!}">
                </div>
                <div class="form-group">
                    <div id="divtextarea">
                        <textarea id="posttextarea" name="content">{!! $post->post_content !!}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update post</button>
            </form>
        </div>
    </div>
</div>
@endsection
