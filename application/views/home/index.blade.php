@layout('layouts.default')

@section('content')

<div id="pageContainer">
		
			<!-- Tabs -->
			<ul id="tabs" class="clearfix">
				<li class="activeTab fl" id="signInTab">
						<div class="signInTabContent">
							<span>Already activated your PIN?</span>
							<h1>Login here</h1>
						</div>
					<span class="activeTabArrow"><!-- --></span>
				</li>
				<li class="inactiveTab fr" id="signUpTab">
					<a href="/users/signup">
						<div class="signUpTabContent">
							<span>Just got your PIN?</span>
							<h1>Signup here</h1>
						</div>
					</a>
					<span class="activeTabArrow"><!-- --></span>
				</li>
			</ul>
			
			<!-- Sign In Tab Content -->
			<div id="signIn">
				@if(Session::has('message'))
					<div class="errorFeedback">
						<p>{{ Session::get('message') }}</p>
					</div>
				@endif

				<!-- <form action="#" method="POST" class="cleanForm"> -->
					{{ Form::open('users/login','POST', array('class'=>'cleanForm')) }}
				
					<fieldset>
					
						<p>
							{{ Form::label('username','Username:') }}
							{{ Form::text('username', Input::old('username'), array('class'=>'inputStyle')) }}
							{{ $errors->first('username','<em class="emsg">:message</em>') }}
						</p>
						
						<p>
							{{ Form::label('password','Password:') }}
							{{ Form::password('password', array('class'=>'inputStyle')) }}
							{{ $errors->first('password','<em class="emsg">:message</em>') }}
						</p>
						
						<div class="distanceLeft">
							<input type="checkbox" id="remember" name="remember" class="inputStyleChk" />
							{{ Form::label('remember','Remember my login') }}
						</div>
					
						{{ Form::submit('Login', array('class'=>'inputStyleBtn')) }}

						<div class="formExtra">
							<p><strong>Trouble login in?</strong></p>
							<p>{{ HTML::link_to_route('recovery', 'Recover your password') }}<!-- <a href="recover-password.html"></a> --> or {{ HTML::link_to_route('signup', 'Activate your PIN') }}<!-- <a href="signup.html">Activate your PIN</a> --></p>
						</div>

					</fieldset>
				
				<!-- </form> -->
			{{ Form::close() }}

			</div> <!-- end signIn -->

		</div> <!-- end pageContainer -->

@endsection