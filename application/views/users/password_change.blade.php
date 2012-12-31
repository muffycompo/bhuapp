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


        <div id="signIn">

            @if(Session::has('message'))
				<div class="errorFeedback">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif

            <form action="#" method="POST" class="cleanForm">

                <fieldset>

                    <p>
                        <label for="current_password">Current Password:</label>
                        <input type="password" id="current_password" name="current_password" class="inputStyle" />
                        <!-- <em>Enter your username.</em> -->
                    </p>

                    <p>
                        <label for="new_password">New Password:</label>
                        <input type="password" id="new_password" name="new_password" class="inputStyle" />
                        <!-- <em>Enter your password.</em> -->
                    </p>

                    <p>
                        <label for="re_password">Re-Password:</label>
                        <input type="password" id="re_password" name="re_password" class="inputStyle" />
                        <!-- <em>Enter your password.</em> -->
                    </p>

                    <input type="submit" value="Save" class="inputStyleBtn" />

                    <div class="formExtra">
                        <p><a href="/users/dashboard">Back to Dashboard</a></p>
                    </div>

                </fieldset>

            </form>

        </div> <!-- end signIn -->

	</div> <!-- end signIn -->

</div> <!-- end pageContainer -->

@endsection