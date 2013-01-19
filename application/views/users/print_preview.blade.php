<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Print Completed Form</title>
	{{ HTML::style('/css/print_style.css') }}
	<!--[if lt IE 7 ]>	<html class="ie6"> <![endif]-->
	<!--[if lt IE 7 ]>
		{{ HTML::script('/js/DD_belatedPNG.js') }}
		<script>
			DD_belatedPNG.fix('img, .logout-exit, .print, .form, .upload, .guide, .status, .download, .settings, .signInTabContentDash, .signInTabContent, .signUpTabContentDash, .signUpTabContent, li, .activeTabArrow, .addMore, .deleteMore, .deleteMoreIcon, .editMore, .reg-forms-complete');
		</script>
	<![endif]-->
</head>
<body>
	<div id="mainContent" class="container">

		<div id="pageContainer">
			
			<!-- Sign In Tab Content -->
			<div id="dashboard">			
			<div id="main-dashboard" class="inner-container clearfix">
				<!-- <div id="header">
					<img src="" alt="Logo" />
				</div> -->
			<h2><!-- --></h2>
			<table class="institutions_attended">
				<tbody>
					<tr>
						<td><br /><br /><br /><span>Username: <strong>{{ Str::lower(Session::get('username')) }}</strong><br /><br />
						Teller Number: <strong>{{ Str::upper($teller) }}</strong><br /><br />
						Form Number: <strong>{{ $biodata->formno }}</strong>
						</span></td>
						<td style="text-align: center;"><img src="{{ URL::base() }}/img/print_preview.jpg" alt="header"></td>
						<td>
							@if(Bhu::passport() === false)
		                        <img src="{{ URL::base() }}/img/avatar_placeholder.png" alt="Passport Photo" style="; height: 115px; width:105px; vertical-align: middle; padding: 5px 0;">
		                    @else
		                        <img src="{{ URL::base() .'/' .Bhu::passport() }}" alt="Passport Photo" style="; height: 115px; width:105px; vertical-align: middle; padding: 5px 0;">
		                    @endif
						</td>
					</tr>
				</tbody>
			</table>
			<table class="institutions_attended">
				<tbody>
					<tr>
						<td class="longInput" colspan="3" style="text-align: center; background-color: #EFEFEF; padding: 5px; font-weight: bold;">APPLICATION FOR UNDERGRADUATE ADMISSION</td>
					</tr>
				</tbody>
			</table>
			<div class="formHeading">
				<p>A - PERSONAL DATA</p>
			</div>
		<!-- Sign Up Tab Content -->
		<div id="signUp-dash" class="clearfix">

		<table class="institutions_attended">
			<tbody>
				<tr>
					<td class="longInput"><span class="print_label">Title:</span></td>
					<td class="longInput"><span>{{ Expand::title($biodata->title_id) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Surname:</span></td>
					<td class="longInput"><span>{{ Str::title($biodata->surname) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">First Name:</span></td>
					<td class="longInput"><span>{{ Str::title($biodata->firstname) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Other Names:</span></td>
					<td class="longInput"><span>{{ Str::title($biodata->othernames) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Home / Mailing Address:</span></td>
					<td class="longInput"><span>{{ Str::title($biodata->home_address) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Mobile Phone No:</span></td>
					<td class="longInput"><span>{{ $biodata->gsm_no }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Email Address:</span></td>
					<td class="longInput"><span>{{ Str::lower($biodata->email_address) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Date of Birth:</span></td>
					<td class="longInput"><span>{{ date('d / m / Y', strtotime($biodata->date_of_birth)) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Sex:</span></td>
					<td class="longInput"><span>{{ Expand::gender($biodata->sex_id) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Country:</span></td>
					<td class="longInput"><span>{{ Expand::country($biodata->country_id) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">State of Origin:</span></td>
					<td class="longInput"><span>{{ Expand::state($biodata->state_of_origin_id) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Religion:</span></td>
					<td class="longInput"><span>{{ Expand::religion($biodata->religion_id) }}</span></td>
				</tr>
				</tbody>
		</table>
		<p><strong>If a Christian:</strong></p><br />
		<table class="institutions_attended">
			<tbody>
				<tr>
					<td class="longInput"><span class="print_label">Pastor's Name:</span></td>
					<td class="longInput"><span>{{ Str::title($biodata->pastor_name) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Pastor's Address:</span></td>
					<td class="longInput"><span>{{ Str::title($biodata->pastor_address) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Pastor's Phone No:</span></td>
					<td class="longInput"><span>{{ $biodata->pastor_gsm_no }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Denomination:</span></td>
					<td class="longInput"><span>{{ Expand::denomination($biodata->denomination_id) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Marital Status:</span></td>
					<td class="longInput"><span>{{ Expand::marital_status($biodata->marital_status_id) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span><strong>Maiden Name:</strong> (Married women only)</span> </td>
					<td class="longInput"><span>{{ Str::title($biodata->maiden_name) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span><strong>Former Names:</strong> (For any other change of name)</span></td>
					<td class="longInput"><span>{{ Str::title($biodata->former_name) }}</span></td>
				</tr>
			</tbody>
		</table>
		<p><strong>Please, note that Bingham University is a fully residential Institution. Permission to live off campus is rarely given, and then only in extreme circumstances.</strong></p><br />
		<div class="formHeading">
			<p>B - EDUCATIONAL DATA</p>
		</div>
		<table class="institutions_attended">
			<tbody>
				<tr>
					<td class="longInput" colspan="2"><span class="print_label">Choice of College/Faculty/Department/Course</span></td>
				</tr>
				<tr>
					<td class="longInput" colspan="2" style="background-color: #EFEFEF;"><span class="print_label">FIRST CHOICE</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">College / Faculty:</span></td>
					<td class="longInput"><span>{{ Expand::faculty($education->first_choice_id) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Department:</span></td>
					<td class="longInput"><span>{{ Expand::programme($education->first_choice_id) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Course / Programme:</span></td>
					<td class="longInput"><span>{{ Expand::programme($education->first_choice_id) }}</span></td>
				</tr>
				<tr>
					<td class="longInput" colspan="2" style="background-color: #EFEFEF;"><span class="print_label">SECOND CHOICE</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">College / Faculty:</span></td>
					<td class="longInput"><span>{{ Expand::faculty($education->second_choice_id) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Department:</span></td>
					<td class="longInput"><span>{{ Expand::programme($education->second_choice_id) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Course / Programme:</span></td>
					<td class="longInput"><span>{{ Expand::programme($education->second_choice_id) }}</span></td>
				</tr>
			</tbody>
		</table>

		<table class="institutions_attended">
			<p class="lb">LIST OF SCHOOLS ATTENDED WITH DATES (Starting with the most recent):</p>
			<thead>
				<tr>
					<th>Institution Name</th>
					<th>From</th>
					<th>To</th>
					<th>Qualification Obtained</th>
				</tr>
			</thead>
			<tbody>
				@foreach($institutions as $institution)
					<tr>
						<td class="longInput"><span>{{ Str::title($institution->institution_name) }}</span></td>
						<td class="smallInput"><span>{{ $institution->from_year }}</span></td>
						<td class="smallInput"><span>{{ $institution->to_year }}</span></td>
						<td class="longInput_l"><span>{{ Str::upper($institution->qualification) }}</span></td>
					</tr>
				@endforeach
			</tbody>
		</table>

		<table class="institutions_attended">
			<tbody>
				<tr>
					<td class="longInput"><span class="print_label">JAMB Registration No:</span></td>
					<td class="longInput">{{ Str::upper($education->jamb_number) }}</td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">JAMB Score:</span></td>
					<td class="longInput">{{ Str::upper($education->jamb_score) }}</td>
				</tr>
				<tr>
					<td class="longInput" colspan="2" style="background-color: #EFEFEF;"><span class="print_label">IMPORTANT NOTE:</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Have you ever been suspended, expelled from, or refused admission to any school?</span></td>
					<td class="longInput">{{ Str::title(Expand::has_reason($biodata->has_reason)) }}</td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label"> If Yes, for how long and why?</span></td>
					<td class="longInput">{{ Str::title($biodata->reason) }}</td>
				</tr>
			</tbody>
		</table>
		<table class="examinations_passed">
			<p class="lb">EXAMINATION PASSED or ENTERED FOR:</p>
			<thead>
				<tr>
					<th>Exam Name</th>
					<th>Exam Date</th>
					<th>Exam Number</th>
					<th>Subject</th>
					<th>Grade</th>
				</tr>
			</thead>
			<tbody>
				@foreach($examinations as $examination)
				<tr>
					<td class="selectInputExam"><span>{{ Str::upper(Expand::exam_type($examination->exam_type_id)) }}</span></td>
					<td class="smallInput"><span>{{ $examination->exam_date }}</span></td>
					<td class="longInputExamNo"><span>{{ Str::upper($examination->exam_number) }}</span></td>
					<td class="selectInputSubject"><span>{{ Str::title(Expand::exam_subject($examination->exam_subject_id)) }}</span></td>
					<td class="selectInputGrade"><span>{{ Str::upper(Expand::exam_grade($examination->exam_grade_id)) }}</span></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="formHeading">
			<p>C - PARENT / GUARDIAN / SPONSOR INFORMATION</p>
		</div>
		<table class="institutions_attended">
			<tbody>
				<tr>
					<td class="longInput"><span class="print_label">Parent / Guardian Name:</span></td>
					<td class="longInput"><span>{{ Str::title($parent->parent_name) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Parent / Guardian Home Address:</span></td>
					<td class="longInput"><span>{{ Str::title($parent->parent_home_address) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Parent / Guardian Office  Address:</span></td>
					<td class="longInput"><span>{{ Str::title($parent->parent_office_address) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Relationship:</span></td>
					<td class="longInput"><span>{{ Str::title(Expand::relationship($parent->relationship)) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Mobile Phone No:</span></td>
					<td class="longInput"><span>{{ $parent->parent_gsm_no }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Email Address:</span></td>
					<td class="longInput"><span>{{ Str::lower($parent->parent_email_address) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Occupation:</span></td>
					<td class="longInput"><span>{{ Str::title($parent->parent_occupation) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Sponsor's Name:</span></td>
					<td class="longInput"><span>{{ Str::title($parent->sponsor_name) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Sponsor's Home Address:</span></td>
					<td class="longInput"><span>{{ Str::title($parent->sponsor_address) }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Sponsor's Phone No:</span></td>
					<td class="longInput"><span>{{ $parent->sponsor_gsm_no }}</span></td>
				</tr>
				<tr>
					<td class="longInput"><span class="print_label">Sponsor's Occupation:</span></td>
					<td class="longInput"><span>{{ Str::title($parent->sponsor_occupation) }}</span></td>
				</tr>
				</tbody>
		</table>
		<div class="formHeading">
			<p>D - DECLARATION</p>
		</div>
		<p style="font-size: 1.2em; line-height: 32px;">In seeking for admission to <strong>Bingham University</strong>, I {{ '<strong>' . Str::upper($biodata->firstname . ' ' .$biodata->othernames . ' ' . $biodata->surname) . '</strong>' }} voluntarily agree as a student, to uphold the ideals, standards and regulations set forth by the University and to respect the principles and traditions it upholds as an <strong>ECWA</strong> institution of higher learning. I also agree while no information requested in this form is sufficient in itself to deny admission, any false declaration will be enough ground for my summary dismissal.
		<br />
		<br />
		<strong>Date:</strong>___________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Signature:</strong>__________________________
		</p><br />
		<div class="formHeading">
			<p>E - ATTESTATION</p>
		</div>
		<table class="institutions_attended">
			<tbody>
				<tr>
					<td class="longInput" colspan="2"  style="background-color: #EFEFEF;"><span class="print_label">This area is to be filled by the present or former school's Principal / Head</span></td>
				</tr>
			</tbody>
		</table>
		<p style="font-size: 1.2em; line-height: 32px;">I hereby attest that the information supplied in this form is, to the best of my knowledge true. The attached photograph is a true resemblance of the applicant.
		<br />
		<br />
		<strong>Full Name:</strong>_____________________________________&nbsp;&nbsp;&nbsp;&nbsp;<strong>Position Held:</strong>__________________________________
		<br />
		<br />
		<strong>Contact Address:</strong>_______________________________________________________________________________
		<br />
		<br />
		<strong>Signature / Stamp:</strong>_____________________________________&nbsp;&nbsp;&nbsp;&nbsp;<strong>Date:</strong>___________________________________
		</p>
		<br />
		<table class="institutions_attended">
			<tbody>
				<tr>
					<td class="longInput" colspan="2"  style="background-color: #EFEFEF; text-align: center;"><span class="print_label">FOR OFFICIAL USE ONLY</span></td>
				</tr>
			</tbody>
		</table>
		<p style="font-size: 1.2em; line-height: 32px;">
			Admission Status (Circle as appropriate):<span style="margin-right: 30px;">&nbsp;</span><strong>Regular</strong><span style="margin-right: 30px;">&nbsp;</span><strong>Provisional</strong><span style="margin-right: 30px;">&nbsp;</span><strong>Transfer</strong>
			<br />
			<br />
			Remarks (Tick as appropriate):&nbsp;&nbsp;Accepted__________&nbsp;&nbsp;Deferred_________&nbsp;&nbsp;Rejected_________&nbsp;&nbsp;Date__________
			<br />
			<br />
			Officer's Name making entries:_________________________________________&nbsp;&nbsp;Date______________________
		</p>
		<br />
		<table class="institutions_attended">
			<tbody>
				<tr>
					<td class="longInput" colspan="2"  style="background-color: #EFEFEF; text-align: center;"><span class="print_label">IMPORTANT INFORMATION</span></td>
				</tr>
			</tbody>
		</table>
		<p style="font-size: 1.2em; line-height: 32px;">
			Many thanks for choosing <strong>Bingham University</strong> for your Undergraduate studies.<br />
			You are however to <strong>NOTE</strong> the following:<br />
			<strong>1.</strong>  Supply all the information requested for in Section <strong>A, B, C, D</strong> and <strong>E</strong> above.<br />
			<strong>2.</strong>  You are expected to download and print two (2) copies of the following forms on the <strong>"Dashboard"</strong>:<br />
			<strong>(a)</strong> Character Assessment Form<br />
			<strong>(b)</strong> Applicant's Confidential Report<br />
			<strong>(c)</strong> Guidance and Councelling Form (Chaplaincy)<br />
			<strong>(d)</strong> UTME/DE Screening Assessment Form<br />
			<strong>3.</strong> Scan and upload the original copies of your WAEC,NECO,DE or JAMB Result slip to the Applicant Portal.<br />
			<strong>4.</strong>  Print out two (2) copies of this completed form.<br />
			<strong>(a)</strong> One (1) copy is to be submitted to the Registry department of the University along with completed copies of the forms each downloaded earlier.<br />
			<strong>(b)</strong> The other copy is to be submitted during the Post-UTME Examination.
		</p><br />
		</div> <!-- end signUp -->

		</div><!-- end main-dashboard -->

		</div> <!-- end signIn -->

		</div> <!-- end pageContainer -->
		
	</div><!-- end mainContent -->

</body>
</html>