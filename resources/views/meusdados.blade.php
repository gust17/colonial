@extends('padrao')
@section('content')
    <br>
    <div class="container">
        <div class="ibox">

            <div class="ibox-content">
                <div class="form-group">
                    <label for="">Name:</label> {{auth()->user()->name}}
                </div>
                <div class="form-group">
                    <label for="">Email:</label> {{auth()->user()->email}}
                </div>
                <div class="form-group">
                    <label for="">Telefone/Whatsapp:</label> {{auth()->user()->whatsapp}}
                </div>
            </div>
        </div>
    </div>

@endsection
