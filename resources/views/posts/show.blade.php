@extends('layouts.app')

@section('title', $post->post_title)

@push('javascript')
<script src='/js/tinymce/tinymce.min.js'></script>
    <script type="text/javascript">
    tinymce.init({
        selector: '#form-comment-textarea',
        menubar: false,
        toolbar: 'bold italic underline strikethrough | link blockquote image | numlist bullist | removeformat | code | fullscreen',
        plugins: 'link image lists code fullscreen',
        language: 'zh_CN',
        height: 250,
        width: 650,
        code_dialog_height: 220,
        default_link_target: "_blank",
        imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions"
    });
    </script>
@endpush()

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading" style="text-align: center;">
            <h1>{{ $post->post_title }}</h1>
            作者 <a href="{{ route('users.show2', $post->post_user->username) }}">{{ $post->post_user->nickname or $post->post_user->username }}</a>
            - 发布于 <span>{{ carbon_diff($post->created_at) }}</span>

            - 最后修改于 <span>{{ carbon_diff($post->updated_at) }}</span>
@if (Auth::guest() === false)
    @if (strcmp(Auth::user()->id, $post->post_user_id) === 0)
- <a href="{{ route('posts.edit', $post->id) }}">编辑</a>
    @endif
@endif
        </div>
        <div class="panel-body">
            <div class="post-content">
                {!! $post->post_content !!}
            </div>
        </div>
        <!-- <div class="panel-footer"></div> -->
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Comments: {{ count($post->post_comments) }}
        </div>
        <div class="panel-body">
            <div id="post-comments-list">

@foreach ($post->post_comments as $comment)
                <div class="d-table width-full py-2 border-bottom border-gray-light">
                    <div class="d-table-cell v-align-top" style="width: 32px;">
                        @if ($comment->comment_user_id === 0)
                        <img class="border rounded-2" width="32px" alt="no login user's avatar" src="/img/null_avatar.png" >
                        @else
                        <a href="{{ route('users.show2', $comment->comment_user->username) }}">
                            <img class="border rounded-2" width="32px" alt="{{ $comment->comment_user->username }}'s avatar" src="{{ isset($comment->comment_user->avatar) ? $comment->comment_user->avatar : '/img/default_avatar0.png'}}" >
                        </a>
                        @endif
                    </div>
                    <div class="d-table-cell pl-2 v-align-top">
                        <div class="pb-1" style="line-height: initial;">
                            @if ($comment->comment_user_id === 0)
                            <span style="font-weight: bold;">匿名用户</span>
                            @else
                            <a href="{{ route('users.show2', $comment->comment_user->username) }}">
                                <span style="font-weight: bold;">{{ $comment->comment_user->nickname }}</span>
                            </a>
                            @endif
                        </div>
                        <div class="pt-1">
                            {!! $comment->comment_content !!}
                        </div>
                        <div class="d-block f6 grasy">
                            <div class="d-inline-block">
                                <span class="glyphicon glyphicon-time"></span>
                                <span>{{ carbon_diff($comment->created_at) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
@endforeach
                <div class="pt-4">
                    <form action="{{ route('comments.store') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="comment_post_id" value="{{ $post->id }}">
                        <input type="hidden" name="comment_user_id" value="{{ is_null(auth()->user()) ? '0' : auth()->user()->id }}">
                        <input type="hidden" name="comment_to_user_id" value="{{ $post->post_user_id }}">
                        <div id="divtextarea">
                            <textarea id="form-comment-textarea" name="comment_content" style="height:250px; width: 650px; resize: none;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Submit Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
