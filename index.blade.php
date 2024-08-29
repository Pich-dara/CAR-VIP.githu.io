<!DOCTYPE html>
<html lang="km">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CAR-VIP</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
		<script src="../js/filament/Morderncar.js"></script>
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
		<link rel="stylesheet" href="../css/Morderncar.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light " >
	<img class="logo" src="../logo/CarLogo-1 copy.png" alt="">
	<button class="bar-color" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span><i class="fas fa-bars"></i></span>
	</button>

	<div class="collapse navbar-collapse ml-0" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto ">
			<li class="nav-item">
				<a class="text-colorlist" href="/index"><i class="fas fa-home"></i><span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="text-color" href="/tax-paper-car">ឡានក្រដាសពន្ធ</a>
			</li>
			<li class="nav-item">
				<a class="text-color" href="/license-plate-car">ឡានផ្លាកលេខ</a>
			</li>
			<li class="nav-item">
				<a class="text-color" href="/accessory">គ្រឿងបន្លាស់</a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0 ml-3" action="{{ route('cars.search') }}" method="GET">
			<input class="form-control mr-sm-2 search" type="search" name="query" placeholder="ស្វែងរក" aria-label="Search" value="{{ request('query') }}">
			<button class="btn button my-2 my-sm-0" type="submit"><i class="fas fa-search "></i></button>	
		</form>
		<button class="rounded-circle ml-2" onclick="myFunction()" id="darkTheme" name="darkTheme"><i class="fas fa-sun"></i></button>
		<button class="rounded-circle moon ml-2" onclick="myFunction()" id="darkTheme" name="darkTheme"><i class="fas fa-moon"></i></button>
		<button class="back-history ml-2"  onclick="history.back()"><i class="fas fa-undo-alt"></i></button>
		<a href="#scroll-on"><button class="back-history ml-2"><i class="fas fa-chevron-up"></i></button></a>
		<a href="#scroll-under"><button class="back-history ml-2"><i class="fas fa-chevron-down"></i></button></a>
	</div>
</nav>

<div class="container mt-5 p-2 " id="scroll-on">
					<div class="row autoplay-banner " dir="rtl">
					@foreach ($banners as $banner)
						<div class="col-12 col-banner  p-0">
								<a href="{{route('cars.banner',['iD' => $banner->id])}}">
									<div class="banner">
										<figure>
											<img src="{{ asset('storage/'.$banner->banner_image) }}" alt="">
										</figure>
										<p>{{ $banner->banner_caption }}</p>
										<div class="time">
											<p>បានបង្ហោះ​ {{ $banner->created_at }}</p>
										</div>
									</div>
								</a>
						</div>
					@endforeach
					
					</div>
				</div>

				<div class="container p-5 top-top">
								@if(count($brands) > 4)									
									<div class="Arrow_prev">
										<span><i class="fas fa-angle-double-right"></i></span>
									</div>
									<div class="Arrow_next">
										<span><i class="fas fa-angle-double-left"></i></span>
									</div>
									<div class="row mb-4 multiple-items ">									
										@foreach ($brands as $brand)
												<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mt-1 p-1">
                                                    <a href="{{route('cars.brand',['ID' => $brand->id])}}">
                                                        <div class="logo-brand">
																<figure class="mx-auto">
																		<img src="{{ asset('storage/'.$brand->brand_logo) }}" height="300px" class="card-img-top" alt="...">
																</figure>
																<p>{{ $brand->brand_name }}</p>
														</div>
                                                    </a>
												</div>
										@endforeach		
									</div>
								@else
									<div class="Arrow_prev_else">
										<span><i class="fas fa-angle-double-right"></i></span>
									</div>
									<div class="Arrow_next_else">
										<span><i class="fas fa-angle-double-left"></i></span>
									</div>
									<div class="row mb-4">									
										@foreach ($brands as $brand)
												<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mt-1 p-1">
                                                    <a href="{{route('cars.brand',['ID' => $brand->id])}}">
                                                        <div class="logo-brand">
																<figure class="mx-auto">
																		<img src="{{ asset('storage/'.$brand->brand_logo) }}" height="300px" class="card-img-top" alt="...">
																</figure>
																<p>{{ $brand->brand_name }}</p>
														</div>
                                                    </a>
												</div>
										@endforeach		
									</div>
								@endif
				</div>

				<div class="container p-1 ">
						
									<div class="row ">
										<div class="col-12 p-1">
											<p class="tag ml-0">បានបង្ហោះ​</p>
											<a class="continue" href="/index-see-more">មើលបន្ត</a>
										</div>
									</div>
									
									@if(count($cars) > 4)
									<div class="row mb-4 autoplay" dir="rtl">
											@foreach ($cars as $car)
												<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mt-1 p-1">
                                                    <a href="{{route('cars.picture',['id' => $car->id])}}">
                                                        <div class="post">
																<figure>
																		<img src="{{ asset('storage/'.$car->gallery) }}"  class="img-fluid card-img-top" alt="...">																																																							
																		<div class="clip-past-shadow">
																			<p class="category">{{ $car->category->category_name }}</p>
																		</div>
																		<div class="right-right">
																			<p class="discount">{{$car->discount_text}} {{$car->discount}}{{$car->discount_sign}}</p>																			
																			<p class="price">{{$car->price}}{{$car->currency}}</p>
																		</div>
																</figure>
																<div class="card-body " dir="ltr">
																		<div class="type">
																			<h6>{{ $car->type->text }}</h6>
																			<p class="float-right">{{ $car->brand->brand_name }}</p>
																		</div>
																		<div  class="card-text">
																			<p>{{$car->caption}}</p>
																		</div>
																		<div class="card-model">
																			<h6>{{ $car->model }}</h6>
																			<span  class="float-right ml-0">{{ $car->count }}<i class="fas fa-eye"></i></span>
																		</div>
																</div>
																<div class="card-footer">
																		<small class="text-muted"><p>{{$car->created_at}}</p></small>
																		<div class="float-right " dir="ltr">
																			<h6 class="float-left buy">បញ្ជាទិញ<i class="fas fa-hand-point-right icon"></i></h6>
																			<a href=" {{ $car->contact->link_Messenger }} " ><i class="fab fa-facebook-messenger"></i></a>
																			<a href=" {{ $car->contact->link_Telegram }} " ><i class="fab fa-telegram"></i></a>
																		</div>
																</div>
														</div>
                                                    </a>
												</div>
											@endforeach
									</div>
									@else
									<div class="row mb-4">
											@foreach ($cars as $car)
												<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mt-1 p-1">
                                                    <a href="{{route('cars.picture',['id' => $car->id])}}">
                                                        <div class="post">
																<figure>
																		<img src="{{ asset('storage/'.$car->gallery) }}"  class=" img-fluid card-img-top" alt="...">
																		<div class="clip-past-shadow">
																			<p class="category">{{ $car->category->category_name }}</p>
																		</div>
																		<div class="right-right">
																			<p class="discount">{{$car->discount_text}} {{$car->discount}}{{$car->discount_sign}}</p>
																			<p class="price">{{$car->price}}{{$car->currency}}</p>
																		</div>
																</figure>
																<div class="card-body">
																		<div class="type">
																			<h6>{{ $car->type->text }}</h6>
																			<p class="float-right">{{ $car->brand->brand_name }}</p>
																		</div>
																		<div  class="card-text">
																			<p>{{$car->caption}}</p>
																		</div>
																		<div class="card-model">
																			<h6>{{ $car->model }}</h6>
																			<span  class="float-right ml-0">{{ $car->count }}<i class="fas fa-eye"></i></span>
																		</div>
																</div>
																<div class="card-footer">
																		<small class="text-muted" dir="rtl"><p>{{$car->created_at}}</p></small>
																		<div class="float-right " >
																			<h6 class="float-left buy">បញ្ជាទិញ<i class="fas fa-hand-point-right icon"></i></h6>
																			<a href=" {{ $car->contact->link_Messenger }} " ><i class="fab fa-facebook-messenger"></i></a>
																			<a href=" {{ $car->contact->link_Telegram }} " ><i class="fab fa-telegram"></i></a>
																		</div>
																</div>
														</div>
                                                    </a>
												</div>
											@endforeach
									</div>
									@endif
						
				</div>
				<div class="container-fluid on-footer mt-5" id="scroll-under">
					<div class="row">
						<div class="col-sm-6 col-xs-12 mt-3 text-center">
							<h5 class="w-50  text-center  mb-4 mx-auto"><i class="fas fa-warehouse mr-3"></i>អាស័យដ្ឋាន</h5>
							<div class="text-center w-100 mx-auto  address">
								@foreach ($addresses as $address)
									<a href="{{$address->google_maps}}">
										<p class="float-left pr-2">ចុចទីនេះ <i class="fas fa-hand-point-right icon"></i> {{$address->no}}</p>
										<p class="float-left pr-2">{{$address->st}}</p>
										<p class="float-left pr-2">{{$address->village}}</p>
										<p class="float-left pr-2">{{$address->commune}}</p>
										<p class="float-left pr-2">{{$address->district}}</p>
										<p class="float-left pr-2">{{$address->province}}</p>
										<p class="float-left pr-2">{{$address->country}}</p>
									</a>
								@endforeach
							</div>
						</div>
						<div class="col-sm-6 col-xs-12 col-6-img text-center mt-3 ">
							<h5 class="w-50 pl-2  text-left mb-4 mx-auto"><i class="fas fa-phone-alt mr-3"></i>ទំនាក់ទំនងតាមលេខទូរស័ព្ទ</h5>
							<div class="phone text-left w-50 mx-auto">
								@foreach ($phonenumbers as $phonenumber)
									<p><img src="{{ asset('storage/'.$phonenumber->phone_image) }}" alt="">. {{$phonenumber->phone_system}} <i class="fas fa-phone-square"></i></p>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid  footer ">
					<div class="row row-footer ">
						<div class="col-12 d-flex justify-content-center col-12-footer">
							<img  src="../logo/CarLogo-1 copy.png" alt="">
						</div>
					</div>
				</div>
</body>
</html>

