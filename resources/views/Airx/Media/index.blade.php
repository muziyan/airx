@extends("layout.app")

@section("link")
    <link rel="stylesheet" href="{{asset("css/frame.css")}}">
    <link rel="stylesheet" href="{{asset("css/default.css")}}">
    <link rel="stylesheet" href="{{asset("css/formpage.css")}}">
    <link rel="stylesheet" href="{{asset("css/index.css")}}">
@stop

@section("banner")
    <section class="banner">
        <div class="wrapper">
            <form class="search-form" action="{{route("search")}}" method="post">
                @csrf()
                <div class="form-row">
                    <b class="cl-dk fz-18 tt-uc">Search Flight</b>
                </div>
                <div class="form-row flex">
                    <div class="field-name"><label class="cl-gr">From</label></div>
                    <div class="field-input">
                        <select title="from" class="input" name="from">
                            <option selected>Any city</option>
                            @foreach($cities as $city)
                                <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="field-name"><label class="cl-gr">To</label></div>
                    <div class="field-input">
                        <select title="to" class="input" name="to">
                            <option selected>Select a city</option>
                            @foreach($cities as $city)
                                <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row flex">
                    <div class="field-name"><label class="cl-gr">Departure</label></div>
                    <div class="field-input"><input type="date" title="departure" class="input" name="date"></div>
                </div>
                <div class="form-row flex">
                    <div class="field-name"><label class="cl-gr">Travel Class</label></div>
                    <div class="field-input">
                        <select title="class" class="input" name="class">
                            <option selected>Any class</option>
                            <option>First Class</option>
                            <option>Business Class</option>
                            <option>Economic Class</option>
                        </select>
                    </div>
                </div>
                <div class="form-row ta-rt">
                    <input type="submit" class="bt-lt" value="View offers >">
                </div>
            </form>
            <div class="service-intro cl-wt">
                <div class="form-row">
                    <b class="fz-18 tt-uc">Special  airport  service</b>
                </div>
                <p class="tt-uc">
                    Lorem ipsum dolor sit amet, consect etur adipisicing elit. Architecto com modideseNunt ea et temporibus.
                </p>
                <div class="form-row">
                    <a href="#" class="cl-bl">Learn more ></a>
                </div>
            </div>
        </div>
    </section>
@stop

@section("main")
<main>
    <div class="wrapper cl-wt">
        <div class="block"><a href="">My Trip</a></div>
        <div class="block"><a href="{{route("check_in")}}">Check In</a></div>
        <div class="block"><a href="{{route("ucenter")}}">My Account</a></div>
    </div>
</main>

<script>
    $(function () {
        let $fromSelect = $("select[name=from]");
        let $toSelect = $("select[name=to]");

        optionHide($fromSelect,$toSelect)
        optionHide($toSelect,$fromSelect)

        function optionHide(dom,dom1) {
            dom.on("change",function () {
                dom1.children().map((i,v)=>{
                    if($(this).val() === $(v).val()){
                        $(v).hide();
                    }else{
                        $(v).show()
                    }
                })
            })
        }
    })
</script>
@stop
