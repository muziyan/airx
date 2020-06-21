@extends("layout.app")

@section("link")
    <link rel="stylesheet" href="css/frame.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/formpage.css">
    <link rel="stylesheet" href="css/search.css">
@stop

@section("banner")
<section class="banner medium">
    <div class="wrapper ct-ctn">
        <form action="{{route("search")}}" method="post" class="search-box flex bg-wt fz-16 ct-ele ta-lt">
            @csrf()
            <div class="field-col">
                <div class="field-name cl-dk"><b>From</b></div>
                <div class="field-input">
                    <select title="from" class="input mid" name="from">
                        <option selected>Any city</option>
                        @foreach($cities as $city)
                            <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="field-col">
                <div class="field-name cl-dk"><b>To</b></div>
                <div class="field-input">
                    <select title="to" class="input mid" name="to">
                        <option selected>Select a city</option>
                        @foreach($cities as $city)
                            <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="field-col">
                <div class="field-name cl-dk"><b>Departure</b></div>
                <div class="field-input">
                    <input type="date" name="date" title="departure_time" class="input mid" value="">
                </div>
            </div>
            <div class="field-col">
                <div class="field-name cl-dk"><b>Travel Class</b></div>
                <div class="field-input">
                    <select title="class" class="input mid" name="class">
                        <option>Any class</option>
                        <option>First Class</option>
                        <option selected>Business Class</option>
                        <option>Economic Class</option>
                    </select>
                </div>
            </div>
            <div class="field-col">
                <div class="field-input">
                    <input type="submit" class="bt-lt" value="SEARCH >">
                </div>
            </div>
        </form>
    </div>
</section>
@stop

@section("main")
<main class="bg-eee">
    <div class="wrapper">
        @foreach($flights as $flight)
            <div class="flight-info bg-wt fz-18 br-sm">
            <div class="info1 cl-gr">
                <div class="flight-no">{{$flight->fno}}</div>
                <div class="flight-model">
                    MODEL <span class="cl-wt bg-bl fz-8p br-sm pd-hz">{{$flight->flight_type}}</span>
                </div>
            </div>
            <div class="info-from ta-ct">
                <div class="flight-time fz-20 cl-bl">{{$flight->time}}</div>
                <div class="flight-date fz-12 cl-gr">{{$flight->date}}</div>
                <div class="flight-from fz-24 cl-dk">{{$flight->from_city}}</div>
            </div>
            <div class="info-arrow ct-ctn">
                <img src="images/city_arrow.png" alt="to" class="ct-ele">
            </div>
            <div class="info-to">
                <div class="flight-from fz-24 cl-dk">{{$flight->to_city}}</div>
            </div>
            <div class="info-class flex ta-ct">
                <div class="class-option br-sm">
                    <div class="class-name fz-16 cl-dk">First Class</div>
                    <div class="class-num fz-24 cl-lt">{{$flight->f_tol - $flight->f_num}}</div>
                </div>
                <div class="class-option br-sm">
                    <div class="class-name fz-16 cl-dk">Business</div>
                    <div class="class-num fz-24 cl-lt">{{$flight->b_tol - $flight->b_num}}</div>
                </div>
                <div class="class-option br-sm" >
                    <div class="class-name fz-16 cl-dk">Economic</div>
                    <div class="class-num fz-24 cl-lt">{{$flight->e_tol - $flight->e_num}}</div>
                </div>
            </div>
            <div class="info-button">
                <a href="{{route("buy_info",[$flight->id,'First class'])}}">
                    <button class="bt-lt br-sm fw-nm fz-16">BUY NOW ></button>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</main>
<script>
    $('.info-class .br-sm').on('click',function () {
        if($(this).children('.cl-lt').text() === "0"){
            return false;
        }
        let $a = $(this).parent().next().children("a")
        let prevSelected = $(this).parent().children(".selected");
        let href;
        if(prevSelected.length === 0){
            href = $a.attr("href").replace("First%20class",$(this).children(".cl-dk").text())
        }else{
            href = $a.attr("href").replace(prevSelected.children(".cl-dk").text(),$(this).children(".cl-dk").text())
        }
        $a.attr("href",href)
        $(this).addClass("selected").siblings().removeClass('selected')
    })
    $(".info-button a").on("click",function () {
        if(!$(this).parent().prev().children().hasClass("selected")){
            return false;
        }
    })
</script>
@stop
