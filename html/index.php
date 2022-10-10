<?php
require_once __DIR__ . '/assets/php/autoload.php';
?>

<!DOCTYPE html>
<html lang="de">
	<head>
		<title>USB - Urspringer Schwarzes Brett</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css">
		<link rel="stylesheet" href="assets/css/custom.css">
		<link rel="stylesheet" href="assets/css/clock.css">
		<meta name="description" content="Das Urspringer Schwarze Brett - nur zum internen Gebrauch">
		<meta name="author" content="HWS,MK">
	</head>
	<body class="mt-5 <?php echo Config::isInDarkMode() ? "dark" : ""; ?>">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-md-6 mb-4">
					<div class="card h-100 card-blue">
						<div class="card-header h4">
							Bekanntmachungen
						</div>
						<div class="card-body">
							<h3 id="vplan"></h3>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 mb-4">
					<div class="card h-100 card-red">
						<div class="card-header h4">
							Speiseplan - <?php echo date("H") > "14" ? "Abendessen" : "Mittagessen"?>
						</div>
						<div class="card-body">
							<h3 id="mensa"></h3>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-md-6 mb-4">
					<div class="card h-100 card-green">
						<div class="card-header h4">
							Ihre nächsten Verbindungen
						</div>
						<div class="card-body" style="font-size: 1.5em;" id="fahrplan">
							<h3>Der Fahrplan ist zurzeit nicht verfügbar</h3>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 mb-4">
					<div class="card h-100 card-yellow">
						<div class="card-header h4">
							Wetter
						</div>
						<div class="card-body">
							<div class="row justify-content-center">
								<div class="col-2 wetter-text mx-5">
									<p class="fw-bold">Urspring</p>
									<img src='http://www.mein-wetter.com/widget4/a9f47ef2e83b474d91fe89c8a6cb5491.png' id="wetteru">
								</div>
								<div class="col-2 wetter-text mx-5">
									<p class="fw-bold">Ulm</p>
									<img src='http://www.mein-wetter.com/widget4/1e3523ed49934f8ba2800a5dc7946e8d.png' id="wetteru">
								</div>
								<div class="col-2 wetter-text mx-5">
									<p class="fw-bold">Stuttgart</p>
									<img src='http://www.mein-wetter.com/widget4/30119a98e2384faaaad7e88ee0bdb3b2.png' id="wetteru">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-md-6 mb-4">
					<div class="card h-100 ">
						<div class="card-header h4">
							Zitat des Tages
						</div>
						<div class="card-body">
							<h4 id="zitat"></h4>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 mb-4">
					<div class="card h-100">
						<div class="card-header h4">
							Newsticker | <i>UrspringBlog</i> & Tagesschau
						</div>
						<div class="card-body">
							<div id="news" class="inhalte"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-6 mb-4">
					<div class="card h-100">
						<div class="card-body pt-xl-2">
							<div class="clock">
								<div class="outer-clock-face">
									<div class="marking marking-one"></div>
									<div class="marking marking-two"></div>
									<div class="marking marking-three"></div>
									<div class="marking marking-four"></div>
								</div>
								<div class="inner-clock-face">
									<div class="hand hour-hand"></div>
									<div class="hand min-hand"></div>
									<div class="hand second-hand"></div>
								</div>
							</div>
							<span class="h3" id="clock_digital"></span>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 mb-4">
					<div class="card h-100">
						<div class="card-body">
							<div class="row">
								<div class="col-11">
									<b>Version 2.2 vom 10.10.2022</b>
									<br>
									Stolz präsentiert von OJJGHSKPLHTKMK
								</div>
								<div class="col">
									<img src="logow.png" alt="Logo der Urspringschule" class="w-100">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="assets/js/refreshContents.js"></script>
	</body>
</html>
