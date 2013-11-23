<?php
/**
 *
 * main.php layout file
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<style>
		body {
			padding-top: 60px;
			padding-bottom: 40px;
		}
	</style>

	<link rel="stylesheet" href="/css/main.css">

	<script src="/js/libs/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
	your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to
	improve your experience.</p>
<![endif]-->

<!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>

			<div class="nav-collapse collapse">
				<ul class="nav">
					<li><a href="/news/view/1/">Новость</a></li>
					<li><a href="/images/view/1/">Фотография</a></li>
				</ul>
				<?php $this->widget('UserLogin',array('visible'=>Yii::app()->user->isGuest)); ?>
				<?php $this->widget('UserLogout',array('visible'=>!Yii::app()->user->isGuest)); ?>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
</div>

<?php echo $content; ?>
<?php $this->widget('UserRegistration',array('visible'=>Yii::app()->user->isGuest)); ?>

<div id="alertModal" class="modal hide fade" tabindex="-1" data-width="100" data-height="2000">
	<div class="modal-header"><button data-dismiss="modal" type="button" class="close">x</button><p></p>
		<h3 id="alertModalLabel"></h3>
	</div>
	<div class="modal-body" id="alertModalBody">
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">OK</button>
	</div>
</div>


<script src="/js/libs/bootstrap.min.js"></script>
<script src="/js/libs/knockout-3.0.0.js"></script>
<script src="/js/plugins.js"></script>
<script src="/js/main.js"></script><script>
	var _gaq = [
		['_setAccount', 'UA-XXXXX-X'],
		['_trackPageview']
	];
	(function (d, t) {
		var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
		g.src = ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g, s)
	}(document, 'script'));
</script>
</body>
</html>