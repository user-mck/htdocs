<?php
/* Smarty version 5.8.0, created on 2026-06-18 21:06:52
  from 'file:credit.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3441ccf07286_14705380',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '52a50d4a763cc5324d1f4f02d34a91c0f9d61256' => 
    array (
      0 => 'credit.tpl',
      1 => 1781809222,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3441ccf07286_14705380 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/opt/lampp/htdocs/calc/templates';
?><!DOCTYPE HTML>
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
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
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
									<input type="text" name="kwota" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('kwota_val'), ENT_QUOTES, 'UTF-8', true);?>
">

									<label>Oprocentowanie roczne (%): </label>
									<input type="text" name="oprocentowanie" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('oprocentowanie_val'), ENT_QUOTES, 'UTF-8', true);?>
">

									<label>Okres kredytowania (miesiące): </label>
									<input type="text" name="okres" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('okres_val'), ENT_QUOTES, 'UTF-8', true);?>
">

									<input type="submit" value="oblicz" class="pure-button pure-button-primary">
								</fieldset>
    						</form>

							<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('errors')) > 0) {?>
							<div style="padding: 10px; background-color: #FF8888; border-radius: 5px; margin-top: 10px;">
								<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('errors'), 'error');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('error')->value) {
$foreach0DoElse = false;
?>
									<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('error'), ENT_QUOTES, 'UTF-8', true);?>
<br>
								<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
							</div>
							<?php }?>

							<?php if ($_smarty_tpl->getValue('rata') !== null) {?>
							<div style="padding: 10px; background-color: #88FF88; border-radius: 5px; margin-top: 10px;">
								Rata miesięczna: <?php echo $_smarty_tpl->getValue('rata');?>
 PLN<br>
								Całkowity koszt kredytu: <?php echo $_smarty_tpl->getValue('calkowity_koszt');?>
 PLN<br>
								Suma odsetek: <?php echo $_smarty_tpl->getValue('suma_odsetek');?>
 PLN
							</div>
							<?php }?>

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
			<?php echo '<script'; ?>
 src="assets/js/jquery.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/browser.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/util.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/main.js"><?php echo '</script'; ?>
>

	</body>
</html>
<?php }
}
