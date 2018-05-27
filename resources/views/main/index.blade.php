@extends('index')

@section('header') 

@endsection
       
@section('content')
    
	<div id="main_carousel" class="carousel slide">
		<div class="container-fluid  top_header">
		<header>
			<nav>
				<a href="{{ url('') }}" class="logo">
					<img src="{{ asset('img/logo.png') }}">
				</a>
				<div class="toggle">
					<span class="menu"></span>
					<span class="menu"></span>
					<span class="menu"></span>
					<span class="menu"></span>
				</div>
				<ul>
					<li>
						<a href="#">Home</a>
					</li>
					<li>
						<a href="#services">services</a>
					</li>
					<li>
						<a href="#contact">Contact</a>
					</li>
				</ul>
			</nav>
		</header>
		</div>
	    <div class="carousel-inner">

	    	<?php $i = 0 ?>
	    	@foreach($Data['Slider'] as $slide)
			    <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
			     	<img src="{{ asset('storage/slider/') . '/' . $slide->image }}">
			        <div class="date">
	  					<span>{{ date('d.m.', strtotime($slide->created_at)) }}</span>
	  					<h3>{{ $slide->title }}</h3>
	  				</div>
			    </div>
			    <?php $i++ ?>
		    @endforeach

		</div>
  		<a class="carousel-control-prev" href="#main_carousel" data-slide="prev"><i class="fa fa-long-arrow-left"></i></a>
  		<a class="carousel-control-next" href="#main_carousel" data-slide="next"><i class="fa fa-long-arrow-right"></i></a>	
	</div>
	<section id="services" class="container-fluid services">
		<h1>
			<a href="#">The corner garage for collector cars</a>
		</h1>
		<div class="row car">
			@foreach($Data['Services'] as $service)
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="car1">
						<a href=""><img src="{{ asset('storage/services/') . '/' . $service->image}}"></a>
						<h4><a href="#">{{ $service->title }}</a></h4>
					</div>
				</div>
			@endforeach
		</div>
		<div class="row">
			<div class="col-md-12">			
			<div class="tree"><img src="{{ asset('img/tree.png') }}"></div>
			<div class="road"></div>
			<div class="bus"><img src="{{ asset('img/bus.png') }}"> </div>
		</div>
		</div>
	</section>
	<section id="contact" class="container-fluid map_contact">
		<div id="map" class="map"> </div>
			<div class="container contact">
				<div class="row ">
					<div class="d-none d-xl-block col-xl-4">
						<h2>
							<a href="#">contact information</a>
						</h2>				
						<h3>
							<a href="#">click to view</a>
						</h3>
						<ul class="soc_icons">
							<li>
								<a href="{{ $Data['Socials'][0]->url }}" class="facebook" target="_blank">
									<i class="fa fa-facebook"></i>
								</a>
							</li>
							<li>
								<a href="{{ $Data['Socials'][1]->url }}" class="google" target="_blank">
									<i class="fa fa-google-plus"></i>
								</a>
							</li>
							<li>
								<a href="{{ $Data['Socials'][2]->url }}" class="twitter" target="_blank">
									<i class="fa fa-twitter"></i>
								</a>
							</li>
						</ul>
					</div>
					<div class="col-xl-8 mail">
						<h4><a href="#">get in tauch </a></h4>
							<form method="post" onsubmit="return contact.check(this)" action="{{ url('sendMail') }}">
								<div class="row">
									<div class="col-12 col-sm-6">
										<div class="form-input">
											<input type="text" class="name" id="Name" name="Name" placeholder="name" data-error="*">
										</div>
										<div class="form-input">
											<input type="text" class="email" id="Email" name="Email" placeholder="email" data-error="*">
										</div>
										<div class="form-input">
											<input type="text" class="subject" id="Subject" name="Subject" placeholder="subject" data-error="*">
										</div>
										<div class="form-input">
											<textarea id="Message" name="Message" rows="4" cols="22" placeholder="text" data-error="*"></textarea>
										</div>
									</div>
									<div class=" col-12 col-sm-6 form2">
										<div class="form-input gender-input">
											<input type="radio" id="gender" class="male" name="Gender" value="1" data-error="*"><p>male</p> 
											<input type="radio" class="female" name="Gender" value="2" ><p>female</p>
										</div>
										<div class="check">
											<h6>Sign up for newsletter:</h6><br>
											<input type="checkbox" id="one" name="ReciveData[]" value="1">
											<label for="fruit1">recive images</label><br>
											<input type="checkbox" id="two" name="ReciveData[]" value="2">
											<label for="fruit2">recive promotions</label><br>
											<input type="checkbox" id="three" name="ReciveData[]" value="3">
											<label for="fruit3">recive updates</label><br>
											<input type="checkbox" id="four" name="ReciveData[]" value="4">
											<label for="fruit4">recive new cameras</label><br>
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="submit" class="submit" value="send">
											<div class="success-message"></div>
										</div>
								</div>
							</form>
						
					</div>
				</div>
			</div>	
	</section>
	
		<div id="footer" div class="container-fluid footer">
			<div class="container">
				<div class="row">
					<div class="col-6 copyright">
						<p>© copyright 2018</p>
					</div>
					<div class=" col-6 right ">
						<span>created by: Marina Qerdikashvili</span>
					</div>
				</div>
			</div>
		</div>


	<script>
	// toggle
		
		
	function initMap() {
	var uluru = {lat: 41.715138, lng: 44.827096};
	var map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 12,
	  center: uluru
	});
	var marker = new google.maps.Marker({
	  position: uluru,
	  map: map
	});
	}


	</script>
	<script async defer
	    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd8lACm5VQU1_7EiMYbqBg7kr83zkj4EA&callback=initMap">
	</script>

@endsection
        

@section('footer')

@endsection
