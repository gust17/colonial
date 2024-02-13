<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Esqueceu sua senha</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="passwordBox animated fadeInDown">
    <div class="row">

        <div class="col-md-12">
            <div class="ibox-content">

                <h2 class="font-bold">Esqueceu sua senha</h2>

                <p>
                    Digite seu endereço de e-mail e enviaremos um e-mail com instruções para redefinir sua senha.
                </p>

                <div class="row">

                    <div class="col-lg-12">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <form class="m-t" method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">


                                    <input placeholder="Digite seu email" id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                            </div>

                            <div class="form-group">

                                    <button type="submit" class="btn btn-primary btn-block">
                                        Enviar Link de Redefinição de Senha
                                    </button>
                                <a href="{{route('login')}}" class="btn btn-success btn-outline btn-block">
                                    Voltar para o Login
                                </a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
          CodeGus
        </div>
        <div class="col-md-6 text-right">
            <small>© 2024</small>
        </div>
    </div>
</div>

</body>

</html>




