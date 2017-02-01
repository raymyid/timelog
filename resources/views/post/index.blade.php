@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-hover">
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->post_id }}</td>
                    <td>{{ $post->post_title }}</td>
                    <td>{{ $post->post_content }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
