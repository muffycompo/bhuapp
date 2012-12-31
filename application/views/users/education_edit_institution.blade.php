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
		<div class="formHeading">
			<p>Edit Institutions Attended</p>
		</div>
<!-- Sign Up Tab Content -->
<div id="signUp-dash" class="clearfix">
		{{ Form::open('users/edit_institution','POST',array('class'=>'cleanForm', 'id'=>'signUpForm')) }}
	
		<fieldset>
		
					<table class="institutions_attended">
						<span class="emsg">{{ $errors->first('institution') }} &nbsp; {{ $errors->first('from') }} &nbsp; {{ $errors->first('to') }} &nbsp; {{ $errors->first('qualification') }}</span>
						<thead>
							<tr>
								<th>Institution Name</th>
								<th>From (Year)</th>
								<th>To (Year)</th>
								<th>Qualification</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{ Form::text('institution',$edit_data->institution_name,array('class'=>'longInput')) }}</td>
								<td>{{ Form::text('from',$edit_data->from_year,array('class'=>'smallInput','maxlength'=>'4')) }}</td>
								<td>{{ Form::text('to',$edit_data->to_year,array('class'=>'smallInput','maxlength'=>'4')) }}</td>
								<td colspan="2">{{ Form::text('qualification',$edit_data->qualification,array('class'=>'longInput')) }}</td>
							</tr>
							{{ Form::hidden('id',$edit_data->id) }}
							{{ Form::hidden('redirect_id',$redirect_id) }}
						</tbody>
					</table>

					<p><input type="submit" value="Save" class="inputStyleBtn" />&nbsp;&nbsp;&nbsp;&nbsp;{{ HTML::link('users/education','CANCEL',array('class'=>'inputStyleBtn')) }}</p>

		</fieldset>
	
	{{ Form::close() }}
	
	<!-- Sidebar -->

</div> <!-- end signUp -->

		</div><!-- end main-dashboard -->

	</div> <!-- end signIn -->

</div> <!-- end pageContainer -->
@endsection