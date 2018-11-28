<?php
    require 'includes/db.inc.php';
    if (isset($_GET["id"]) && isset($_GET["category"])) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM gallery WHERE id=$id AND Category='$category'";
        $statement = $db->query($sql) or die($db->error);
        $row = $statement->fetch_assoc();
    }

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $row['name'];?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"  crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css"  crossorigin="anonymous">
		<link rel="stylesheet" href="assets/css/main.css?v2" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
                                <header id="header">
									<a href="index.html" class="logo"><strong>Editorial</strong> by HTML5 UP</a>
									<ul class="icons">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-medium"><span class="label">Medium</span></a></li>
									</ul>
								</header>

                            <!-- Content -->
                                <div id="result">
                                        <section></section>
                                            <header class="main">
                                                <h1><?php echo $row["name"]; ?></h1>
                                            </header>

                                            <!-- <span class="image main"><img src="images/pic11.jpg" alt="" /></span> -->
                                            <span class="image main"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"/>'; ?></span>
                                            <p><?php echo $row["Description"]; ?></p>

                                            <hr class="major" />

                                        </section>
                                </div>
						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<section id="search" class="alt">
                                    <input type="text" placeholder="Search" id="search-input" name="search" class="form-control">
								</section>

							<!-- Menu -->
                                <nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="index.html">Homepage</a></li>
										<li><a href="HotDeals.php">Hot Deals</a></li>
										<li><a href="Hotels.php">Hotels</a></li>
										<li><a href="Dining.php">Dining&Drinking</a></li>
										<li><a href="Activities.php">Activities</a></li>
										<li><a href="AroundIsland.php">Around the  Island</a></li>
										<li><a href="IslandGuide.php">Island Guide</a></li>
									</ul>
								</nav>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Ante interdum</h2>
									</header>
									<div class="mini-posts">
										<article>
											<a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
									</div>
									<ul class="actions">
										<li><a href="#" class="button">More</a></li>
									</ul>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Get in touch</h2>
									</header>
									<p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
									<ul class="contact">
										<li class="fa-envelope-o"><a href="#">information@untitled.tld</a></li>
										<li class="fa-phone">(000) 000-0000</li>
										<li class="fa-home">1234 Somewhere Road #8254<br />
										Nashville, TN 00000-0000</li>
									</ul>
								</section>
    <?php include 'footer.php';?>
