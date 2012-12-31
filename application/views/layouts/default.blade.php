<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Bingham University</title>
	<!-- <link href="assets/css/style.css" rel="stylesheet" type="text/css"/> -->
	{{ HTML::style('/css/960_12_col.css') }}
	{{ HTML::style('/css/style.css') }}
</head>
<body>

	<div id="header">
		
		<div id="banner" class="container clearfix">
			{{ HTML::image('/img/logo.png','Logo',array('class'=>'fl')) }}
			<ul id="nav" class="fr">
				<li>{{ HTML::link('#','University Website', array('title'=> 'Bingham University Website')) }}</li>
				<li>{{ HTML::link('#','Registration Guide', array('title' => 'Guide to Registration')) }}</li>
			</ul>

		</div>

	</div>

	<div id="mainContent" class="container">
		<!-- Yield sections from Views -->
		@yield('content');
	</div><!-- end mainContent -->
	<div id="footer">
		<p>Copyright &copy; {{ date('Y') }} - All rights reserved - {{ HTML::link('#','Bingham University') }}</p>
	</div>

</body>
</html>