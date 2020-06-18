@extends("layout.app")

@section("link")
    <link rel="stylesheet" href="css/frame.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/formpage.css">
    <link rel="stylesheet" href="css/ucenter.css">
    <script src="js/jquery-3.1.1.js"></script>
@stop


@section("banner")
<section class="banner thin">
    <div class="wrapper cl-wt">
        <h1>User Center</h1>
    </div>
</section>
@stop

@section("main")
<main class="fz-16">
    <div class="wrapper">
        <div id="logout-form" class="fz-18">
            <span class="cl-og fw-bd">Welcome back, John Doe.</span>
            <button class="bt-lt br-sm log-out" style="float:right;">Log out</button>
        </div>
        <div class="cl-gr tabs-wrapper">
            <ul class="tabs">
                <li><a class="bt-lt active" href="#profile">Profile</a></li>
                <li><a class="bt-lt " href="#guests">Guests</a></li>
            </ul>
            <ul class="tabs-content">
                <li id="profile" class=active>
                    <form action="#" id="profile-form">
                        <p class="cl-og"></p>
                        <div class="form-row flex">
                            <div class="field-name"><label class="cl-gr">E-MAIL</label></div>
                            <!--You can use property 'disabled' and style 'display' to make an input reanonly and looks like plain text.-->
                            <div class="field-input"><input type="text" title="email" class="input big display"
                                                            value="admin@airx.com" required disabled></div>

                        </div>
                        <p class="cl-og"></p>
                        <div class="form-row flex">
                            <div class="field-name"><label class="cl-gr">USERNAME</label></div>
                            <div class="field-input"><input type="text" title="username" class="input big"
                                                            value="airx_admin" required></div>
                        </div>
                        <p class="cl-og"></p>
                        <div class="form-row flex">
                            <div class="field-name"><label class="cl-gr">PASSWORD</label></div>
                            <div class="field-input"><input type="password" title="password" class="input big"
                                                            required></div>
                        </div>
                        <div class="form-row flex">
                            <div class="field-name"><label class="cl-gr">REPEAT PASSWORD</label></div>
                            <div class="field-input"><input type="password" title="repeat_password"
                                                            class="input big" required>
                            </div>
                        </div>
                        <p class="cl-og"></p>
                        <div class="form-row flex">
                            <div class="field-name"><label class="cl-gr">GENDER</label></div>
                            <div class="field-input">
                                <select title="gender" class="input big">
                                    <option value="f">Female</option>
                                    <option selected value="m">Male</option>
                                </select>
                            </div>
                        </div>
                        <p class="cl-og"></p>
                        <div class="form-row flex">
                            <div class="field-name"><label class="cl-gr">PHONE</label></div>
                            <div class="field-input"><input type="text" title="phone" class="input big"
                                                            value="123456789_m" required></div>
                        </div>
                        <div class="form-row ta-rt control">
                            <input type="submit" title="password" class="bt-lt tt-uc" value="Submit">
                        </div>
                    </form>
                </li>
                <li id="guests">
                    <p class="cl-og"></p>
                    <form action="#" method="post" style="width:100%">
                        <div class="guest-info bg-eee fz-16 br-sm">
                            <div class="guest-name">
                                <input type="text" title="NAME" class="input big"
                                       value="Bob Selion">
                            </div>
                            <div class="guest-detail">
                                <div class="mobile form-group">
                                    <label>MOBILE: </label>
                                    <input type="tel" title="MOBILE" class="input mid"
                                           value="123456789">
                                </div>
                                <div class="idno form-group">
                                    <label>ID CARD: </label>
                                    <input type="text" title="ID" class="input mid"
                                           value="12455877566">
                                </div>
                                <div class="idno form-group">
                                    <label>GENDER </label>
                                    <select title="gender" class="input mid">
                                        <option selected value="f">Female</option>
                                        <option value="m">Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="info-button">
                                <button class="bt-lt br-sm fw-nm fz-16">MODIFY ></button>
                                <button class="bt-lt br-sm fw-nm fz-16 delete">DELETE ></button>
                            </div>
                        </div>
                    </form>
                    <form action="#" method="post" style="width:100%">
                        <div class="guest-info bg-eee fz-16 br-sm">
                            <div class="guest-name">
                                <input type="text" title="NAME" class="input big"
                                       value="Steven Dragon">
                            </div>
                            <div class="guest-detail">
                                <div class="mobile form-group">
                                    <label>MOBILE: </label>
                                    <input type="tel" title="MOBILE" class="input mid"
                                           value="1234569874">
                                </div>
                                <div class="idno form-group">
                                    <label>ID CARD: </label>
                                    <input type="text" title="ID" class="input mid"
                                           value="45648945216545">
                                </div>
                                <div class="idno form-group">
                                    <label>GENDER </label>
                                    <select title="gender" class="input mid">
                                        <option value="f">Female</option>
                                        <option selected value="m">Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="info-button">
                                <button class="bt-lt br-sm fw-nm fz-16">MODIFY ></button>
                                <button class="bt-lt br-sm fw-nm fz-16 delete">DELETE ></button>
                            </div>
                        </div>
                    </form>
                    <form action="#" method="post" style="width:100%">
                        <div class="guest-info bg-eee fz-16 br-sm">
                            <div class="guest-name">
                                <input type="text" title="NAME" class="input big"
                                       value="Tester I">
                            </div>
                            <div class="guest-detail">
                                <div class="mobile form-group">
                                    <label>MOBILE: </label>
                                    <input type="tel" title="MOBILE" class="input mid"
                                           value="13164556745">
                                </div>
                                <div class="idno form-group">
                                    <label>ID CARD: </label>
                                    <input type="text" title="ID" class="input mid"
                                           value="211145587451154221">
                                </div>
                                <div class="idno form-group">
                                    <label>GENDER </label>
                                    <select title="gender" class="input mid">
                                        <option selected value="f">Female</option>
                                        <option value="m">Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="info-button">
                                <button class="bt-lt br-sm fw-nm fz-16">MODIFY ></button>
                                <button class="bt-lt br-sm fw-nm fz-16 delete">DELETE ></button>
                            </div>
                        </div>
                    </form>
                    <form action="#" method="post" style="width:100%">
                        <div class="guest-info bg-eee fz-16 br-sm">
                            <div class="guest-name">
                                <input type="text" title="NAME" class="input big"
                                       value="Tester II">
                            </div>
                            <div class="guest-detail">
                                <div class="mobile form-group">
                                    <label>MOBILE: </label>
                                    <input type="tel" title="MOBILE" class="input mid"
                                           value="12345678912">
                                </div>
                                <div class="idno form-group">
                                    <label>ID CARD: </label>
                                    <input type="text" title="ID" class="input mid"
                                           value="123456789123456789">
                                </div>
                                <div class="idno form-group">
                                    <label>GENDER </label>
                                    <select title="gender" class="input mid">
                                        <option value="f">Female</option>
                                        <option selected value="m">Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="info-button">
                                <button class="bt-lt br-sm fw-nm fz-16">MODIFY ></button>
                                <button class="bt-lt br-sm fw-nm fz-16 delete">DELETE ></button>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</main>
<script>
    $(".tabs>li>a").click(function (e) {
        e.preventDefault();
        $(".tabs>li>a").removeClass("active");
        $(e.target).addClass("active");
        e.target.getAttribute("href") && $(".tabs-content>li").removeClass("active").filter(e.target.getAttribute("href")).addClass("active");
    });

    $('.delete').click(function (e) {
        if (!confirm('Do you wanna delete this guest?')) {
            e.preventDefault();
        }
    });
</script>
@stop
