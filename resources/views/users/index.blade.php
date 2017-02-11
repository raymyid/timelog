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
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nickname }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
