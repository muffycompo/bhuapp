@layout('layouts.default')

@section('content')

<div id="pageContainer">

    <!-- Tabs -->
    <ul id="tabs" class="clearfix">
        <li class="inactiveTab fl" id="signInTab">
            <a href="/users/dashboard">
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
				<div class="errorFeedback">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif

            <!--<div id="downloadable-forms" class="half_grid">-->
            <div id="downloadable-forms" class="full_grid">
                <h2 class="upload">Uploaded Documents</h2>
                <ul class="form-sections">
                    <li><p><strong>Document 1:</strong> <a href="#">View</a> &nbsp;  <a href="#">Delete</a></p></li>
                    <br/>
                    <li class="doc">{{ HTML::link_to_route('forms','Back to Forms') }}</li>
                </ul>
                <!--<p><a href="#">Back to Dashboard</a></p>-->
            </div><!-- end downloadable-forms -->

        </div><!-- end main-dashboard -->

    </div> <!-- end signIn -->

</div> <!-- end pageContainer -->

@endsection