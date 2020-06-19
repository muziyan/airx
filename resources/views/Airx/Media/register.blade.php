@extends("layout.app")
@section("link")
    <link rel="stylesheet" href="css/frame.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/formpage.css">
@stop

@section("banner")
<section class="banner thin">
    <div class="wrapper cl-wt">
        <h1>Register</h1>
    </div>
</section>
@stop

@section("main")
<main class="fz-16">
    <div class="wrapper">
        <form action="{{route("register")}}" method="post" class="info-form">
            @csrf()
            <div class="form-row cl-dk"><b>Create a new AIRX account:</b></div>
            <p class="cl-og"></p>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">E-MAIL</label></div>
                <div class="field-input"><input type="text" name="email" title="email" class="input big" value="" required></div>
            </div>
            <p class="cl-og"></p>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">USERNAME</label></div>
                <div class="field-input"><input type="text" name="username" title="username" class="input big" value="" required></div>
            </div>
            <p class="cl-og"></p>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">PASSWORD</label></div>
                <div class="field-input"><input type="password" name="password" title="password" class="input big" required></div>
            </div>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">REPEAT PASSWORD</label></div>
                <div class="field-input"><input type="password" title="repeat_password" class="input big" required>
                </div>
            </div>
            <p class="cl-og"></p>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">GENDER</label></div>
                <div class="field-input">
                    <select title="gender" name="gender" class="input big">
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                    </select>
                </div>
            </div>
            <p class="cl-og"></p>
            <div class="form-row flex">
                <div class="field-name"><label class="cl-gr">PHONE</label></div>
                <div class="field-input"><input name="phone" type="number" minlength="11" maxlength="11" title="phone" class="input big" value="" required></div>
            </div>
            <div class="form-row">
                <input type="checkbox" title="agree" class="input va-bl" required>&nbsp;
                I agree to <a href="#" class="lk-ul">AIRX Flight Terms and Conditions</a>
            </div>
            <div class="form-row ta-rt">
                <input type="submit" title="password" class="bt-lt" value="REGISTER >">
            </div>
        </form>
    </div>
</main>
<script>
    $(".info-form").on("submit",function () {
        if($("input[title=password]").val() !== $("input[title=repeat_password]").val()){
            alert("password are inconsistent!");
            return false;
        }
    })
</script>
@stop
