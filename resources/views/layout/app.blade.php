<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AIRX - Best Service Airlines</title>

    <script src="{{asset("js/jquery-3.1.1.js")}}"></script>
    @section("link")
    @show
</head>
<body>
    @section("header")
        <header>
            <div class="wrapper">
                <a href="{{route("home")}}"><img src="{{asset("images/airx_logo.png")}}" alt="logo" class="logo"></a>
                <nav>
                    <ul class="cl-dk">
                        <li>
                            <a href="{{route("ucenter")}}">My Account</a>
                        </li>
                        <li><a href="{{route("check_in")}}">Check In</a></li>
                        <li><a href="{{route("search")}}">Plan and Book</a></li>
                        <li><a href="{{route("home")}}">Home</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    @show

    @include("layout._flash")

    @section("banner")
    @show


    @yield("main")


    @section("footer")
        <footer>
            <div class="wrapper fz-18 cl-dk">
                <img src="{{asset("images/co2zer_icon.png")}}" alt="co2zer">
                <a href="http://www.skyteam.com">www.skyteam.com</a>
                <a href="{{route("home")}}">www.airx.com</a>
            </div>
        </footer>
        @show
</body>
</html>
