
@extends("layout.app")

@section("link")
    <link rel="stylesheet" href="{{asset("css/frame.css")}}">
    <link rel="stylesheet" href="{{asset("css/default.css")}}">
    <link rel="stylesheet" href="{{asset("css/formpage.css")}}">
@stop


@section("banner")
<section class="banner thin">
    <div class="wrapper cl-wt">
        <h1>Login</h1>
    </div>
</section>
@stop

@section("main")
<main class="fz-16">
    <div class="wrapper">
        <p class="cl-gr register-now">Haven’t an AIRX account?&nbsp;&nbsp;&nbsp;<a href="{{route("register")}}" class="lk-ul">REGISTER NOW>></a></p>
        <p>
        </p>
        <form action="{{route("login")}}" class="info-form" method="POST" >
            @csrf()
            <div class="form-row cl-dk"><b>Login via your AIRX account:</b></div>
            <p class="cl-og"></p>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">USERNAME</label></div>
                <div class="field-input"><input type="text" name="username" title="username" class="input big"></div>
            </div>
            <p class="cl-og"></p>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">PASSWORD</label></div>
                <div class="field-input"><input type="password" name="password" title="password" class="input big"></div>
            </div>
            <div class="form-row ta-rt">
                <input type="submit" class="bt-lt tt-uc" value="Login >">
            </div>
        </form>
    </div>
</main>
<script>

</script>
@stop
