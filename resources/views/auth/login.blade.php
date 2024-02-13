@extends('auth.padrao')
@section('conteudo')
    <div>
        <div>

            <h1 class="logo-name">VJa+</h1>

        </div>
        <h3>Bem Bindo ao VerticalizeJa</h3>
        <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
            <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
        </p>
        <p>Login in. To see it in action.</p>
        <form class="m-t" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">


                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>

            <div class="form-group">



                <input placeholder="Senha" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            Lembre-me
                        </label>
                    </div>
                </div>
            </div>



            <button type="submit" class="btn btn-primary btn-block">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    <small>Esqueceu sua senha?</small>
                </a>
            @endif
            <p class="text-muted text-center"><small>Ainda não tem conta?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="{{route('register')}}">Crie agora!!</a>


        </form>

        <p class="m-t"> <small>VeticalizeJa &copy; 2024</small> </p>
    </div>
@endsection
