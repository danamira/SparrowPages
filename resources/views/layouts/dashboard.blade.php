<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{adminConfig('page_title')}} | @yield('title')</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/materialdesignicons.min.css">
</head>
<body>
@include('Header')
@yield('content')

@include('Includes.pop')
<script src="/js/j.js"></script>
<script src="/js/sparrow.js"></script>
</body>
</html>
