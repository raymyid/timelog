@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <img src="{{ $user->avatar or '/img/avatar.png' }}" class="img-thumbnail" style="height:230px;">
            <h4>{{ $user->nickname }}</h4>
            <h5>{{ $user->username }}</h5>
        </div>
        <div class="col-lg-9">
            <table class="table table-hover">

                @foreach ($user->posts as $post)
                <tr>
                    <td><a href="{{ route('posts.show2', uuid_stringToHex($post->id)) }}">{{ $post->title }}</a></td>
                    <td>更新于 {{ carbon_diff($post->updated_at) }}</td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</div>
@endsection
