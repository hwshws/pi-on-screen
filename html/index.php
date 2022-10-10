<!DOCTYPE html>
<html lang="de">
	<head>
		<title>USB - Urspringer Schwarzes Brett</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<meta name="description" content="Das Urspringer Schwarze Brett - nur zum internen Gebrauch">
		<meta name="author" content="HWS">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<style type="text/css">
            html body {
                font-family: 'Roboto', sans-serif;
            }

            .inhalte {
                font-size: 1.5em;
                margin: 0px 0 -5px;
            }
            .fahrplan > tr > td {
                padding-right: 15px;
            }

            .wetter-text {
                /*font-family: Arial;*/
                text-align: center;
                border: solid 1px #000000;
                background: #DCEDE0;
                width: 155px;
                padding: 4px;
            }


			.bg-danger-light {
				background-color: #f8d7da;
			}
			.bg-warning-light {
				background-color: #fff3cd;
			}
			.bg-success-light {
				background-color: #d4edda;
			}
			.bg-info-light {
				background-color: #d1ecf1;
			}
		</style>
	</head>
	<body class="mt-5">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-md-6 mb-4">
					<div class="card h-100">
						<div class="card-header bg-info-light h4">
							Bekanntmachungen
						</div>
						<div class="card-body">
							<h3 id="vplan"></h3>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 mb-4">
					<div class="card h-100">
						<div class="card-header bg-danger-light h4">
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
					<div class="card h-100">
						<div class="card-header bg-success-light h4">
								Ihre nächsten Verbindungen
						</div>
						<div class="card-body" style="font-size: 1.5em;" id="fahrplan">
							<h3>Der Fahrplan ist zur Zeit nicht verfügbar</h3>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 mb-4">
					<div class="card h-100">
						<div class="card-header bg-success-light h4">
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
					<div class="card h-100">
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
						<div class="card-body mt-xl-2">
							<span class="h3" id="ZeitAnzeige"></span>
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


		<script type="application/javascript" src="js/jquery.min.js"></script>
		<script type="application/javascript" src="js/bootstrap.min.js"></script>
		<script type="application/javascript">
            $(document).ready(function () {
                setInterval(function () {
                    document.getElementById("wetterulm").src = "https://www.mein-wetter.com/widget4/displayweather.php?key=1e3523ed49934f8ba2800a5dc7946e8d&time=" + new Date().valueOf();
                    document.getElementById("wetteru").src = "https://www.mein-wetter.com/widget4/displayweather.php?key=a9f47ef2e83b474d91fe89c8a6cb5491&time=" + new Date().valueOf();
                    document.getElementById("wetterstr").src = "https://www.mein-wetter.com/widget4/displayweather.php?key=30119a98e2384faaaad7e88ee0bdb3b2&time=" + new Date().valueOf();
                }, 15 * 60 * 1000);

                $("#news").load('news.php');
                setInterval(function () {
                    $("#news").load('news.php');
                }, 5 * 60 * 1000);

                $("#mensa").load('mensa.php');
                setInterval(function () {
                    $("#mensa").load('mensa.php');
                }, 30 * 60 * 1000);

                $("#vplan").load('vplan.php');
                setInterval(function () {
                    $("#vplan").load('vplan.php');
                }, 10 * 60 * 1000);

                $("#geb").load('geb.php');
                setInterval(function () {
                    $("#geb").load('geb.php');
                }, 2 * 60 * 60 * 1000);

                $("#dienst").load('dienst.php');
                setInterval(function () {
                    $("#dienst").load('dienst.php');
                }, 2 * 60 * 60 * 1000);

                $("#zitat").load('zitat.php');
                setInterval(function () {
                    $("#zitat").load('zitat.php');
                }, 2 * 60 * 60 * 1000);
            });

            function refreshSchedule(id) {
                const url = 'https://vrrf.finalrewind.org/Schelklingen/Schelklingen.json?frontend=json&backend=efa.DING'
                    , div = document.querySelector('#' + id);
                $.getJSON(url, data => {
                    if (data.error !== null) {
                        div.innerHTML = "<h3>Der Fahrplan ist zur Zeit nicht verfügbar</h3>";
                    } else {
                        try {
                            let table = document.createElement('table');
                            table.classList.add('fahrplan');
                            data.preformatted.forEach(zugData => {
                                let row = document.createElement('tr');
                                zugData.forEach(text => {
                                    text = text.replace(' InterRegioExpress', '')
                                        .replace(' Regional-Express', '')
                                        .replace(' Hohenzollerische Landesbahn (SWEG)', '')
                                        .replace(' Regionalbahn', '');
                                    let entry = document.createElement('td');
                                    entry.innerText = text;
                                    row.appendChild(entry);
                                });
                                table.appendChild(row);
                            });
                            div.innerHTML = '';
                            div.appendChild(table);
                        } catch (ex) {
                            div.innerHTML = "<h3>Der Fahrplan ist zur Zeit nicht verfügbar</h3>";
                            console.error(ex);
                        }
                    }
                });
            }

            refreshSchedule('fahrplan');
            setInterval(() => refreshSchedule('fahrplan'), 60 * 1000);
		</script>
		<script type="text/javascript" src="uhr.js"></script>
	</body>
</html>
