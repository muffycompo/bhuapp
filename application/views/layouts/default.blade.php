<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Bingham University - v0.4 alpha</title>
	{{ HTML::style('/css/960_12_col.css') }}
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