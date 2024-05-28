<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("titulo")</title>
    <!--Con esto se llama a los estilos de la página-->
    @vite("resources/css/app.css")
</head>
<body style="background-color: #ddcea0; color: black; min-width: 90vw; min-height: 100vh;">

<x-layout.header_publicaciones />

<main>
    @yield('contenido')
    @stack('scripts')
</main>

</body>
</html>
