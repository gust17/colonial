<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>VerticalizeJa | Login</title>

    <link href="{{asset(url('css/bootstrap.min.css'))}}" rel="stylesheet">
    <link href="{{asset(url('font-awesome/css/font-awesome.css'))}}" rel="stylesheet">

    <link href="{{asset(url('css/animate.css'))}}" rel="stylesheet">
    <link href="{{asset(url('css/style.css'))}}" rel="stylesheet">
    <style>
        .form-control input {
            color: black !important;
        }
        p{
            color: black;
        }
        span {
            color: black;
        }
    </style>

</head>

<body class="navy-bg">

<div class="middle-box  animated fadeInDown">
    <div>
        <center>
            <img width="70%" class="img img-responsive" src="{{asset('logo.png')}}" alt="">
        </center>
    </div>
    @yield('conteudo')

</div>

<!-- Mainly scripts -->
<script src="{{asset('js/jquery-2.1.1.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script src="{{asset('js/bootstrap.min.js')}}"></script>

<script src="//code.jivosite.com/widget/7IlpzCWHxS" async></script>
<script>
    $(document).ready(function() {
        $('#phone').mask('(00)00000-0000'); // Aplica a máscara ao campo de telefone
        $('#cpf').mask('000.000.000-00'); // Aplica a máscara ao campo de telefone
    });
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-QQGRZ34LGM"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-QQGRZ34LGM');
</script>
</body>

</html>

