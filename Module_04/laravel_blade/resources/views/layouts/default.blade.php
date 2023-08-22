<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="container">
    <header class="row header_area">
        @include('includes.header')
    </header>
    <div id="main" class="row">
        @yield('content')
    </div>
    <footer class="row footer-area section-gap">
        @include('includes.footer')
    </footer>
</div>
</body>
</html>
