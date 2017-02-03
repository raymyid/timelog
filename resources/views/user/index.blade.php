@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <img src="/img/avatar.png" alt="" class="img-thumbnail" style="height:230px;">
            <h2>{{ $user->id }}</h2>
            <h4>{{ $user->name }}</h4>
        </div>
        <div class="col-lg-9">
            <table class="table table-hover">
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
