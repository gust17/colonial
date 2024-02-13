@extends('auth.padrao')
@section('conteudo')
    <div>
        <div>

            <h1 class="logo-name">VJa+</h1>

        </div>
        <h3>Realize seu Cadastro</h3>
        <p>Junte-se ao VerticalizeJa e comece a organizar sua preparação para concursos! Cadastre-se agora e tenha
            acesso ao edital verticalizado de forma simplificada e eficaz.</p>
        <form class="m-t" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">

                <input placeholder="Nome" id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                       name="name"
                       value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>
            <div class="form-group">


                <input placeholder="CPF" id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror"
                       name="cpf"
                       value="{{ old('cpf') }}" required autocomplete="cpf">

                @error('cpf')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>

            <div class="form-group">


                <input placeholder="Email" id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email"
                       value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>
            <div class="form-group">


                <input placeholder="Whatsapp ou Telefone" id="whatsapp" type="text"
                       class="form-control @error('whatsapp') is-invalid @enderror"
                       name="whatsapp"
                       value="{{ old('whatsapp') }}" required autocomplete="whatsapp">

                @error('whatsapp')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>

            <div class="form-group">

                <input placeholder="Senha" id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>

            <div class="form-group">

                <input placeholder="Confirme a senha senha" id="password-confirm" type="password" class="form-control"
                       name="password_confirmation"
                       required
                       autocomplete="new-password">

            </div>


            <button type="submit" class="btn btn-primary btn-block">
                Cadastrar
            </button>

        </form>
        <p class="m-t"><small>VeticalizeJa &copy; 2024</small></p>
    </div>
@endsection
