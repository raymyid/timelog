@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <h6>
        <span class="glyphicon glyphicon-globe" aria-hidden="true"></span> 唯一编号：
        <a href="{{ route('posts.show2', uuid_decode($post->id)) }}">{{ $post->id }}</a>
    </h6>
    <h6>
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 作者：
            <a href="{{ route('users.show2', $post->user->username) }}">
                {{ $post->user->nickname }}
            </a>
    </h6>
    <h6>
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 创建日期：
        <span>{{ carbon_diff($post->created_at) }}</span>
    </h6>
    <h6>
        <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 最后更新：
        <span>{{ carbon_diff($post->updated_at) }}</span>
    </h6>
    <div class="">
{!! $post->content !!}
    </div>
</div>
@endsection
