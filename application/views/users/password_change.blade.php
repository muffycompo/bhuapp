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
					{{ Session::get('message') }}
				@endif

            	{{ Form::open('users/password_change','POST',array('class'=>'cleanForm')) }}
				{{ Form::token() }}
                <fieldset>

                    <p>
                        {{ Form::label('current_password','Current Password:') }}
                        {{ Form::mpassword('current_password', Input::old('current_password'), array('class'=>'inputStyle')) }}
                        {{ $errors->first('current_password','<em class="emsg">:message</em>') }}
                    </p>

                    <p>
                        {{ Form::label('password','New Password:') }}
                        {{ Form::mpassword('password', Input::old('password'), array('class'=>'inputStyle')) }}
                        {{ $errors->first('password','<em class="emsg">:message</em>') }}
                    </p>

                    <p>
                        {{ Form::label('password_confirmation','Confirm Password:') }}
                        {{ Form::mpassword('password_confirmation', Input::old('password_confirmation'), array('class'=>'inputStyle')) }}
                        {{ $errors->first('password_confirmation','<em class="emsg">:message</em>') }}
                    </p>

                    {{ Form::submit('Save',array('name'=>'submit','class'=>'inputStyleBtn')) }}&nbsp;&nbsp;&nbsp;&nbsp;{{ HTML::link('users/dashboard','Cancel',array('class'=>'inputStyleBtn')) }}

                    <div class="formExtra">
                        <p>{{ HTML::link_to_route('dashboard','Back to Dashboard') }}</p>
                    </div>

                </fieldset>

            {{ Form::close() }}

        </div> <!-- end signIn -->

	</div> <!-- end signIn -->

</div> <!-- end pageContainer -->

@endsection