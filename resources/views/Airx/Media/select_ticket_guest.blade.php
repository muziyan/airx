@extends("layout.app")

@section("link")
    <link rel="stylesheet" href="css/frame.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/formpage.css">
    <link rel="stylesheet" href="css/check_in.css">
@stop

@section("header")
<header>
    <div class="wrapper">
        <a href="{{route("home")}}"><img src="images/airx_logo.png" alt="logo" class="logo"></a>
        <nav>
            <ul class="cl-dk">
                <li><a href="{{route("check_in")}}"><< Cancel</a></li>
            </ul>
        </nav>
    </div>
</header>
@stop

@section("main")
<main class="bg-eee">
    <div class="wrapper">
        <div class="content-container bg-wt br-sm fz-14 cl-gr">
            <div class="title-line">
                <b class="cl-md fz-24 bg-wt">Steven Dragon's Ticket</b>
            </div>
            @foreach($tickets as $ticket)
                @php
                    $order = $ticket->order()->first();
                    $flight = $order->flight()->first();
                @endphp
            <div class="order br-sm">
                <div class="order-head bg-eee">
                    <span class="order-time cl-999">{{$order['order_time']}}</span>
                    <span class="order-no"><b class="cl-dk">Order No:</b> {{$order['id']}}</span>
                </div>

                <div class="order-detail flex">
                    <div class="order-col flex">
                        <span class="cl-dk fw-bd">{{$flight['from_city']}} - {{$flight['to_city']}}</span>
                        <span><b class="cl-dk">Flight No:</b> {{$flight['fno']}}</span>
                        <span><b class="cl-dk">Departure Time: </b>{{$flight['time']}} {{$flight['date']}}</span>
                    </div>
                    <div class="order-col ta-ct ct-ctn">
                        <div class="ticket-status ct-ele">
                            <b class="cl-dk">Ticket Status: </b><br>
                            {{$order['order_status']}}
                        </div>
                    </div>
                    <div class="order-col ct-ctn">
                        <a href="{{route("select_seat")}}">
                            <button class="check-in-button ct-ele bt-lt br-sm">CHECK IN &gt;</button>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@stop
