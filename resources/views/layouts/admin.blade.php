<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body class="">
    <div class="wrapper">

        @include('partials.header')

        <div class="main-panel">

        @include('partials.sidebar')

            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        
        @include('partials.footer')
        
        </div>
    </div>
</body>

@include('partials.scripts')

</html>
