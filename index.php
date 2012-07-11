<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es-VE">
<head>
	<title>CodeAragua </title>
	<link href='http://fonts.googleapis.com/css?family=Imprima' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="lib/contenido.css" type="text/css" />
	<link rel="stylesheet" href="lib/estilos.css" type="text/css" />
	<meta charset="utf-8" />
	<script charset="utf-8" src="lib/widget.js"></script>
	
	<!--Para que funcione el CSS en varios navegaores-->
	<script src="lib/prefixfree.min.js" type="text/javascript"></script>
	<!--Funciones propias del sitio-->
	<script src="lib/funciones.js" type="text/javascript"></script>
	<!--Google Analytics-->
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-29699738-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
</head>
<body onload="chrome();">
	<section id="Izquierdo">
		<img id="logo" src="imagenes/logo.png" />
		<hr class="separador-izquierda">
		<script>
		new TWTR.Widget({
		  version: 2,
		  type: 'search',
		  search: '#CodeAragua',
		  interval: 15000,
		  title: '@CodeAragua',
		  subject: '#CodeAragua',
		  width: 200,
		  height: 200,
		  theme: {
		    shell: {
		      background: '#0A2A12',
		      color: '#ffffff'
		    },
		    tweets: {
		      background: '#0A2A12',
		      color: '#ffffff',
		      links: '#ffffff'
		    }
		  },
		  features: {
		    scrollbar: false,
		    loop: false,
		    live: true,
		    behavior: 'default'
		  }
		}).render().start();
		</script>
		<hr class="separador-izquierda"></br>
		<footer id="CopyRight">
			<a class="redes" href="http://www.twitter.com/CodeAragua"><img src="imagenes/social_twitter.png" /></a>	
			<a class="redes" href="http://www.facebook.com/pages/CodeAragua/218133724946431"><img src="imagenes/social_facebook.png" /></a>
			<a class="redes" href="https://plus.google.com/u/0/111297605374299629736/posts"><img src="imagenes/social_google.png" /></a>
			<p class="texto-derechos">© 2012 Copyright, CodeAragua.</p>
			<p class="texto-derechos"> Todos los derechos reservados. V-0.3</p></footer>	
	</section>

	<section id="Derecho">
		<nav>
			<p id="link-nav"><a class="NoLink" id="inicio" onclick="cambio(this)" href="#">Inicio</a>
			<a class="NoLink" id="eventos" onclick="cambio(this)" href="#">Eventos</a>
			<a class="int-link" id="foro" href="foro/">Foro</a>
			<a class="NoLink" id="contacto" onclick="cambio(this)" href="#">Equipo</a></p>
		</nav>
		<section id="contenido">
			<p class="titulos"> Bienvenido  a CodeAragua<br/><br/></p>
			<p class="Normal"> 
		    Es un placer para nosotros que estés por aquí. Nuestro propósito en el Internet
		    es simplemente formar una comunidad dedicada al Código indiferentemente al
		    lenguaje que se use, la idea principal es compartir,aprender, corregir y 
		    mejorar nuestros programas, webs, scripts, entre muchas otras cosas. <br/><br/>
		    </p>
		    <p class="Normal">
		      Una comunidad la fundan unas personas, pero la comunidad es y será siempre
		      todas las personas que pertenezcan a ellas, nadie es más ni menos en esta comunidad.<br/><br/>
		    </p>
		    <p class="Normal">
		      Por otro lado CodeAragua no simplemente será la comunidad si no también una futura empresa
		      con miras al desarrollo de aplicaciones, Diseños web, Soluciones Electrónicas entre muchas 
		      otras ideas, así como esta comunidad también tenemos una comunidad de Juegos llamada <a class="Twitter" href='http://Www.ComunidadLatinasa.net/foro'>www.Comunidadlatinasa.net</a> especificamente para el juego de San Andreas multiplayer, Servicios de Streaming de Audio, y futuramente los mejores planes de hosting Web para los emprendedores.<br/><br/>
		    </p>

		    <p class="Firma">
		    	Augusto Lozada <br/>
		    	Manuel Zambrano.<br/>
		    </p>

		</section>	
	</section>
</body>
</html>	
