@extends('layouts.app') @section('title', 'Posts Index') @section('content')
<!-- view: posts.index start -->
<div class="container">
    <div class="col-md-9">
        <div class="panel panel-info">
            <div class="panel-body">
                <div id="all-posts-list">
                    @foreach ($posts as $post)
                    <div class="d-table width-full py-2 border-bottom">
                        <div class="d-table-cell v-align-top" style="width: 50px;">
                            <a href="#">
                                <img class="border" width="50px" style="border-radius: 50%;" alt="{{ $post->post_user->username }}" src="{{ isset($post->post_user->avatar) ? $post->post_user->avatar : '/img/default_avatar0.png'}}" >
                            </a>
                        </div>
                        <div class="d-table-cell pl-2 v-align-top">
                            <h4 class="mt-0 mb-1">
                                <a href="{{ route('posts.show', $post->id) }}">{{ $post->post_title }}</a>
                            </h4>
                            <div class="pt-1 f6 grasy">
                                <div class="d-inline-block mr-2">
                                    <span class="glyphicon glyphicon-user"></span>
                                    <a href="{{ route('users.show2', $post->post_user->username) }}">{{ $post->post_user->nickname or $post->post_user->username }}</a>
                                </div>
                                <div class="d-inline-block mr-2">
                                    <span class="glyphicon glyphicon-time"></span>
                                    <span>{{ carbon_diff($post->updated_at) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Posts foreach end -->
                    <div class="pt-3">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection