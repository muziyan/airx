@extends("layout.app")

@section("link")
    <link rel="stylesheet" href="{{asset("css/frame.css")}}">
    <link rel="stylesheet" href="{{asset("css/default.css")}}">
    <link rel="stylesheet" href="{{asset("css/formpage.css")}}">
    <link rel="stylesheet" href="{{asset("css/result.css")}}">
@stop

@section("main")
<main class="bg-eee">
    <div class="wrapper bg-wt cl-dk ta-lt">
        <div class="big-title fz-24">
            <img src="{{asset("images/tick.png")}}" alt="ok">
            Your ticket(s) of flight <span class="cl-og">{{$flight->fno}}</span> is successfully purchased.
        </div>
        <div class="detail-info fz-18">
            <p>
                This order contains following contents:
            </p>
            <p>
                3 AIRX flight ticket(s) of flight {{$flight->fno}} (<span class="tt-cp">{{explode('/',url()->current())[5]}} Class</span>).
            </p>
            <p>
                The guests are:
                <br>
                @foreach($guests as $guest)
                {{$guest->guest_name}}, ID Card:{{$guest->card}}<br>
                @endforeach
            </p>
            <p>
                Your flight will take off at <span class="cl-bl">{{$order->order_time}}</span>. Please be prepared for boarding.
                <br>
                Thank you for choosing our flights.
            </p>
            <p>
                <br>
                <button class="br-sm bt-lt">
                    <a href="{{route("home")}}">
                        Back to Index
                    </a>
                </button>
                &nbsp;&nbsp;&nbsp;
                <button class="br-sm bt-lt">
                    <a href="select_seat.blade.php">
                        Check In
                    </a>
                </button>
                &nbsp;&nbsp;&nbsp;
                <button class="br-sm bt-lt download">
                    Download txt
                </button>
            </p>
        </div>
    </div>
</main>
@stop
