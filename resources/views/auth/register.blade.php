@extends('auth.padrao')
@section('conteudo')
    <div>

        <h3 class="text-center">Realize seu Cadastro</h3>

        <div class="panel black-bg">
            <div class="panel-body">
                <form class="" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="">Nome</label>
                        <input style="color: black;font-size: 17px" placeholder="Nome" id="name" type="text"
                               class="input-lg form-control @error('name') is-invalid @enderror"
                               name="name"
                               value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                    <div class="form-group">

                        <label for="">CPF</label>
                        <input style="color: black;font-size: 17px" data-mask="999.999.999-99" placeholder="CPF" id="cpf" type="text"
                               class="input-lg form-control @error('cpf') is-invalid @enderror"
                               name="cpf"
                               value="{{ old('cpf') }}" required autocomplete="cpf">

                        @error('cpf')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="">Email</label>
                        <input style="color: black;font-size: 17px" placeholder="Email" id="email" type="email"
                               class="input-lg form-control @error('email') is-invalid @enderror"
                               name="email"
                               value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                    <div class="form-group">

                        <label for="">Whatsapp</label>
                        <input style="color: black;font-size: 17px" data-mask="(99)99999-9999" placeholder="Whatsapp ou Telefone"
                               id="whatsapp" type="text"
                               class="input-lg form-control @error('whatsapp') is-invalid @enderror"
                               name="whatsapp"
                               value="{{ old('whatsapp') }}" required autocomplete="whatsapp">

                        @error('whatsapp')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="">Senha</label>
                        <input style="color: black;font-size: 17px" placeholder="Senha" id="password" type="password"
                               class="input-lg form-control @error('password') is-invalid @enderror"
                               name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="">Confirme sua senha</label>
                        <input style="color: black;font-size: 17px" placeholder="Confirme a senha senha" id="password-confirm"
                               type="password" class="input-lg form-control"
                               name="password_confirmation"
                               required
                               autocomplete="new-password">

                    </div>


                    <button type="submit" class="btn btn-lg btn-success btn-block">
                        Cadastrar
                    </button>

                </form>
            </div>
        </div>
        <p class="text-center m-t"><small>ClubColonial &copy; 2024</small></p>
    </div>
@endsection
