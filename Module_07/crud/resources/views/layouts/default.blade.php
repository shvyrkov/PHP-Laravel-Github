<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="container mt-4">
    <header class="row header_area header">
        @include('includes.header')
    </header>
    <div id="main" class="row">
        @yield('user_form')
    </div>
    <footer class="row footer-area section-gap">
        @include('includes.footer')
    </footer>
</div>
</body>
</html>
