@extends('layouts.app')

@section('title', '新建提交')

@push('css')
<link rel="stylesheet" type="text/css" href="/css/wangEditor.min.css">
@endpush()

@push('javascript')
<script type="text/javascript" src="/js/wangEditor.min.js"></script>
    <script type="text/javascript">
        $(function () {
            var wEditor = new wangEditor('divWangEditor');
            wEditor.create();
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
                    <textarea id="divWangEditor" class="form-control" rows="3" name="content" style="height: 350px">
                    </textarea>
                </div>
                <button type="submit" class="btn btn-success">Create post</button>
            </form>
        </div>
    </div>
</div>
@endsection
