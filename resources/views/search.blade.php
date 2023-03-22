@extends('layouts.masterhome')

@section('content')
@if(isset($animals))
<div class="project-sec">
	 <div class="container">
		 <h2>Adoptable animals</h2>
		@if(count($animals) > 0)
		  <div class="works">			  
		@foreach ($animals as $animal)
			 <div class="prjt-grid">
				 <div class="box maxheight" width='60'>
					  <a class="example-image-link" href="{{Route('home.index')}}" data-lightbox="example-7" data-title="Optional caption."><img class="example-image" src="{{ $animal->animal_image}}"></a>
					  <div class="project-info">
					   <a href="{{Route('home.index')}}">{{$animal->animal_name}}</a>
                       <p>{{$animal->animal_type}}</p>
					   <p>Breed: {{$animal->animal_breed}}</p>
					   <p>{{$animal->animal_sex}}</p>
					   <p>{{$animal->animal_age}} yrs old</p>
					   <p>Status: {{$animal->status_name}}</p>
					   <p>Adoption: {{$animal->status_name}}</p>
                       <p>Adoption: {{$animal->status_names}}</p>
                       <a href="{{ Route('contact.create') }}" ><div class="submit-btn">								
									<input type="submit" value="CONTACT US">							
							</div> </a>

					  </div>
				 </div>
			  </div>
		@endforeach	  
		@else
		<img src="{{ asset('images/no_result.png') }}" alt="Your Avatar" class="img img-responsive" style="left-margin:auto; width:210x; height:200px">
        <br>
        <h1>NO RESULT!</h1>
        <br>
        <p>I can't find what you're looking</p>
		@endif
@endif
		<div class="clearfix"></div>
@endsection