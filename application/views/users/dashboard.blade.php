@layout('layouts.default')

@section('content')

	<div id="pageContainer">
	
		<!-- Tabs -->
		<ul id="tabs" class="clearfix">
			<li class="activeTab fl" id="signInTab">
					<div class="signInTabContentDash">
						<span>Welcome to your Dashboard</span>
						@include('users.partials.user_header') 
					</div>
				<span class="activeTabArrow"><!-- --></span>
			</li>
			<li class="inactiveTab fr" id="signUpTab">
				<a href="/users/forms">
					<div class="signUpTabContentDash">
						<span>Fill the online</span>
						<h1>Registration Forms</h1>
					</div>
				</a>
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
				<div id="downloadable-forms" class="half_grid">
					<h2 class="download">Download Forms</h2>
					<ul>
						<li class="pdf"><a href="#">Character Assessment Form</a></li>
						<li class="pdf"><a href="#">Applicant's Confidential Report</a></li>
						<li class="pdf"><a href="#">Guidance &amp; Councelling Form</a></li>
						<li class="pdf"><a href="#">UTME/DE Screening Assessment Form</a></li>
					</ul>

				</div><!-- end downloadable-forms -->

			<div id="settings" class="half_grid">
				<h2 class="status">Registration Status</h2>
				<span class="completed">Complete</span>
				<span class="not-completed">Incomplete</span>

			<div class="dash-sep-inner"><!--  --></div>
			                           	<h2 class="settings">Settings</h2>
			                           	<ul>
			                           		<li class="doc">{{ HTML::link_to_route('password_change','Change Password') }}</li>
			                           	</ul>
			</div><!-- end settings -->	

				<div class="full_grid">

					<div class="dash-sep-inner"><!--  --></div>

					<h2 class="guide">Quick Guide to registration</h2>
					<ul class="quick-guide">
						<li><span>Step 1: </span>Download &amp; print the four (4) forms above.</li>
						<li><span>Step 2: </span>Click on "<strong>Registration Forms</strong>" Tab.</li>
						<li><span>Step 3: </span>Complete Section A, Section B &amp; Section C.</li>
						<li><span>Step 4: </span>Upload your Passport Photograph</li>
						<li><span>Step 5: </span>Upload scanned copies of your <strong>SSCE, WAEC, NECO</strong> or <strong>GCE</strong> results (optional)</li>
						<li><span>Step 6: </span>After completing step <strong>1 - 5</strong> above, Click on "<strong>Print Completed Forms</strong>" link above to preview &amp; print your completed forms.</li>
					</ul>
				</div>
			</div><!-- end main-dashboard -->

		</div> <!-- end signIn -->

	</div> <!-- end pageContainer -->

@endsection