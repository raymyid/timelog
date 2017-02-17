@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading" style="text-align: center;">
            <h1>{{ $post->title }}</h1>
            作者 <a href="{{ route('users.show2', $post->user->username) }}">{{ $post->user->nickname or $post->user->username }}</a>
            - 发布于 <span>{{ carbon_diff($post->created_at) }}</span>

            - 最后修改于 <span>{{ carbon_diff($post->updated_at) }}</span>
@if (Auth::guest() === false)
    @if (strcmp(Auth::user()->id, $post->user_id) === 0)
- <a href="{{ route('posts.edit', $post->id) }}">编辑</a>
    @endif
@endif
        </div>
        <div class="panel-body">
            <div class="post-content">
                {!! $post->content !!}
            </div>
        </div>
        <!-- <div class="panel-footer"></div> -->
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            评论
        </div>
        <div class="panel-body">

        </div>
        <!-- <div class="panel-footer"></div> -->
    </div>
</div>
@endsection
