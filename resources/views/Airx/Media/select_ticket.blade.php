@extends("layout.app")

@section("link")
    <link rel="stylesheet" href="css/frame.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/formpage.css">
    <link rel="stylesheet" href="css/check_in.css">
@stop

@section("section")
<header>
    <div class="wrapper">
        <a href="{{route("home")}}"><img src="{{asset("images/airx_logo.png")}}" alt="logo" class="logo"></a>
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
                <b class="cl-md fz-24 bg-wt">Check In</b>
            </div>
            @foreach($orders as $order)
            <div class="order br-sm">
                <div class="order-head bg-eee">
                    <span class="order-time cl-999">{{$order->order_time}}</span>
                    <span class="order-no"><b class="cl-dk">Order No:</b> {{$order->id}}</span>
                </div>
                <div class="order-detail flex">
                    <div class="order-col flex">
                        <span class="cl-dk fw-bd">{{$order->flight()->first()['from_city']}} - {{$order->flight()->first()['to_city']}}]}</span>
                        <span><b class="cl-dk">Flight No:</b> {{$order->flight()->first()['fno']}}</span>
                        <span><b class="cl-dk">Departure Time: </b>{{$order->flight()->first()['time']}} {{$order->flight()->first()['date']}}</span>
                    </div>
                    <div class="order-col flex">
                        <div class="ticket-amount"><b class="cl-dk">Ticket Amount:</b> {{count($order->Ticket()->get())}}</div>
                        <div class="ticket-guests cl-dk flex ta-ct">
                            @foreach($order->Ticket()->get() as $ticket)
                                <span class="guest-name">{{$ticket->guest()->first()['guest_name']}}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="order-col ta-ct ct-ctn">
                        <div class="ticket-status ct-ele">
                            <b class="cl-dk">Ticket Status: </b><br>
                            {{$order->order_status}}
{{--                            Check-in available--}}
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
