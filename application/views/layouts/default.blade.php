<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Bingham University - v1.1.0 beta</title>
    <meta name="description" content="Bingham University Applicant Registration Portal">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="{{ URL::to('favicon.ico') }}" type="image/x-icon" />
	{{ HTML::style('/css/style.css') }}
	<!--[if lt IE 7 ]>	<html class="ie6"> <![endif]-->
	<!--[if lt IE 7 ]>
		{{ HTML::script('/js/DD_belatedPNG.js') }}
		<script>
			DD_belatedPNG.fix('img, .logout-exit, .print, .form, .upload, .guide, .status, .download, .settings, .signInTabContentDash, .signInTabContent, .signUpTabContentDash, .signUpTabContent, li, .activeTabArrow, .addMore, .deleteMore, .deleteMoreIcon, .editMore, .reg-forms-complete');
		</script>
	<![endif]-->
</head>
<body>
	<!--[if lt IE 7]>
		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
	<div id="header">
		
		<div id="banner" class="container clearfix">
			{{ HTML::image('/img/logo.png','Logo',array('class'=>'fl')) }}
			<ul id="nav" class="fr">
				<li>{{ HTML::link('http://www.binghamuni.edu.ng','University Website', array('title'=> 'Bingham University Website','target'=>'_blank')) }}</li>
				<li>{{ HTML::link('#','Registration Guide', array('title' => 'Guide to Registration')) }}</li>
			</ul>
		</div>

	</div>

	<div id="mainContent" class="container">
		<!-- Yield sections from Views -->
		@yield('content');
	</div><!-- end mainContent -->
	
	<div id="footer">
		<p>Copyright &copy; {{ date('Y') }} - All rights reserved - {{ HTML::link('http://www.binghamuni.edu.ng','Bingham University', array('target'=>'_blank')) }}</p>
	</div>

</body>
</html>