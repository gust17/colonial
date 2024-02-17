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

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
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
</body>

</html>

