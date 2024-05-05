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
<body>

<x-layout.header />

<x-layout.nav />

<main>
    @yield("contenido")
</main>

</body>
</html>
