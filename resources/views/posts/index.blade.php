@extends('layouts.app')

@section('title', 'Posts All')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-hover">
                @foreach ($posts as $post)
                <tr>
                    <td><a href="{{ route('posts.show2', uuid_convert($post->id)) }}">{{ $post->title }}</a></td>
                </tr>
                @endforeach
            </table>

            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
