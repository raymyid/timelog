@extends('layouts.app')

@section('title', '新建提交')

@push('css')
@endpush()

@push('javascript')
<script src='/js/tinymce/tinymce.min.js'></script>
    <script type="text/javascript">
    $( "#divtextarea" ).append("<textarea id=\"posttextarea\" name=\"content\" ></textarea>");
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
                <h2>Creae a new post</h2>
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
            <form action="{{ route('posts.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control input-lg" name="title" placeholder="Title: sample title">
                </div>
                <div class="form-group">
                    <div id="divtextarea">    
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Create post</button>
            </form>
        </div>
    </div>
</div>
@endsection
