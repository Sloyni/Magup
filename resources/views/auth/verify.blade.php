@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verification requise') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un email a été envoyé') }}
                        </div>
                    @endif

                    {{ __('Vous devez verifier votre adresse mail pour debloquer cette action') }}
                    {{ __('Si vous n\'avez pas recu la confirmation cliquez sur') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">{{ __('Renvoyer') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
