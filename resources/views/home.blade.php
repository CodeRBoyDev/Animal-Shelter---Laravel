@extends('layouts.masterhome')

@section('content')

<div class="project-sec">
	 <div class="container">
		 <h2>Adoptable Animals</h2>
		  <div class="works">			  
		@foreach ($animal as $animals)
			 <div class="prjt-grid">
				 <div class="box maxheight" width='60'>
					  <a class="example-image-link" href="{{Route('home.index')}}" data-lightbox="example-7" data-title="Optional caption."><img class="example-image" src="{{ $animals->animal_image}}"></a>
					  <div class="project-info">
					   <a href="{{Route('home.index')}}">{{$animals->animal_name}}</a>
					   <p>{{$animals->animal_type}}</p>
					   <p>Breed: {{$animals->animal_breed}}</p>
					   <p>{{$animals->animal_sex}}</p>
					   <p>{{$animals->animal_age}} yrs old</p>
					   <p>Status: {{$animals->status_name}}</p>
					   <p>Adoption: {{$animals->status_names}}</p>
					   <a href="{{ Route('contact.create') }}" ><div class="submit-btn">								
									<input type="submit" value="CONTACT US">							
							</div> </a>

					  </div>
				 </div>
			  </div>
		@endforeach
		<div class="clearfix"></div>
@endsection