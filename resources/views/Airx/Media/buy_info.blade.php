@extends("layout.app")

@section("link")
		<link rel="stylesheet" href="{{asset("css/frame.css")}}">
		<link rel="stylesheet" href="{{asset("css/default.css")}}">
		<link rel="stylesheet" href="{{asset("css/formpage.css")}}">
		<link rel="stylesheet" href="{{asset("css/buy_info.css")}}">
@stop
@section("header")
		<header>
			<div class="wrapper">
				<a href="{{route("home")}}"><img src="{{asset("images/airx_logo.png")}}" alt="logo" class="logo"></a>
				<nav>
					<ul class="cl-dk">
						<li><a href="{{route("search")}}"><< Cancel</a></li>
					</ul>
				</nav>
			</div>
		</header>
@stop

@section('banner')
@stop

@section("main")
    <main class="bg-eee">
		<div class="wrapper">
			<div class="content-container bg-wt br-sm">
				<div class="flight-info fz-18 cl-gr">
					<div class="title-line">
						<b class="cl-md fz-24 bg-wt">Flight Info</b>
					</div>
					<div class="info-content">
						<div class="flight-no fz-24 cl-dk fs-it">{{$flight->fno}}</div>
						<div class="flight-model">
							MODEL <span class="cl-wt bg-bl fz-8p br-sm pd-hz">{{$flight->flight_type}}</span>
						</div>
						<div class="flight-time ta-ct">
							<div class="fz-20 cl-bl">{{$flight->time}}</div>
							<div class="fz-14 cl-gr">{{$flight->date}}</div>
						</div>
						<div class="flight-from fz-24 cl-dk ta-rt">
							{{$flight->from_city}}
						</div>
						<div class="info-arrow">
							<img src="{{asset("images/city_arrow.png")}}" alt="to">
						</div>
						<div class="flight-to fz-24 cl-dk">
							{{$flight->to_city}}
						</div>
						<div class="flight-class cl-dk bg-lt br-sm ta-ct tt-cp">
                            {{$class}}<br>
							<span class="fz-24 cl-bl">{{$flight[$classArr[0]] - $flight[$classArr[1]]}}</span> <span class="fz-14 cl-gr">left</span>
						</div>
					</div>
				</div>
				<form class="guest-info" method="post" action="result.html">
					<div class="title-line">
						<b class="cl-md fz-24 bg-wt">Guest Info</b>
					</div>
					<div class="info-content fz-18">
						<div class="guest-list">
							<span class="fw-bd cl-dk">Saved Guests:</span>
                            @foreach($guests as $guest)
							    <div class="guest-option br-sm cl-dk bg-lt" data-guest="{{$guest->id}}">{{$guest->id}}</div>
                            @endforeach
							<div class="add-guest br-sm cl-dk bg-lt">+</div>
						</div>
						<div class="guest-detail flex">
                            @foreach($guests as $guest)
                                <div class="guest-form br-sm" data-guest="{{$guest->id}}">
								<div class="form-row flex">
									<div class="field-name cl-gr">NAME</div>
									<div class="field-input"><input type="text" title="name" class="input mid" value="{{$guest->guest_name}}" readonly=""></div>
								</div>
								<div class="form-row flex">
									<div class="field-name cl-gr">PHONE</div>
									<div class="field-input"><input type="text" title="phone" class="input mid"  value="{{$guest->phone}}" readonly=""></div>
								</div>
								<div class="form-row flex">
									<div class="field-name cl-gr">GENDER</div>
									<div class="field-input">
										<select title="gender" class="input mid"  disabled="">
                                            <option {{$guest->gender == "female" ? "selected" : ""}} value="female">Female</option>
                                            <option {{$guest->gender == "male" ? "selected" : ""}} value="male">Male</option>
										</select>
									</div>
								</div>
								<div class="form-row flex">
									<div class="field-name cl-gr">ID CARD</div>
									<div class="field-input"><input type="text" title="id_card" class="input mid" value="45648945216545" readonly=""></div>
								</div>
							</div>
                            @endforeach
						</div>
						<div class="confirm ta-rt">
							<button class="bt-lt br-sm">CONFIRM &gt;</button>
						</div>
					</div>
				</form>
			</div>
		</div>
    </main>
		<script>
		$(function(){
            let template = `
                <div class="guest-form br-sm">
\t\t\t\t\t\t\t\t<button type="button" class="remove-button bt-lt br-sm">remove</button>
\t\t\t\t\t\t\t\t<div class="form-row flex">
\t\t\t\t\t\t\t\t\t<div class="field-name cl-gr">NAME</div>
\t\t\t\t\t\t\t\t\t<div class="field-input"><input type="text" title="name" class="input mid" name="name[]"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class="form-row flex">
\t\t\t\t\t\t\t\t\t<div class="field-name cl-gr">PHONE</div>
\t\t\t\t\t\t\t\t\t<div class="field-input"><input type="text" title="phone" class="input mid" name="phone[]"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class="form-row flex">
\t\t\t\t\t\t\t\t\t<div class="field-name cl-gr">GENDER</div>
\t\t\t\t\t\t\t\t\t<div class="field-input">
\t\t\t\t\t\t\t\t\t\t<select title="gender" class="input mid" name="gender[]">
\t\t\t\t\t\t\t\t\t\t\t<option value="m">Male</option>
\t\t\t\t\t\t\t\t\t\t\t<option value="f">Female</option>
\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class="form-row flex">
\t\t\t\t\t\t\t\t\t<div class="field-name cl-gr">ID CARD</div>
\t\t\t\t\t\t\t\t\t<div class="field-input"><input type="text" title="id_card" class="input mid" name="card"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
            `;
            $(".guest-option").on("click",function () {
                $(this).addClass("selected")
            })
            $(".add-guest").on("click",function () {
                let guestDetail = $(".guest-detail")
                if(parseInt($(".flight-class .cl-bl").text()) <= guestDetail.children().length){
                    return false;
                }
                guestDetail.append(template)

                $(".guest-form .remove-button").on("click",function () {
                    $(this).parent().remove();
                })
            })
		});
		</script>
@stop
