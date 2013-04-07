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
		<div class="formHeading">
			<p>B - Educational Information</p>
		</div>
		@if(Session::has('message'))
			{{ Session::get('message') }}
		@endif
<!-- Sign Up Tab Content -->
<div id="signUp-dash" class="clearfix">
		<br>
		{{ Form::open('users/education','POST',array('class'=>'cleanForm', 'id'=>'signUpForm')) }}
		{{ Form::token() }}
		<fieldset>
			<p class="lb">Institutions attended with dates: <span class="requiredField">*</span> 
				@if(Bhu::check_institution())
				{{ HTML::link('users/add_institution','Add Institution(s)',array('class'=>'addMore','alt'=>'Add New Institution','title'=>'Add New Institution')) }}
				@endif
			</p>
			<br>
			<p class="lb">Examinations Passed: <span class="requiredField">*</span>
				@if(Bhu::check_examination())
				{{ HTML::link('users/add_result','Add Result(s)',array('class'=>'addMore','alt'=>'Add New Result','title'=>'Add New Result')) }}
				@endif
			</p>
			<br>
			<p>
				<label for="first_choice">First Choice: <span class="requiredField">*</span></label>
				{{ Bhu::programme_dropdown('first_choice', (!empty($education_data->first_choice_id))? $education_data->first_choice_id : Input::old('first_choice'), array('id'=>'first_choice','class'=>'inputStyle')) }}
			</p>
		
			<p>
				<label for="second_choice">Second Choice: <span class="requiredField">*</span></label>
				{{ Bhu::programme_dropdown('second_choice', (!empty($education_data->second_choice_id))? $education_data->second_choice_id : Input::old('second_choice'), array('id'=>'second_choice','class'=>'inputStyle')) }}
			</p>

			<p>
				<label for="jamb_number">JAMB Number: <span class="requiredField">*</span></label>
				{{ Form::text('jamb_number', (!empty($education_data->jamb_number))? $education_data->jamb_number : Input::old('jamb_number'), array('id'=>'jamb_number','class'=>'inputStyle','maxlength'=>'10')) }}
				{{ $errors->first('jamb_number','<em class="emsg">:message</em>') }}
			</p>

			<p>
				{{ Form::label('jamb_score','JAMB Score:') }}
				{{ Form::text('jamb_score', (!empty($education_data->jamb_score))? $education_data->jamb_score : Input::old('jamb_score'), array('id'=>'jamb_score','class'=>'inputStyle','maxlength'=>'3')) }}
				{{ $errors->first('jamb_score','<em class="emsg">:message</em>') }}
			</p>

			<p>
				<div class="distanceLeft">
					{{ Form::checkbox('awaiting_result',1,(!empty($education_data->jamb_score) && $education_data->jamb_score == 0)? true : false,array('class'=>'inputStyleChk','id'=>'awaiting_result')) }}
					{{ Form::label('awaiting_result','Awaiting JAMB result.') }}
				</div>
			</p>
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
							<td class="tb_action">{{ HTML::link('users/edit_institution/' . $institution->id . '/1','',array('class'=>'editMoreIcon','title'=>'Edit','alt'=>'Edit')) }} {{ HTML::link('users/delete_institution/' . $institution->id . '/1','',array('class'=>'deleteMoreIcon','title'=>'Delete','alt'=>'Delete')) }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			@endif
			
			@if(!empty($examination_data))
			<table class="examinations_passed">
				<thead>
					<tr>
						<th>Examination</th>
						<th>Date (Year)</th>
						<th>Examination No.</th>
						<th>Subject</th>
						<th>Grade</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($examination_data as $examination)
					<tr>
						<td class="selectInputExam"><span>{{ Expand::exam_type($examination->exam_type_id) }}</span></td>
						<td class="smallInput"><span>{{ $examination->exam_date }}</span></td>
						<td class="longInputExamNo"><span>{{ $examination->exam_number }}</span></td>
						<td class="selectInputSubject"><span>{{ Expand::exam_subject($examination->exam_subject_id) }}</span></td>
						<td class="selectInputGrade"><span>{{ Expand::exam_grade($examination->exam_grade_id) }}</span></td>
						<td class="tb_action">{{ HTML::link('users/edit_result/' . $examination->id . '/1','',array('class'=>'editMoreIcon','title'=>'Edit','alt'=>'Edit')) }} {{ HTML::link('users/delete_result/' . $examination->id . '/1','',array('class'=>'deleteMoreIcon','title'=>'Delete','alt'=>'Delete')) }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endif
			<p>&nbsp;</p>
			<input type="submit" value="Save" class="inputStyleBtn" />&nbsp;&nbsp;&nbsp;&nbsp;{{ HTML::link('users/forms','Cancel',array('class'=>'inputStyleBtn')) }}

		</fieldset>
	
	{{ Form::close() }}
	
	<!-- Sidebar -->
	<div id="sidebar">
		<h2>IMPORTANT NOTICE</h2>
		<ul>
			<li>Please read carefully before filling this form.</li>
			<li>Fields marked with <span class="requiredField">*</span> are required.</li>
			<li>If <strong>JAMB Score</strong> is not available,  just check the "<strong>Awaiting JAMB result</strong>" checkbox.</li>
			<li>Enter only the year (YYYY) in <strong>To</strong>, <strong>From</strong> and <strong>Date</strong> fields. E.g. <strong>2010</strong></li>
		</ul>
	</div> <!-- end sidebar -->

</div> <!-- end signUp -->

		</div><!-- end main-dashboard -->

	</div> <!-- end signIn -->

</div> <!-- end pageContainer -->
@include('users.partials.user_js')
@endsection