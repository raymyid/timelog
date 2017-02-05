@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-hover">
                @foreach ($posts as $post)
                <tr>
                    <td><a href="{{ route('post.show', uuid_convert($post->post_id)) }}">{{ $post->post_title }}</a></td>
                    <td>{{ $post->post_content }}</td>
                    <td></td>
                </tr>
                @endforeach
            </table>

            {{ $posts->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
