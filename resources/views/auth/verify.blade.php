@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Falta pouco precisamos que apenas valide seu email</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Enviamos para voce um link de verificação de email
                        </div>
                    @endif

                    Ante de utilizar os recursos da aplicação por favor valide seu email por meio do link de verificação que enviamos para o seu email.
                    <br>
                    Caso você não recebeu email de verificação, clique no link a seguir para receber um novo e-mail
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Clique aqui</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
