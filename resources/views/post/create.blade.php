@extends('layouts.app')

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
            <form action="{{ route('post.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control input-lg" name="post_title" placeholder="Title: sample title">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="post_content"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Create post</button>
            </form>
        </div>
    </div>
</div>
@endsection
