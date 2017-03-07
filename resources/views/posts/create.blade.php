@extends('layouts.app')

@section('title', '新建提交')

@push('css')
@endpush()

@push('javascript')
<script src='/js/tinymce/tinymce.min.js'></script>
    <script type="text/javascript">
    tinymce.init({
        selector: '#form-post-textarea',
        menubar: false,
        toolbar: 'bold italic underline strikethrough | link blockquote image | numlist bullist | removeformat | code | fullscreen',
        plugins: 'link image lists code fullscreen',
        skin: 'custom',
        language: 'zh_CN',
        min_height: 300,
        code_dialog_height: 220,
        default_link_target: "_blank",
        imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions"
    });
    </script>
@endpush()

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading border-0">
            <h2>Creae a new post</h2>
        </div>
        <div class="panel-body p-0 pb-3">
            {{-- 判断是否提交有错误，有并回显 --}}
            @if (count($errors) > 0)
            <div class="alert alert-danger p-5">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{-- post 表单 --}}
            <form action="{{ route('posts.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group box-shadow mt-1">
                    <input type="text" class="form-control input-lg rounded-0 border-0" name="post_title" style="background-color: #faffbd;" placeholder="Title: sample title">
                </div>
                <div id="divtextarea" class="box-shadow-large">
                    <textarea id="form-post-textarea" name="post_content" class="border-0 p-2" style="min-height:225px; width: 100%; outline: none; resize: none;" placeholder="写点什么吧..."></textarea>
                </div>
                <div class="m-3 float-right">
                    <button type="submit" class="btn btn-success">Create Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
