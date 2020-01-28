<?php
	
	session_start();
	?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Graj, zdobywaj, żyj.</title>
	<meta name="keywords" content="gry, nowości, zakupy, games" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<script type="text/javascript" src="timer.js"></script>
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body onload="zmienslajd(), odliczanie()">
<div class ="wrapper"> 
			<div class="header">
				<div class="logo"><a href="index.html" class="tilelink"><span style="color: #01a1FF">Poje</span>grane.pl <img src="logo1.png" width="50" height="50" style=" position:absolute; left: 0px; top: 11px;">
				</a>
				</div>
				
				<div class="menu" class="tilelink">
					<ol>
					<li><a href="logout.php"><span style="color: #01a1FF">Wylo</span>guj się</a></li>
					<li><a href="#"><?php echo $_SESSION['Nick']?></a></li>
					<li><a href="#"><span style="color: #01a1FF">O n</span>as</a></li>
					<li><a href="#"><span style="color: #01a1FF">Kont</span>akt</a></li>
					<li><a href="index.html"><span style="color: #01a1FF">Me</span>nu</a>
						<ul>
							<li><a href="#"><span style="color: #01a1FF">New</span>sy</a></li>
							<li><a href="#"><span style="color: #01a1FF">Top mi</span>esiąca</a></li>
							<li><a href="#"><span style="color: #01a1FF">Dołącz d</span>o ligi zawodników</a></li>
							<li><a href="dopobrania.html"><span style="color: #01a1FF">Do po</span>brania</a></li>
						</ul>
					</li>
					</ol>
				</div>
				<div style="clear: both;"></div>
			</div>
			<div class="topka"><span style="color: #01a1FF">Top gier m</span>iesiąca</div>

			<div id="slider">
			</div>

			<div class="photos">
				<div class="znikanie">
					<a href="#">
						<img src="ps.jpg" width="518,9189189189189‬" height="291,8918918918919‬"/>
					</a>
				</div>
				<div class="znikanie">
					<a href="#"><img src="xbox.jpg" width="518,9189189189189‬" height="291,8918918918919‬"/></a>
				</div>
				<div class="znikanie">
					<a href="#"><img src="nintendo.jpg" width="518,9189189189189‬" height="291,8918918918919‬"/></a>
				</div>
				</div>
				<div class="pasek"><img src="konkurs.png"/></div>
				<div class="grid">
					<div> <a href="https://quizizz.com/admin/quiz/5cefecabfb140a001a885334/money" target="_blank"><img src="quiz.jpg"/></a></div>
				<div class="strzalka"><img src="strzalkal.png" width="100" height="100"></div>
					<div class="znikanie">
						<a href="https://www.microsoft.com/pl-pl/p/xbox-one-s-all-digital-edition/8r5xdtcnlrlb?activetab=pivot%3aoverviewtab" target="_blank"><img id="xboxreklama" src="xboxreklama.png" width="558" height="267" /></a></div>
				</div>
				<div class="grid2">
				<div class="znikanie">
				<a href="https://www.playstation.com/pl-pl/explore/ps4/ps4-pro/" target="_blank"><img id="ps4" src="ps4reklama.png" width="370" height="436"/></a></div>
				<div class="strzalka"><img src="strzalkap.png" width="100" height="100"></div>
				<div><a href="https://quizizz.com/admin/quiz/5cefecabfb140a001a885334/money" target="_blank"> <img src="quiz.jpg"/></a></div>

				</div>	
		<div class="footer">
			<div>Jakub Pacholski</div>
			<div>&copy; Wszelkie prawa zastrzeżone</div>
			<div id="zegar"></div>
		</div> 
</div>

	<script src="jquery-1.11.3.min.js"></script>
	<script>
$(document).ready(function() {
	var NavY = $('.header').offset().top;
	 
	var stickyNav = function(){
	var ScrollY = $(window).scrollTop();
		  
	if (ScrollY > NavY) { 
		$('.header').addClass('sticky');
	} else {
		$('.header').removeClass('sticky'); 
	}
	};
	 
	stickyNav();
	 
	$(window).scroll(function() {
		stickyNav();
	});
	});
	
	$(document).ready(function() {
	var NavY = $('.footer').offset().down;
	 
	var stickyNav = function(){
	var ScrollY = $(window).scrollTop();
		  
	if (ScrollY > NavY) { 
		$('.footer').addClass('sticky');
	} else {
		$('.footer').removeClass('sticky'); 
	}
	};
	 
	stickyNav();
	 
	$(window).scroll(function() {
		stickyNav();
	});
	});

</script>
</body>
</html>