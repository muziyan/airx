@extends("layout.app")

@section("link")
    <link rel="stylesheet" href="css/frame.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/formpage.css">
    <link rel="stylesheet" href="css/check_in.css">
@stop

@section("banner")
@stop

@section("main")
<main class="bg-eee">
    <div class="wrapper">
        <div class="content-container bg-wt br-sm fz-14 cl-gr">
            <div class="fz-18">
                <div class="title-line">
                    <b class="cl-md fz-24 bg-wt">Check in via guest info</b>
                </div>
                <div class="info-content">
                    <p class="cl-og"></p>
                    <form action="select_ticket_guest.html">
                        <div class="form-row flex">
                            <div class="field-name">ID Card</div>
                            <div class="field-input"><input type="text" title="ID card" name="idCard" class="input mid"
                                                            value=""></div>
                        </div>
                        <div class="form-row flex">
                            <div class="field-name">Phone</div>
                            <div class="field-input"><input type="text" title="phone" name="phone" class="input mid"
                                                            value=""></div>
                        </div>
                        <div class="form-row ta-rt">
                            <button class="bt-lt br-sm">Check in via guest info ></button>
                        </div>
                    </form>
                </div>
                <div class="title-line account-line">
                    <b class="cl-md fz-24 bg-wt btn">Check in via account</b>
                </div>
                <div class="info-content">
                    <form class="form-row flex" action="select_ticket.html">
                        <span class="field-name">Or you can just:</span>
                        <a class="field-input ta-rt">
                            <button class="bt-lt br-sm">Check in via account ></button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@stop
