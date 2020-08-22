@extends('layouts.app')

@section('content')
@if(!Auth::user()->email_verified_at)
@if (session('resent'))
<div class="alert alert-success" role="alert">
    {{ __('Un email a été envoyé') }}
</div>
@endif
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <a>Votre email n'a pas encore été verifié</a>
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-primary text-white">Renvoyer</button>
    </form>
</nav>
@endif
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> My profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <img src="{{ asset('/uploads/avatars/'.$user->avatar) }}" alt="avatar" style="width:100px;height:100px;border-radius:50%;">
                        <h2>{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</h2>
                        <form enctype="multipart/form-data" action="{{ route('profile') }}" method="POST">
                            <label>Update Profile Image</label>
                            <input type="file" name="avatar">
                            @csrf
                            <input type="submit" class="pull-right btn btn-sm btn-primary">
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
