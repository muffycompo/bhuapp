@layout('layouts.default')

@section('content')

<div id="pageContainer">
	
	<!-- Sign In Tab Content -->
	<div id="dashboard">
	
		<div id="logout" class="inner-container clearfix">

		 
		                         				
		</div><!-- end logout -->			

		<div id="main-dashboard" class="inner-container clearfix">
			<h2><!-- --></h2>
			@if(Session::has('message'))
				{{ Session::get('message') }}
			@endif

			<div id="downloadable-forms" class="half_grid">
				<h2 class="form">Documentation</h2>
				<ul id="form-sections">
					<li>{{ HTML::link_to_route('registration_guide','Registration Guide (PDF)', '', array('target'=>'_blank')) }}</li>
					<li>{{ HTML::link('http://www.youtube.com/user/mfawaalfred','Registration Guide (Video)', array('target'=>'_blank')) }}</li>
				</ul>
			</div><!-- end downloadable-forms -->

			<div id="downloadable-forms" class="half_grid">
				<ul id="form-sections">
					<h2 class="form">Navigation</h2>
					@if(Auth::check()) }}
						<li>{{ HTML::link_to_route('dashboard','Dashboard') }}</li>
					@else
						<li>{{ HTML::link_to_route('home','Login') }}</li>
					@endif
				</ul>
			</div><!-- end downloadable-forms -->

		</div><!-- end main-dashboard -->

	</div> <!-- end signIn -->

</div> <!-- end pageContainer -->

@endsection