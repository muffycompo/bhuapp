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
			<p>Institutions Attended</p>
		</div>
		@if(Session::has('message'))
			{{ Session::get('message') }}
		@endif
<!-- Sign Up Tab Content -->
<div id="signUp-dash" class="clearfix">

		{{ Form::open('users/add_institution','POST',array('class'=>'cleanForm', 'id'=>'signUpForm')) }}
	
		<fieldset>
			@if(Bhu::check_institution())
			<table class="institutions_attended">
				<span class="emsg">{{ $errors->first('institution') }} &nbsp; {{ $errors->first('from') }} &nbsp; {{ $errors->first('to') }} &nbsp; {{ $errors->first('qualification') }}</span>
				<thead>
					<tr>
						<th>Institution Name</th>
						<th>From (Year)</th>
						<th>To (Year)</th>
						<th>Qualification</th>
						<th><!-- {{ HTML::link('#','Add',array('class'=>'addMore','id'=>'addLink','title'=>'Add Institution')) }} &nbsp;&nbsp; {{ HTML::link('#','Delete',array('class'=>'deleteMore','id'=>'removeLink','title'=>'Delete Institution')) }} --></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ Form::text('institution',Input::old('institution'),array('class'=>'longInput')) }}</td>
						<td>{{ Form::text('from',Input::old('from'),array('class'=>'smallInput','maxlength'=>'4')) }}</td>
						<td>{{ Form::text('to',Input::old('to'),array('class'=>'smallInput','maxlength'=>'4')) }}</td>
						<td colspan="2">{{ Form::text('qualification',Input::old('qualification'),array('class'=>'longInput')) }}</td>
					</tr>
				</tbody>
			</table>
			@endif
			@if(!empty($institution_data))
			<table class="institutions_attended">
				<thead>
					<tr>
						<th>Institution Name</th>
						<th>From (Year)</th>
						<th>To (Year)</th>
						<th>Qualification</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($institution_data as $institution)
						<tr>
							<td class="longInput"><span>{{ $institution->institution_name }}</span></td>
							<td class="smallInput"><span>{{ $institution->from_year }}</span></td>
							<td class="smallInput"><span>{{ $institution->to_year }}</span></td>
							<td class="longInput_l"><span>{{ $institution->qualification }}</span></td>
							<td class="tb_action">{{ HTML::link('users/edit_institution/' . $institution->id . '/2','',array('class'=>'editMoreIcon','title'=>'Edit','alt'=>'Edit')) }} {{ HTML::link('users/delete_institution/' . $institution->id . '/2','',array('class'=>'deleteMoreIcon','title'=>'Delete','alt'=>'Delete')) }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			@endif
			@if(Bhu::check_institution())
			<p><input type="submit" value="Add" class="inputStyleBtn" />&nbsp;&nbsp;&nbsp;&nbsp;{{ HTML::link('users/education','Finish',array('class'=>'inputStyleBtn')) }}</p>
			@else
			<p>{{ HTML::link('users/education','Finish',array('class'=>'inputStyleBtn')) }}</p>
			@endif
		</fieldset>
	
	{{ Form::close() }}
	
	<!-- Sidebar -->

</div> <!-- end signUp -->

		</div><!-- end main-dashboard -->

	</div> <!-- end signIn -->

</div> <!-- end pageContainer -->
@endsection