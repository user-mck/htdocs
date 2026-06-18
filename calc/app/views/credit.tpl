<!DOCTYPE HTML>
<!--
	Story by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Kalkulator Kredytowy</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="css/main.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
		<noscript><link rel="stylesheet" href="css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper" class="divided">

				<!-- One -->
					<section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
						<div class="content">
							<h1>Kalkulator Kredytowy</h1>
							<form action="credit.php" method="GET" class="pure-form pure-form-stacked">
								<fieldset>
									<label>Kwota kredytu (PLN): </label>
									<input type="text" name="kwota" value="{$kwota_val|escape}">

									<label>Oprocentowanie roczne (%): </label>
									<input type="text" name="oprocentowanie" value="{$oprocentowanie_val|escape}">

									<label>Okres kredytowania (miesiące): </label>
									<input type="text" name="okres" value="{$okres_val|escape}">

									<input type="submit" value="oblicz" class="pure-button pure-button-primary">
								</fieldset>
    						</form>

							{if $errors|count > 0}
							<div style="padding: 10px; background-color: #FF8888; border-radius: 5px; margin-top: 10px;">
								{foreach $errors as $error}
									{$error|escape}<br>
								{/foreach}
							</div>
							{/if}

							{if $rata !== null}
							<div style="padding: 10px; background-color: #88FF88; border-radius: 5px; margin-top: 10px;">
								Rata miesięczna: {$rata} PLN<br>
								Całkowity koszt kredytu: {$calkowity_koszt} PLN<br>
								Suma odsetek: {$suma_odsetek} PLN
							</div>
							{/if}

						</div>
						<div class="image">
							<img src="images/banner.jpg" alt="" />
						</div>
					</section>

				<!-- Footer -->
					<footer class="wrapper style1 align-center">
						<div class="inner">
							<ul class="icons">
								<li><a href="#" class="icon brands style2 fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon brands style2 fa-facebook-f"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon brands style2 fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon brands style2 fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
								<li><a href="#" class="icon style2 fa-envelope"><span class="label">Email</span></a></li>
							</ul>
							<p>&copy; Kalkulator Kredytowy M.Wilk. Template: <a href="https://html5up.net">HTML5 UP</a>.</p>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="js/jquery.scrollex.min.js"></script>
			<script src="js/jquery.scrolly.min.js"></script>
			<script src="js/browser.min.js"></script>
			<script src="js/breakpoints.min.js"></script>
			<script src="js/util.js"></script>
			<script src="js/main.js"></script>

	</body>
</html>
