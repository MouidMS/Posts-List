<!DOCTYPE html>
<html>
<head>
    <title>{{config('app.name')}} - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
@include('layouts.navbar')

<div class="container py-5">
    @yield('content')
</div>


@include('layouts.footer')

</body>
</html>
