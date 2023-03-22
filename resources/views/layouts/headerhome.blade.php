<div class="header-top">
	 <div class="container">
		 <div class="logo">			
				 <h1><a href="index.html"><i class="nav-icon fas fa-paw">PET SOCIETY</i></a></h1>			
		 </div>
		 <div class="details">				 
				<div class="locate">
					 <div class="detail-grid">
						 <div class="lctr">
								<img src="images/lct.png" alt=""/>
						 </div>
						 <p>Adoption Inquiries,
						 <span>petsociety0708@gmail.com</span></p>
						 <div class="clearfix"></div>
					 </div>
					 <div class="detail-grid">
						 <div class="lctr">
								<img src="images/phn.png" alt=""/>
						 </div>
						 <p>Tel:1115550001</p>
						 <div class="clearfix"></div>
					 </div>
				</div>
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>
<div style="background-color: #967259;" class="header">
	 <div class="container">
		 <div class="top-menu">
			 <span class="menu"><img src="images/menu.png" alt=""></span>
			 <ul class="nav1">
				 <li><a href="{{ Route('home.index') }}">Home</a>
				 <li><a href="{{ Route('contact.create') }}">Contact</a></li>
				 <li><a href="{{ Route('login.form') }}">Login</a></li>
			 </ul>
		 </div>
		 <!-- script-for-menu -->
							 <script>
							   $( "span.menu" ).click(function() {
								 $( "ul.nav1" ).slideToggle( 300, function() {
								 // Animation complete.
								  });
								 });
							</script>
		 <!-- /script-for-menu -->
		 <div class="search">					
				<form action="{{ Route('search.animal') }}" method='get'>
				 <input type="text" name ="query" value="" placeholder="Search...">
				 <input type="submit" value="">
				</form>					
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>