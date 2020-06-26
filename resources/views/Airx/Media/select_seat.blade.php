@extends("layout.app")

@section("link")
    <link rel="stylesheet" href="css/frame.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/formpage.css">
    <link rel="stylesheet" href="css/select_seat.css">
    <script src="js/jquery-3.1.1.js"></script>
    <style>
        .left{
            width:425px;
            padding-right:15px;
            height:300px;
            overflow-y: hidden;
            position: relative;
        }
        .left.active{
            overflow-y: auto;
        }
        .left img {
            width: 425px;
            /*object-fit: cover;*/
            position: absolute;
            top:0;
            left:0;
            /*object-position: 0 -360px;*/
        }
        .seat {
            position: absolute;
            top:0;
            left:0;
            border-radius: 3px;
            cursor: pointer;
        }

        .seat:hover {
            background-color: rgba(0, 161, 222, 0.4);
        }

        .seat.selected {
            background-color: rgba(0, 161, 222, 0.6);
        }

        .active .seat.selected {
            cursor: not-allowed;
        }

        .seat.occupied {
            background-color: rgba(255, 40, 0, 0.6);
            cursor: not-allowed;
        }

    </style>
@stop

@section("header")
<header>
    <div class="wrapper">
        <a href="index.blade.php"><img src="images/airx_logo.png" alt="logo" class="logo"></a>
        <nav>
            <ul class="cl-dk">
                <li><a href="select_ticket.blade.php"><< Cancel</a></li>
            </ul>
        </nav>
    </div>
</header>
@stop

@section("main")
<main class="bg-eee">
    <div class="wrapper">
        <div class="content-container bg-wt br-sm">
            <div class="title-line">
                <b class="cl-md fz-24 bg-wt">Select Seat</b>
            </div>
            <div class="info-content">
                <div class="left">
                    <img src="../Data/Plane Structure/300ER/300ER_appearance.jpg" alt="plane structure">
                    <div class="seat-layer">
{{--                        <div class="seat occupied" style="top:54px;left:134px;"--}}
{{--                             data-id="32"--}}
{{--                             data-row="11"--}}
{{--                             data-col="A"--}}
{{--                        ></div>--}}
{{--                        <div class="seat occupied" style="top:50px;left:151px;"--}}
{{--                             data-id="33"--}}
{{--                             data-row="11"--}}
{{--                             data-col="C"--}}
{{--                        ></div>--}}
                    </div>
                </div>
                <p class="ta-lt cl-wt fz-20 hint-text">Select a seat.
                    <button class="bt-lt br-sm btn-ok">OK</button>
                </p>
                <div class="right cl-dk">
                    <p class="fz-24 fw-bd">Flight <em>No. JG1460</em></p>
                    <p class="fz-24 model-info">
                        <b class="cl-wt bg-bl fz-8p br-sm pd-hz">300ER</b>
                        <span class="bg-lt br-sm fz-8p ta-ct tt-cp flight-class">
                            business
                        </span>
                    </p>
                    <div class="guest-list fz-18">
                        <div class="guest flex" data-id="10">
                            <div class="guest-name">John Doe</div>
                            <div class="selected-seat cl-gr">
                                Please select a seat.
                            </div>
                            <div class="select-button ct-ctn">
                                <button class="bt-lt br-sm ct-ele">Select</button>
                            </div>
                        </div>
                    </div>
                    <p class="cl-gr fz-16">Please confirm all the information before you continue.</p>
                    <form class="fz-18 submit" action="result.blade.php">
                        <p>
                            <button class="bt-lt br-sm">SUBMIT ></button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(function () {
        $('.select-button>button').click(function (e) {
            $('.left').toggleClass('active');
        });

        $('.btn-ok').click(function (e) {
            $('.left').removeClass('active');
            $('.selected.guest').removeClass('selected');
        });

        window.onload = function () {
            fetch("/Data/Plane Structure/300ER/300ER_structure.json").then(res => res.json())
                .then(res =>{
                    res.model.forEach(v =>{
                        if(v.type === 6 || v.type === 7 || v.type === 8){
                            let wH = res['area'][v.type]
                            let seat = $(`
                                <div class="seat" style="top:${v.y - Math.ceil(wH.h / 2)}px;left:${v.x - Math.ceil(wH.w / 2)}px;"
                                     data-id="${v.id}"
                                     data-row="${v.row}"
                                     data-col="${v.col}"
                                ></div>
                            `);
                            seat.css({
                                width:wH.w,
                                height:wH.h
                            })
                            $(".seat-layer").append(seat)
                        }
                    })
                })
                .then(()=>{
                    $('.seat').click(function (e) {
                        e.stopPropagation();
                        var t = $(this);
                        var left = $('.left');
                        if (t.hasClass('occupied') || !left.hasClass("active")) {
                            return;
                        }
                        t.toggleClass('selected');
                    });
                })
        }
    });
</script>
@stop
