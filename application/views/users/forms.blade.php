@layout('layouts.default')

@section('content')

<div id="pageContainer">

	<!-- Tabs -->
	<ul id="tabs" class="clearfix">
		<li class="inactiveTab fl" id="signInTab">
			<a href="{{ URL::base() }}/users/dashboard">
				<div class="signInTabContentDash">
					<span>Welcome to your Dashboard</span>
					@include('users.partials.user_header') 
				</div>
			</a>
			<span class="activeTabArrow"><!-- --></span>
		</li>
		<li class="activeTab fr" id="signUpTab">
				<div class="signUpTabContentDash">
					<span>Fill the online</span>
					<h1>Registration Forms</h1>
				</div>
			<span class="activeTabArrow"><!-- --></span>
		</li>
	</ul>
	
	<!-- Sign In Tab Content -->
	<div id="dashboard">
	
		<div id="logout" class="inner-container clearfix">

		 @include('users.partials.user_metadata')
		                         				
		</div><!-- end logout -->			

		<div id="main-dashboard" class="inner-container clearfix">
			<div class="dash-sep"><!--  --></div>
			<h2><!-- --></h2>
			@if(Session::has('message'))
				{{ Session::get('message') }}
			@endif

			<div id="downloadable-forms" class="half_grid">
				<h2 class="form">Forms Section</h2>
				<ul id="form-sections">
					<li><strong>A </strong>{{ HTML::link_to_route('biodata','Personal Information') }} {{ (Bhu::form_completion() >= 1)? '<span class="reg-forms-complete">&nbsp;</span>' : ''}}</li>
					<li><strong>B </strong>{{ HTML::link_to_route('education','Educational Information') }} {{ (Bhu::form_completion() >= 2)? '<span class="reg-forms-complete">&nbsp;</span>' : ''}}</li>
					<li><strong>C </strong>{{ HTML::link_to_route('parents','Parent / Guardian / Sponsor\'s Information') }} {{ (Bhu::form_completion() >= 3)? '<span class="reg-forms-complete">&nbsp;</span>' : ''}}</li>
				</ul>

			</div><!-- end downloadable-forms -->

		<div id="settings" class="half_grid">
			<h2 class="status">Registration Status</h2>
			@include('users.partials.user_registration_status')

			<div class="dash-sep-inner"><!--  --></div>
			<h2 class="upload">Uploads</h2>

			<ul>
				<li class="doc">{{ HTML::link_to_route('upload','Upload Passport &amp; Supporting Documents') }}</li>
				<li class="doc">{{ HTML::link_to_route('uploaded','View Uploaded Documents') }}</li>
			</ul>

		</div><!-- end settings -->	

		</div><!-- end main-dashboard -->

	</div> <!-- end signIn -->

</div> <!-- end pageContainer -->

@endsection