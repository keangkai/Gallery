<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location: index.php");
    exit();
}
?>
<?php include 'includes/db.inc.php';

$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$sql = "select * from gallery ORDER BY id DESC limit " . $start . " , " . $perPage;
$total = $con->query("select * from gallery")->fetchColumn();
$pages = ceil($total / $perPage);

$rows = $con->query($sql);

?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">


<link type="text/css" media="all" href="https://jevelin.shufflehound.com/portfolio1/wp-content/cache/autoptimize/12/css/autoptimize_99522bd55abebb20df3680ff0ebbb8a1.css" rel="stylesheet" /><link type="text/css" media="only screen and (max-width: 768px)" href="https://jevelin.shufflehound.com/portfolio1/wp-content/cache/autoptimize/12/css/autoptimize_552872c822ca13a6a5428b6f2b9344b0.css" rel="stylesheet" /><title>Jevelin Theme Portfolio Demo &#8211; Just another Jevelin WordPress Theme site</title>
<link rel='dns-prefetch' href='//fonts.googleapis.com' />
<link rel='dns-prefetch' href='//s.w.org' />
<link rel="alternate" type="application/rss+xml" title="Gallert"  href="https://jevelin.shufflehound.com/portfolio1/feed/" />
<link rel="alternate" type="application/rss+xml" title="Gallery" href="https://jevelin.shufflehound.com/portfolio1/comments/feed/" />
	<script type="text/javascript">
		window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/11\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/11\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/jevelin.shufflehound.com\/portfolio1\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.9.8"}};
		!function(a,b,c){function d(a,b){var c=String.fromCharCode;l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,a),0,0);var d=k.toDataURL();l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,b),0,0);var e=k.toDataURL();return d===e}function e(a){var b;if(!l||!l.fillText)return!1;switch(l.textBaseline="top",l.font="600 32px Arial",a){case"flag":return!(b=d([55356,56826,55356,56819],[55356,56826,8203,55356,56819]))&&(b=d([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]),!b);case"emoji":return b=d([55358,56760,9792,65039],[55358,56760,8203,9792,65039]),!b}return!1}function f(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var g,h,i,j,k=b.createElement("canvas"),l=k.getContext&&k.getContext("2d");for(j=Array("flag","emoji"),c.supports={everything:!0,everythingExceptFlag:!0},i=0;i<j.length;i++)c.supports[j[i]]=e(j[i]),c.supports.everything=c.supports.everything&&c.supports[j[i]],"flag"!==j[i]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[j[i]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(h=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",h,!1),a.addEventListener("load",h,!1)):(a.attachEvent("onload",h),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),g=c.source||{},g.concatemoji?f(g.concatemoji):g.wpemoji&&g.twemoji&&(f(g.twemoji),f(g.wpemoji)))}(window,document,window._wpemojiSettings);
	</script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<link rel="stylesheet" href="text.css">
<link rel='stylesheet' id='jevelin-fonts-css'  href='https://fonts.googleapis.com/css?family=Raleway:200,300,300italic,regular,italic,600,600italic,700,700italic,|Montserrat:200,300,300italic,regular,italic,600,600italic,700,700italic,&#038;subset=latin' type='text/css' media='all' />
<script type='text/javascript' src='https://jevelin.shufflehound.com/portfolio1/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
<script type='text/javascript' src='https://jevelin.shufflehound.com/portfolio1/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
<script type='text/javascript' src='https://jevelin.shufflehound.com/portfolio1/wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.min.js?ver=5.4.6.3.1'></script>
<script type='text/javascript' src='https://jevelin.shufflehound.com/portfolio1/wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js?ver=5.4.6.3.1'></script>
<script type='text/javascript' src='https://jevelin.shufflehound.com/portfolio1/wp-content/themes/jevelin/js/plugins.js?ver=4.9.8'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var jevelin_loadmore_posts = {"ajax_url":"https:\/\/jevelin.shufflehound.com\/portfolio1\/wp-admin\/admin-ajax.php"};
var jevelin = {"page_loader":"0","notice":"","header_animation_dropdown_delay":"1000","header_animation_dropdown":"easeOutQuint","header_animation_dropdown_speed":"300","lightbox_opacity":"0.88","lightbox_transition":"elastic","page_numbers_prev":"Previous","page_numbers_next":"Next","rtl_support":"","footer_parallax":"","one_pager":"1","wc_lightbox":"jevelin","quantity_button":"on"};
/* ]]> */
</script>
<script type='text/javascript' src='https://jevelin.shufflehound.com/portfolio1/wp-content/themes/jevelin/js/scripts.js?ver=4.9.8'></script>
<link rel='https://api.w.org/' href='https://jevelin.shufflehound.com/portfolio1/wp-json/' />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://jevelin.shufflehound.com/portfolio1/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://jevelin.shufflehound.com/portfolio1/wp-includes/wlwmanifest.xml" />
<meta name="generator" content="WordPress 4.9.8" />
<meta name="generator" content="WooCommerce 3.4.3" />
<link rel="canonical" href="https://jevelin.shufflehound.com/portfolio1/" />
<link rel='shortlink' href='https://jevelin.shufflehound.com/portfolio1/' />
<link rel="alternate" type="application/json+oembed" href="https://jevelin.shufflehound.com/portfolio1/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fjevelin.shufflehound.com%2Fportfolio1%2F" />
<link rel="alternate" type="text/xml+oembed" href="https://jevelin.shufflehound.com/portfolio1/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fjevelin.shufflehound.com%2Fportfolio1%2F&#038;format=xml" />
<link rel="icon" type="image/png" href="/fav.png" />

	<meta name="description" content="Jevelin is multi-purpose WordPress theme for creating stunning websites. Features all the right tools needed for your next design.">
	<meta name="keywords" content="agency, blog, business, corporate, creative, fitness, flat, modern, portfolio, responsive, shufflehound, startup, theme, wedding, wordpress, jevelin, multi-purpose, theme, themes">

	<!-- Google Analytics -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-57154054-2', 'auto');
			ga('send', 'pageview');
		</script>
	<!-- Google Analytics -->

	<div class="sh-page-loader sh-table sh-page-loader-style-spinner">
		<div class="sh-table-cell">
			<div id="loading-center-absolute">
				<div class="object" id="object_one"></div>
				<div class="object" id="object_two"></div>
				<div class="object" id="object_three"></div>
			</div>
		</div>
	</div>



	<noscript><style>.woocommerce-product-gallery{ opacity: 1 !important; }</style></noscript>

		<meta name="generator" content="Powered by Slider Revolution 5.4.6.3.1 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />
<script type="text/javascript">function setREVStartSize(e){
				try{ var i=jQuery(window).width(),t=9999,r=0,n=0,l=0,f=0,s=0,h=0;
					if(e.responsiveLevels&&(jQuery.each(e.responsiveLevels,function(e,f){f>i&&(t=r=f,l=e),i>f&&f>r&&(r=f,n=e)}),t>r&&(l=n)),f=e.gridheight[l]||e.gridheight[0]||e.gridheight,s=e.gridwidth[l]||e.gridwidth[0]||e.gridwidth,h=i/s,h=h>1?1:h,f=Math.round(h*f),"fullscreen"==e.sliderLayout){var u=(e.c.width(),jQuery(window).height());if(void 0!=e.fullScreenOffsetContainer){var c=e.fullScreenOffsetContainer.split(",");if (c) jQuery.each(c,function(e,i){u=jQuery(i).length>0?u-jQuery(i).outerHeight(!0):u}),e.fullScreenOffset.split("%").length>1&&void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0?u-=jQuery(window).height()*parseInt(e.fullScreenOffset,0)/100:void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0&&(u-=parseInt(e.fullScreenOffset,0))}f=u}else void 0!=e.minHeight&&f<e.minHeight&&(f=e.minHeight);e.c.closest(".rev_slider_wrapper").css({height:f})
				}catch(d){console.log("Failure at Presize of Slider:"+d)}
			};</script>
	<script type="text/javascript">
			    	</script>
</head>
<body class="home page-template-default page page-id-46 woocommerce-no-js page-white-borders">



<div class="sh-header-right-side sh-header-side">
	<div class="sh-header-scrollbar">

		<div class="sh-table-full">
			<div class="sh-table-cell">

				<div class="sh-header-mobile">
					<nav class="sh-header-mobile-dropdown">
						<div class="container sh-nav-container">
							<ul class="sh-nav-mobile">
								<li id="menu-item-63" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-46 current_page_item menu-item-63"><a href="home.php" ><i class="fas fa-home"></i>&nbsp;Home</a></li>
                                <li id="menu-item-98" class="menu-item menu-item-type-taxonomy menu-item-object-fw-portfolio-category menu-item-98"><a href="admin.php" ><i class="fas fa-user"></i>&nbsp;admin</a></li>
                            </ul>
						</div>

					</nav>
				</div>

			</div>
		</div>

				<div class="header-mobile-social-media">
                    <!-- <?php echo ucfirst($_SESSION['username']); ?> -->
                <div class="sh-clear">
                </div>
            </div>

	</div>
</div>
	<div id="page-container" class="">



					<header class="primary-mobile primary-mobile-light primary-mobile-light-noborder">

<div id="header-mobile" class="sh-header-mobile">
	<div class="sh-header-mobile-navigation">


		<div class="container">
			<div class="sh-table">
				<div class="sh-table-cell sh-group">

										            <div class="header-logo sh-group-equal">
                <a href="https://jevelin.shufflehound.com/portfolio1/" class="header-logo-container sh-table-small">

                        <div class="sh-table-cell">
                            <img class="sh-standard-logo" src="//jevelin.shufflehound.com/portfolio1/wp-content/uploads/sites/12/2017/03/Logo.png" alt="Jevelin Theme Portfolio Demo" />
                            <img class="sh-sticky-logo" src="//jevelin.shufflehound.com/portfolio1/wp-content/uploads/sites/12/2017/03/Logo.png" alt="Jevelin Theme Portfolio Demo" />
                            <img class="sh-light-logo" src="//jevelin.shufflehound.com/portfolio1/wp-content/uploads/sites/12/2017/03/Logo_w.png" alt="Jevelin Theme Portfolio Demo" />
                        </div>

                                    </a>
            </div>


				</div>
				<div class="sh-table-cell">

										<nav id="header-navigation-mobile" class="header-standard-position">
						<div class="sh-nav-container">
							<ul class="sh-nav">


        <li class="menu-item sh-nav-dropdown">
            <a>
                <div class="sh-table-full">
                    <div class="sh-table-cell">
                        <span class="c-hamburger c-hamburger--htx">
                            <span>Toggle menu</span>
                        </span>
                    </div>
                </div>
            </a>
        </li>
							</ul>
						</div>
					</nav>

				</div>
			</div>
		</div>
	</div>

	<nav class="sh-header-mobile-dropdown">
		<div class="container sh-nav-container">
			<ul class="sh-nav-mobile"></ul>
		</div>

		<div class="container sh-nav-container">
							<div class="header-mobile-search">
					<form role="search" method="get" class="header-mobile-form" action="https://jevelin.shufflehound.com/portfolio1/">
						<input class="header-mobile-form-input" type="text" placeholder="Search here.." value="" name="s" required />
						<button type="submit" class="header-mobile-form-submit">
							<i class="icon-magnifier"></i>
						</button>
					</form>
				</div>
					</div>

					<div class="header-mobile-social-media">
				<a href="http://jevelin.shufflehound.com"  target = "_blank"  class="social-media-twitter">
                <i class="icon-social-twitter"></i>
            </a><a href="http://jevelin.shufflehound.com"  target = "_blank"  class="social-media-facebook">
                <i class="icon-social-facebook"></i>
            </a><a href="http://jevelin.shufflehound.com"  target = "_blank"  class="social-media-instagram">
                <i class="icon-social-instagram"></i>
            </a><div class="sh-clear"></div>			</div>
			</nav>
</div>
					</header>
					<header class="primary-desktop primary-desktop-light primary-desktop-light-noborder">

<div class="sh-header sh-header-7 sh-header-small-icons sh-header-9">
	<div class="container">
		<div class="sh-table">
			<div class="sh-table-cell">

								<nav class="header-standard-position">
					<div class="sh-nav-container">
						<ul class="sh-nav sh-nav-left">


            <li class="menu-item sh-nav-social sh-nav-special">
                <a href="#"  target = "_blank"  class="social-media-twitter">
                <i class="fas fa-user">&nbsp;<span style="color: #ffffff;">Welcome <?php echo ucfirst($_SESSION['username']); ?></span></i>
                    
                </a>
                
                <div class="sh-clear"></div>
            </li>
						</ul>
					</div>
				</nav>

			</div>
			<div class="sh-table-cell">
			    <div class="header-logo sh-group-equal">
                <i class="fas fa-camera-retro" style="font-size: 5.5rem;color:#ffffff"></i>
            </div>


			</div>
			<div class="sh-table-cell">

								<nav class="header-standard-position">
					<div class="sh-nav-container">
						<ul class="sh-nav">


        <li class="menu-item sh-nav-dropdown">
            <a>
                <div class="sh-table-full">
                    <div class="sh-table-cell">
                        <span class="c-hamburger c-hamburger--htx">
                            <span>Toggle menu</span>
                        </span>
                    </div>
                </div>
            </a>
        </li>
						</ul>
					</div>
				</nav>

			</div>
		</div>
	</div>


<div  id="header-search" class="sh-header-search">
	<div class="sh-table-full">
		<div class="sh-table-cell">

			<div class="line-test">
				<div class="container">

					<form method="get" class="sh-header-search-form" action="https://jevelin.shufflehound.com/portfolio1/">
						<input type="search" class="sh-header-search-input" placeholder="Search Here.." value="" name="s" required />
						<button type="submit" class="sh-header-search-submit">
							<i class="icon-magnifier"></i>
						</button>
						<div class="sh-header-search-close close-header-search">
							<i class="ti-close"></i>
						</div>

											</form>

				</div>
			</div>

		</div>
	</div>
</div>
</div>
					</header>








			<div id="wrapper">


				<div class="content-container sh-page-layout-full">



			<div class="sh-window-line line-top"></div>
		<div class="sh-window-line line-bottom"></div>
		<div class="sh-window-line line-right"></div>
		<div class="sh-window-line line-left"></div>

	<div id="content" class="page-content ">

		<div class="fw-page-builder-content">
<section class="sh-section sh-section-7518da57a191374d355d3a46c3ae60e2 fw-main-row sh-section-visibility-everywhere">


	<div class="sh-section-container container">
		<div class="fw-row">

<div class="sh-column sh-column-bfa7889fe2d0bdd54c0b0f21829424cb fw-col-xs-12 fw-col-sm-2" >


	<div class="sh-column-wrapper">
			</div>
</div>

<div class="sh-column sh-column-30ff80c397e0559482fb634ec76de4c9 fw-col-xs-12 fw-col-sm-8" >


	<div class="sh-column-wrapper">


	<div class="sh-heading sh-heading-style1" id="heading-ab763994de9c30b7429f4c870ed8ade3">
		<h1 class="sh-heading-content size-xxxl">
			<span style="text-align: center;">My <strong>Gallery</strong></span>		</h1>
	</div>



	<div class="sh-heading sh-heading-style1" id="heading-978b5ee790c06522ed501e56c2b026b1">
		<!-- <h1 class="sh-heading-content size-custom">
			<span style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dignissim consectetur feugiat. Fusce quis ex fringilla, facilisis velit et, euismod mauris. Vivamus quis consectetur nisi. Ut a est enim. Suspendisse imperdiet nisl id <a href="#">metus posuere mattis.</a></span>		</h1> -->
	</div>

	</div>
</div>

<div class="sh-column sh-column-e7611e53fceba3fabd51b8777541805c fw-col-xs-12 fw-col-sm-2" >


	<div class="sh-column-wrapper">
			</div>
</div>
</div>

	</div>
</section>

<section class="sh-section sh-section-cd321080d72c17745b45383031d6f024 fw-main-row sh-section-visibility-everywhere">


	<div class="sh-section-container container">
		<div class="fw-row">

<div class="sh-column sh-column-8636941e702de9296ad33cc46411844e fw-col-xs-12" >


	<div class="sh-column-wrapper">


	<div id="portfolio-fancy-filter-7c965475e86778586eb3f5c5f5821836" class="sh-filter-container sh-filter-fancy-container sh-portfolio-filter-style3 sh-portfolio-filter-style4 sh-portfolio-filter-style5 sh-portfolio-filter-alignment-center sh-portfolio-filter-mobile-alignment-center">
					<div class="sh-filer-icon">
				<i class="icon-layers"></i>
			</div>

		<div class="sh-filter" id="filter-7c965475e86778586eb3f5c5f5821836">
			<span class="sh-filter-item active" data-filter="*" data-href="https://jevelin.shufflehound.com/portfolio1/">
				<div class="sh-filter-item-content">All</div>
			</span>

			<span class="sh-filter-item" data-filter=".category-art" data-href="https://jevelin.shufflehound.com/portfolio1/?category=art">
							<div class="sh-filter-item-content">Art</div>
						</span>
																				<span class="sh-filter-item" data-filter=".category-commercial" data-href="https://jevelin.shufflehound.com/portfolio1/?category=commercial">
							<div class="sh-filter-item-content">Commercial</div>
						</span>
																				<span class="sh-filter-item" data-filter=".category-design" data-href="https://jevelin.shufflehound.com/portfolio1/?category=design">
							<div class="sh-filter-item-content">Design</div>
						</span>
																				<span class="sh-filter-item" data-filter=".category-misc" data-href="https://jevelin.shufflehound.com/portfolio1/?category=misc">
							<div class="sh-filter-item-content">Misc</div>
						</span>
																				<span class="sh-filter-item" data-filter=".category-mock-up" data-href="https://jevelin.shufflehound.com/portfolio1/?category=mock-up">
							<div class="sh-filter-item-content">Mock-up</div>
						</span>
																				<span class="sh-filter-item" data-filter=".category-photography" data-href="https://jevelin.shufflehound.com/portfolio1/?category=photography">
							<div class="sh-filter-item-content">Photography</div>
						</span>
																				<span class="sh-filter-item" data-filter=".category-tech" data-href="https://jevelin.shufflehound.com/portfolio1/?category=tech">
							<div class="sh-filter-item-content">Tech</div>
						</span>

					</div>
	</div>

<div id="portfolio-fancy-7c965475e86778586eb3f5c5f5821836" class="sh-portfolio-fancy sh-portfolio-fancy-columns3">

        <?php while ($row = $rows->fetch()): ?>
		<div class="sh-portfolio-fancy-item category-art category-commercial" id="portfolio-45">
			<div class="sh-portfolio-fancy-itemc-container">
                <?php echo '<img class="sh-portfolio-img" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="200px"/>'; ?>
                <a href="#" class="sh-portfolio-fancy-item-overlay-bg"></a>
				<div class="sh-portfolio-fancy-item-overlay">
					<div class="sh-portfolio-fancy-item-overlay-container">
						<a href="showContent.php" class="sh-portfolio-fancy-item-overlay-title" style="font-size: 5.5rem !important;color: #ffffff !important;text-shadow: 2px 2px #aaa !important;">
                            <?php echo $row['name']; ?>
						</a>
						<div class="sh-portfolio-fancy-item-overlay-categories">
							<a href="showContent.php" class="sh-portfolio-category sh-heading-font">Art</a><span>,</span> <a href="https://jevelin.shufflehound.com/portfolio1/portfolio/commercial/" class="sh-portfolio-category sh-heading-font">Commercial</a>						</div>
						<a href="showContent.php" rel="lightbox" class="sh-portfolio-fancy-item-overlay-lightbox">
							<i class="icon icon-size-fullscreen"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile;?>
                        


		<div class="sh-portfolio-fancy-item category-design category-mock-up" id="portfolio-44">
			<div class="sh-portfolio-fancy-itemc-container">
				<img class="sh-portfolio-img" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/2-925x1024.jpg" alt="" />

				<a href="https://jevelin.shufflehound.com/portfolio1/project/gray-bag-mock-up/" class="sh-portfolio-fancy-item-overlay-bg"></a>
				<div class="sh-portfolio-fancy-item-overlay">
					<div class="sh-portfolio-fancy-item-overlay-container">
						<a href="https://jevelin.shufflehound.com/portfolio1/project/gray-bag-mock-up/" class="sh-portfolio-fancy-item-overlay-title">
							<h3>Gray Bag Mock-up</h3>
						</a>
						<div class="sh-portfolio-fancy-item-overlay-categories">
							<a href="https://jevelin.shufflehound.com/portfolio1/portfolio/design/" class="sh-portfolio-category sh-heading-font">Design</a><span>,</span> <a href="https://jevelin.shufflehound.com/portfolio1/portfolio/mock-up/" class="sh-portfolio-category sh-heading-font">Mock-up</a>						</div>
						<a href="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/2-925x1024.jpg" rel="lightbox" class="sh-portfolio-fancy-item-overlay-lightbox">
							<i class="icon icon-size-fullscreen"></i>
						</a>
					</div>
				</div>
			</div>
		</div>



		<div class="sh-portfolio-fancy-item category-misc category-photography" id="portfolio-43">
			<div class="sh-portfolio-fancy-itemc-container">
				<img class="sh-portfolio-img" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/3-1024x835.jpg" alt="" />

				<a href="https://jevelin.shufflehound.com/portfolio1/project/beautiful-landscape/" class="sh-portfolio-fancy-item-overlay-bg"></a>
				<div class="sh-portfolio-fancy-item-overlay">
					<div class="sh-portfolio-fancy-item-overlay-container">
						<a href="https://jevelin.shufflehound.com/portfolio1/project/beautiful-landscape/" class="sh-portfolio-fancy-item-overlay-title">
							<h3>Beautiful Landscape</h3>
						</a>
						<div class="sh-portfolio-fancy-item-overlay-categories">
							<a href="https://jevelin.shufflehound.com/portfolio1/portfolio/misc/" class="sh-portfolio-category sh-heading-font">Misc</a><span>,</span> <a href="https://jevelin.shufflehound.com/portfolio1/portfolio/photography/" class="sh-portfolio-category sh-heading-font">Photography</a>						</div>
						<a href="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/3-1024x835.jpg" rel="lightbox" class="sh-portfolio-fancy-item-overlay-lightbox">
							<i class="icon icon-size-fullscreen"></i>
						</a>
					</div>
				</div>
			</div>
		</div>



		<div class="sh-portfolio-fancy-item category-art category-commercial" id="portfolio-41">
			<div class="sh-portfolio-fancy-itemc-container">
				<img class="sh-portfolio-img" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/4-1024x922.jpg" alt="" />

				<a href="https://jevelin.shufflehound.com/portfolio1/project/sketch-book/" class="sh-portfolio-fancy-item-overlay-bg"></a>
				<div class="sh-portfolio-fancy-item-overlay">
					<div class="sh-portfolio-fancy-item-overlay-container">
						<a href="https://jevelin.shufflehound.com/portfolio1/project/sketch-book/" class="sh-portfolio-fancy-item-overlay-title">
							<h3>Sketch Book</h3>
						</a>
						<div class="sh-portfolio-fancy-item-overlay-categories">
							<a href="https://jevelin.shufflehound.com/portfolio1/portfolio/art/" class="sh-portfolio-category sh-heading-font">Art</a><span>,</span> <a href="https://jevelin.shufflehound.com/portfolio1/portfolio/commercial/" class="sh-portfolio-category sh-heading-font">Commercial</a>						</div>
						<a href="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/4-1024x922.jpg" rel="lightbox" class="sh-portfolio-fancy-item-overlay-lightbox">
							<i class="icon icon-size-fullscreen"></i>
						</a>
					</div>
				</div>
			</div>
		</div>



		<div class="sh-portfolio-fancy-item category-design category-misc" id="portfolio-39">
			<div class="sh-portfolio-fancy-itemc-container">
				<img class="sh-portfolio-img" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/5-1024x970.jpg" alt="" />

				<a href="https://jevelin.shufflehound.com/portfolio1/project/book-cover-design/" class="sh-portfolio-fancy-item-overlay-bg"></a>
				<div class="sh-portfolio-fancy-item-overlay">
					<div class="sh-portfolio-fancy-item-overlay-container">
						<a href="https://jevelin.shufflehound.com/portfolio1/project/book-cover-design/" class="sh-portfolio-fancy-item-overlay-title">
							<h3>Book Cover Design</h3>
						</a>
						<div class="sh-portfolio-fancy-item-overlay-categories">
							<a href="https://jevelin.shufflehound.com/portfolio1/portfolio/design/" class="sh-portfolio-category sh-heading-font">Design</a><span>,</span> <a href="https://jevelin.shufflehound.com/portfolio1/portfolio/misc/" class="sh-portfolio-category sh-heading-font">Misc</a>						</div>
						<a href="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/5-1024x970.jpg" rel="lightbox" class="sh-portfolio-fancy-item-overlay-lightbox">
							<i class="icon icon-size-fullscreen"></i>
						</a>
					</div>
				</div>
			</div>
		</div>



		<div class="sh-portfolio-fancy-item category-misc category-photography" id="portfolio-37">
			<div class="sh-portfolio-fancy-itemc-container">
				<img class="sh-portfolio-img" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/6-1024x934.jpg" alt="" />

				<a href="https://jevelin.shufflehound.com/portfolio1/project/snowy-mountain-trip/" class="sh-portfolio-fancy-item-overlay-bg"></a>
				<div class="sh-portfolio-fancy-item-overlay">
					<div class="sh-portfolio-fancy-item-overlay-container">
						<a href="https://jevelin.shufflehound.com/portfolio1/project/snowy-mountain-trip/" class="sh-portfolio-fancy-item-overlay-title">
							<h3>Snowy Mountain Trip</h3>
						</a>
						<div class="sh-portfolio-fancy-item-overlay-categories">
							<a href="https://jevelin.shufflehound.com/portfolio1/portfolio/misc/" class="sh-portfolio-category sh-heading-font">Misc</a><span>,</span> <a href="https://jevelin.shufflehound.com/portfolio1/portfolio/photography/" class="sh-portfolio-category sh-heading-font">Photography</a>						</div>
						<a href="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/6-1024x934.jpg" rel="lightbox" class="sh-portfolio-fancy-item-overlay-lightbox">
							<i class="icon icon-size-fullscreen"></i>
						</a>
					</div>
				</div>
			</div>
		</div>



		<div class="sh-portfolio-fancy-item category-commercial category-design" id="portfolio-36">
			<div class="sh-portfolio-fancy-itemc-container">
				<img class="sh-portfolio-img" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/7-937x1024.jpg" alt="" />

				<a href="https://jevelin.shufflehound.com/portfolio1/project/website-mock-up-with-tool-tip/" class="sh-portfolio-fancy-item-overlay-bg"></a>
				<div class="sh-portfolio-fancy-item-overlay">
					<div class="sh-portfolio-fancy-item-overlay-container">
						<a href="https://jevelin.shufflehound.com/portfolio1/project/website-mock-up-with-tool-tip/" class="sh-portfolio-fancy-item-overlay-title">
							<h3>Website Mock-up With Tool-tip</h3>
						</a>
						<div class="sh-portfolio-fancy-item-overlay-categories">
							<a href="https://jevelin.shufflehound.com/portfolio1/portfolio/commercial/" class="sh-portfolio-category sh-heading-font">Commercial</a><span>,</span> <a href="https://jevelin.shufflehound.com/portfolio1/portfolio/design/" class="sh-portfolio-category sh-heading-font">Design</a>						</div>
						<a href="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/7-937x1024.jpg" rel="lightbox" class="sh-portfolio-fancy-item-overlay-lightbox">
							<i class="icon icon-size-fullscreen"></i>
						</a>
					</div>
				</div>
			</div>
		</div>



		<div class="sh-portfolio-fancy-item category-design category-tech" id="portfolio-35">
			<div class="sh-portfolio-fancy-itemc-container">
				<img class="sh-portfolio-img" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/8-1024x719.jpg" alt="" />

				<a href="https://jevelin.shufflehound.com/portfolio1/project/clean-workspace-coffee/" class="sh-portfolio-fancy-item-overlay-bg"></a>
				<div class="sh-portfolio-fancy-item-overlay">
					<div class="sh-portfolio-fancy-item-overlay-container">
						<a href="https://jevelin.shufflehound.com/portfolio1/project/clean-workspace-coffee/" class="sh-portfolio-fancy-item-overlay-title">
							<h3>Clean Workspace + Coffee</h3>
						</a>
						<div class="sh-portfolio-fancy-item-overlay-categories">
							<a href="https://jevelin.shufflehound.com/portfolio1/portfolio/design/" class="sh-portfolio-category sh-heading-font">Design</a><span>,</span> <a href="https://jevelin.shufflehound.com/portfolio1/portfolio/tech/" class="sh-portfolio-category sh-heading-font">Tech</a>						</div>
						<a href="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/8-1024x719.jpg" rel="lightbox" class="sh-portfolio-fancy-item-overlay-lightbox">
							<i class="icon icon-size-fullscreen"></i>
						</a>
					</div>
				</div>
			</div>
		</div>



		<div class="sh-portfolio-fancy-item category-commercial category-mock-up" id="portfolio-33">
			<div class="sh-portfolio-fancy-itemc-container">
				<img class="sh-portfolio-img" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/9-1024x590.jpg" alt="" />

				<a href="https://jevelin.shufflehound.com/portfolio1/project/website-mock-up-blue-background/" class="sh-portfolio-fancy-item-overlay-bg"></a>
				<div class="sh-portfolio-fancy-item-overlay">
					<div class="sh-portfolio-fancy-item-overlay-container">
						<a href="https://jevelin.shufflehound.com/portfolio1/project/website-mock-up-blue-background/" class="sh-portfolio-fancy-item-overlay-title">
							<h3>Website Mock-up Blue Background</h3>
						</a>
						<div class="sh-portfolio-fancy-item-overlay-categories">
							<a href="https://jevelin.shufflehound.com/portfolio1/portfolio/commercial/" class="sh-portfolio-category sh-heading-font">Commercial</a><span>,</span> <a href="https://jevelin.shufflehound.com/portfolio1/portfolio/mock-up/" class="sh-portfolio-category sh-heading-font">Mock-up</a>						</div>
						<a href="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/9-1024x590.jpg" rel="lightbox" class="sh-portfolio-fancy-item-overlay-lightbox">
							<i class="icon icon-size-fullscreen"></i>
						</a>
					</div>
				</div>
			</div>
		</div>



		<div class="sh-portfolio-fancy-item category-misc category-photography" id="portfolio-30">
			<div class="sh-portfolio-fancy-itemc-container">
				<img class="sh-portfolio-img" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/10-876x1024.jpg" alt="" />

				<a href="https://jevelin.shufflehound.com/portfolio1/project/craftsman-at-work/" class="sh-portfolio-fancy-item-overlay-bg"></a>
				<div class="sh-portfolio-fancy-item-overlay">
					<div class="sh-portfolio-fancy-item-overlay-container">
						<a href="https://jevelin.shufflehound.com/portfolio1/project/craftsman-at-work/" class="sh-portfolio-fancy-item-overlay-title">
							<h3>Craftsman At Work</h3>
						</a>
						<div class="sh-portfolio-fancy-item-overlay-categories">
							<a href="https://jevelin.shufflehound.com/portfolio1/portfolio/misc/" class="sh-portfolio-category sh-heading-font">Misc</a><span>,</span> <a href="https://jevelin.shufflehound.com/portfolio1/portfolio/photography/" class="sh-portfolio-category sh-heading-font">Photography</a>						</div>
						<a href="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/10-876x1024.jpg" rel="lightbox" class="sh-portfolio-fancy-item-overlay-lightbox">
							<i class="icon icon-size-fullscreen"></i>
						</a>
					</div>
				</div>
			</div>
		</div>



		<div class="sh-portfolio-fancy-item category-photography category-tech" id="portfolio-29">
			<div class="sh-portfolio-fancy-itemc-container">
				<img class="sh-portfolio-img" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/11-1024x711.jpg" alt="" />

				<a href="https://jevelin.shufflehound.com/portfolio1/project/work-environment/" class="sh-portfolio-fancy-item-overlay-bg"></a>
				<div class="sh-portfolio-fancy-item-overlay">
					<div class="sh-portfolio-fancy-item-overlay-container">
						<a href="https://jevelin.shufflehound.com/portfolio1/project/work-environment/" class="sh-portfolio-fancy-item-overlay-title">
							<h3>Work Environment</h3>
						</a>
						<div class="sh-portfolio-fancy-item-overlay-categories">
							<a href="https://jevelin.shufflehound.com/portfolio1/portfolio/photography/" class="sh-portfolio-category sh-heading-font">Photography</a><span>,</span> <a href="https://jevelin.shufflehound.com/portfolio1/portfolio/tech/" class="sh-portfolio-category sh-heading-font">Tech</a>						</div>
						<a href="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/11-1024x711.jpg" rel="lightbox" class="sh-portfolio-fancy-item-overlay-lightbox">
							<i class="icon icon-size-fullscreen"></i>
						</a>
					</div>
				</div>
			</div>
		</div>



		<div class="sh-portfolio-fancy-item category-photography category-tech" id="portfolio-27">
			<div class="sh-portfolio-fancy-itemc-container">
				<img class="sh-portfolio-img" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/12-1024x677.jpg" alt="" />

				<a href="https://jevelin.shufflehound.com/portfolio1/project/beautiful-product-picture/" class="sh-portfolio-fancy-item-overlay-bg"></a>
				<div class="sh-portfolio-fancy-item-overlay">
					<div class="sh-portfolio-fancy-item-overlay-container">
						<a href="https://jevelin.shufflehound.com/portfolio1/project/beautiful-product-picture/" class="sh-portfolio-fancy-item-overlay-title">
							<h3>Beautiful Product Picture</h3>
						</a>
						<div class="sh-portfolio-fancy-item-overlay-categories">
							<a href="https://jevelin.shufflehound.com/portfolio1/portfolio/photography/" class="sh-portfolio-category sh-heading-font">Photography</a><span>,</span> <a href="https://jevelin.shufflehound.com/portfolio1/portfolio/tech/" class="sh-portfolio-category sh-heading-font">Tech</a>						</div>
						<a href="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/12-1024x677.jpg" rel="lightbox" class="sh-portfolio-fancy-item-overlay-lightbox">
							<i class="icon icon-size-fullscreen"></i>
						</a>
					</div>
				</div>
			</div>
		</div>



		<div class="sh-portfolio-fancy-item category-commercial category-mock-up" id="portfolio-26">
			<div class="sh-portfolio-fancy-itemc-container">
				<img class="sh-portfolio-img" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/13-1024x1024.jpg" alt="" />

				<a href="https://jevelin.shufflehound.com/portfolio1/project/stock-of-bottles/" class="sh-portfolio-fancy-item-overlay-bg"></a>
				<div class="sh-portfolio-fancy-item-overlay">
					<div class="sh-portfolio-fancy-item-overlay-container">
						<a href="https://jevelin.shufflehound.com/portfolio1/project/stock-of-bottles/" class="sh-portfolio-fancy-item-overlay-title">
							<h3>Stock of Bottles</h3>
						</a>
						<div class="sh-portfolio-fancy-item-overlay-categories">
							<a href="https://jevelin.shufflehound.com/portfolio1/portfolio/commercial/" class="sh-portfolio-category sh-heading-font">Commercial</a><span>,</span> <a href="https://jevelin.shufflehound.com/portfolio1/portfolio/mock-up/" class="sh-portfolio-category sh-heading-font">Mock-up</a>						</div>
						<a href="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/13-1024x1024.jpg" rel="lightbox" class="sh-portfolio-fancy-item-overlay-lightbox">
							<i class="icon icon-size-fullscreen"></i>
						</a>
					</div>
				</div>
			</div>
		</div>



		<div class="sh-portfolio-fancy-item category-design category-misc" id="portfolio-25">
			<div class="sh-portfolio-fancy-itemc-container">
				<img class="sh-portfolio-img" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/14-1024x685.jpg" alt="" />

				<a href="https://jevelin.shufflehound.com/portfolio1/project/fine-sketchbook-black-white/" class="sh-portfolio-fancy-item-overlay-bg"></a>
				<div class="sh-portfolio-fancy-item-overlay">
					<div class="sh-portfolio-fancy-item-overlay-container">
						<a href="https://jevelin.shufflehound.com/portfolio1/project/fine-sketchbook-black-white/" class="sh-portfolio-fancy-item-overlay-title">
							<h3>Fine Sketchbook + Black &#038; White</h3>
						</a>
						<div class="sh-portfolio-fancy-item-overlay-categories">
							<a href="https://jevelin.shufflehound.com/portfolio1/portfolio/design/" class="sh-portfolio-category sh-heading-font">Design</a><span>,</span> <a href="https://jevelin.shufflehound.com/portfolio1/portfolio/misc/" class="sh-portfolio-category sh-heading-font">Misc</a>						</div>
						<a href="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/14-1024x685.jpg" rel="lightbox" class="sh-portfolio-fancy-item-overlay-lightbox">
							<i class="icon icon-size-fullscreen"></i>
						</a>
					</div>
				</div>
			</div>
		</div>



		<div class="sh-portfolio-fancy-item category-design category-misc" id="portfolio-9">
			<div class="sh-portfolio-fancy-itemc-container">
				<img class="sh-portfolio-img" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/15-989x1024.jpg" alt="" />

				<a href="https://jevelin.shufflehound.com/portfolio1/project/bottle-family/" class="sh-portfolio-fancy-item-overlay-bg"></a>
				<div class="sh-portfolio-fancy-item-overlay">
					<div class="sh-portfolio-fancy-item-overlay-container">
						<a href="https://jevelin.shufflehound.com/portfolio1/project/bottle-family/" class="sh-portfolio-fancy-item-overlay-title">
							<h3>Bottle Family</h3>
						</a>
						<div class="sh-portfolio-fancy-item-overlay-categories">
							<a href="https://jevelin.shufflehound.com/portfolio1/portfolio/design/" class="sh-portfolio-category sh-heading-font">Design</a><span>,</span> <a href="https://jevelin.shufflehound.com/portfolio1/portfolio/misc/" class="sh-portfolio-category sh-heading-font">Misc</a>						</div>
						<a href="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/15-989x1024.jpg" rel="lightbox" class="sh-portfolio-fancy-item-overlay-lightbox">
							<i class="icon icon-size-fullscreen"></i>
						</a>
					</div>
				</div>
			</div>
		</div>



		<div class="sh-portfolio-fancy-item category-misc category-photography" id="portfolio-57">
			<div class="sh-portfolio-fancy-itemc-container">
				<img class="sh-portfolio-img" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/16-1015x1024.jpg" alt="" />

				<a href="https://jevelin.shufflehound.com/portfolio1/project/lonely-sign/" class="sh-portfolio-fancy-item-overlay-bg"></a>
				<div class="sh-portfolio-fancy-item-overlay">
					<div class="sh-portfolio-fancy-item-overlay-container">
						<a href="https://jevelin.shufflehound.com/portfolio1/project/lonely-sign/" class="sh-portfolio-fancy-item-overlay-title">
							<h3>Lonely Sign</h3>
						</a>
						<div class="sh-portfolio-fancy-item-overlay-categories">
							<a href="https://jevelin.shufflehound.com/portfolio1/portfolio/misc/" class="sh-portfolio-category sh-heading-font">Misc</a><span>,</span> <a href="https://jevelin.shufflehound.com/portfolio1/portfolio/photography/" class="sh-portfolio-category sh-heading-font">Photography</a>						</div>
						<a href="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/16-1015x1024.jpg" rel="lightbox" class="sh-portfolio-fancy-item-overlay-lightbox">
							<i class="icon icon-size-fullscreen"></i>
						</a>
					</div>
				</div>
			</div>
		</div>



		<div class="sh-portfolio-fancy-item category-art category-photography" id="portfolio-56">
			<div class="sh-portfolio-fancy-itemc-container">
				<img class="sh-portfolio-img" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/17-1024x734.jpg" alt="" />

				<a href="https://jevelin.shufflehound.com/portfolio1/project/flower-water-drops-black-background/" class="sh-portfolio-fancy-item-overlay-bg"></a>
				<div class="sh-portfolio-fancy-item-overlay">
					<div class="sh-portfolio-fancy-item-overlay-container">
						<a href="https://jevelin.shufflehound.com/portfolio1/project/flower-water-drops-black-background/" class="sh-portfolio-fancy-item-overlay-title">
							<h3>Flower + Water drops + Black Background</h3>
						</a>
						<div class="sh-portfolio-fancy-item-overlay-categories">
							<a href="https://jevelin.shufflehound.com/portfolio1/portfolio/art/" class="sh-portfolio-category sh-heading-font">Art</a><span>,</span> <a href="https://jevelin.shufflehound.com/portfolio1/portfolio/photography/" class="sh-portfolio-category sh-heading-font">Photography</a>						</div>
						<a href="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/17-1024x734.jpg" rel="lightbox" class="sh-portfolio-fancy-item-overlay-lightbox">
							<i class="icon icon-size-fullscreen"></i>
						</a>
					</div>
				</div>
			</div>
		</div>



		<div class="sh-portfolio-fancy-item category-photography category-tech" id="portfolio-47">
			<div class="sh-portfolio-fancy-itemc-container">
				<img class="sh-portfolio-img" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/18-1024x780.jpg" alt="" />

				<a href="https://jevelin.shufflehound.com/portfolio1/project/back-white-setup/" class="sh-portfolio-fancy-item-overlay-bg"></a>
				<div class="sh-portfolio-fancy-item-overlay">
					<div class="sh-portfolio-fancy-item-overlay-container">
						<a href="https://jevelin.shufflehound.com/portfolio1/project/back-white-setup/" class="sh-portfolio-fancy-item-overlay-title">
							<h3>Back &#038; White Setup</h3>
						</a>
						<div class="sh-portfolio-fancy-item-overlay-categories">
							<a href="https://jevelin.shufflehound.com/portfolio1/portfolio/photography/" class="sh-portfolio-category sh-heading-font">Photography</a><span>,</span> <a href="https://jevelin.shufflehound.com/portfolio1/portfolio/tech/" class="sh-portfolio-category sh-heading-font">Tech</a>						</div>
						<a href="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/18-1024x780.jpg" rel="lightbox" class="sh-portfolio-fancy-item-overlay-lightbox">
							<i class="icon icon-size-fullscreen"></i>
						</a>
					</div>
				</div>
			</div>
		</div>

	</div>


	</div>
</div>
</div>

	</div>
</section>

<section class="sh-section sh-section-f96ba966643f95fa2fb7f4ee1203df24 fw-main-row sh-section-visibility-everywhere">


	<div class="sh-section-container container">
		<div class="fw-row">

<div class="sh-column sh-column-21e87a75a1fec5cb22aae82702130cc9 fw-col-xs-12 fw-col-sm-3" >


	<div class="sh-column-wrapper">


	<div class="sh-heading sh-heading-style1" id="heading-73b2b83c15bd2f677de0121296df5af0">
		<h1 class="sh-heading-content size-xl">
			<span style="text-align: left;">Some of our</span><span style="text-align: left;"><strong>friends</strong></span>		</h1>
	</div>

	</div>
</div>

<div class="sh-column sh-column-54af4fd846992bf2601c711966f72a48 fw-col-xs-12 fw-col-sm-9" >


	<div class="sh-column-wrapper">




<div id="partners-5a7994efc691be40b038bf0c95fd5227" class="sh-partners-carousel" data-autoplay="5000" data-id="5">
						<div class="">
				<div class="sh-partners-carousel-item-content">

					<img src="//cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/Logo_4.png" alt="" />

									</div>
			</div>
					<div class="">
				<div class="sh-partners-carousel-item-content">

					<img src="//cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/Logo_3.png" alt="" />

									</div>
			</div>
					<div class="">
				<div class="sh-partners-carousel-item-content">

					<img src="//cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/Logo_2.png" alt="" />

									</div>
			</div>
					<div class="">
				<div class="sh-partners-carousel-item-content">

					<img src="//cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/Logo_1.png" alt="" />

									</div>
			</div>
					<div class="">
				<div class="sh-partners-carousel-item-content">

					<img src="//cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/Logo_5.png" alt="" />

									</div>
			</div>
					<div class="">
				<div class="sh-partners-carousel-item-content">

					<img src="//cdn.jevelin.shufflehound.com/wp-content/uploads/sites/12/2017/03/Logo_3.png" alt="" />

									</div>
			</div>
			</div>
	</div>
</div>
</div>

	</div>
</section>
</div>
				<div class="sh-clear"></div>

	</div>


		</div>


				<footer class="sh-footer">
            </footer>
						</div>
		<div class="sh-back-to-top sh-back-to-top3">
			<i class="icon-arrow-up"></i>
		</div>

	</div>





	<!-- <script>
		jQuery(document).ready(function ($) {
			var chatra_init = 0;
			jQuery(window).on('scroll', function() {
			    if( chatra_init == 0 ){
					window.ChatraSetup = {
					    colors: {
					        buttonText: '#fff',
					        buttonBg: '#47c9e5'
					    }
					};

				    (function(d, w, c) {
				        w.ChatraID = 'rZ9ZrwbmwQnBo72So';
				        var s = d.createElement('script');
				        w[c] = w[c] || function() {
				            (w[c].q = w[c].q || []).push(arguments);
				        };
				        s.async = true;
				        s.src = (d.location.protocol === 'https:' ? 'https:': 'http:')
				        + '//call.chatra.io/chatra.js';
				        if (d.head) d.head.appendChild(s);
				    })(document, window, 'Chatra');

				    chatra_init = 1;
			    }
			});
		});
	</script> -->
	<!-- /Chatra {/literal} -->







	<script type="text/javascript">
	jQuery(document).ready(function ($) {


        $('.primary-desktop .header-logo-container, .primary-mobile .header-logo-container').attr('href','//jevelin.shufflehound.com/hello/');

		function jevelin_settings() {
			if( $(window).width() < 600 ) {
				$('.sh-settings').hide();
			} else {
				$('.sh-settings').show();
			}
		}
		jevelin_settings();

	    $(window).resize(function() {
	        clearTimeout(window.resizedFinished2);
	        window.resizedFinished2 = setTimeout(function(){
	            jevelin_settings();
	        }, 500);
	    });

		$('.sh-settings-hide').on( 'click', function() {
			$('.sh-settings').toggleClass( 'sh-settings-active' );
		});

	    $(document).keyup(function(e) {
	        if (e.keyCode == 27) {
	            if( $('.sh-settings').hasClass('sh-settings-active') ) {
	                $('.sh-settings').removeClass('sh-settings-active');
	            }
	        }
	    });

		jQuery('.form-submit #submit').on('click', function( event ) {
			alert( 'This feature is disabled in our demo site. Sorry for any inconvenience.' );
			event.preventDefault()
			event.stopPropagation()
			return false;
		});

	});
	</script>




<script type="text/javascript">

	jQuery(document).ready(function ($) {
	    "use strict";

	    $(".sh-page-loader").fadeOut(500);
	    $("body").css('overflow-y', 'visible').css('overflow-x', 'hidden');

		$(window).bind('beforeunload', function(e){
			$('.sh-page-loader').fadeIn();
		});

	});
</script>




	<script type="text/javascript">
		var c = document.body.className;
		c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
		document.body.className = c;
	</script>
	<script type='text/javascript'>
/* <![CDATA[ */
var wc_add_to_cart_params = {"ajax_url":"\/portfolio1\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/portfolio1\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"https:\/\/jevelin.shufflehound.com\/portfolio1","is_cart":"","cart_redirect_after_add":"no"};
/* ]]> */
</script>
<script type='text/javascript' src='https://jevelin.shufflehound.com/portfolio1/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=3.4.3'></script>
<script type='text/javascript' src='https://jevelin.shufflehound.com/portfolio1/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.70'></script>
<script type='text/javascript' src='https://jevelin.shufflehound.com/portfolio1/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js?ver=2.1.4'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/portfolio1\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/portfolio1\/?wc-ajax=%%endpoint%%"};
/* ]]> */
</script>
<script type='text/javascript' src='https://jevelin.shufflehound.com/portfolio1/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=3.4.3'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_cart_fragments_params = {"ajax_url":"\/portfolio1\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/portfolio1\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_681a7912d4762a4be5c8e7ca465ede50","fragment_name":"wc_fragments_681a7912d4762a4be5c8e7ca465ede50"};
/* ]]> */
</script>
<script type='text/javascript' src='https://jevelin.shufflehound.com/portfolio1/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=3.4.3'></script>
<script type='text/javascript' src='https://jevelin.shufflehound.com/portfolio1/wp-includes/js/jquery/ui/effect.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='https://jevelin.shufflehound.com/portfolio1/wp-content/themes/jevelin/js/plugins/bootstrap.min.js?ver=3.3.4'></script>
<script type='text/javascript' src='https://jevelin.shufflehound.com/portfolio1/wp-includes/js/wp-embed.min.js?ver=4.9.8'></script>
<script type='text/javascript' src='https://jevelin.shufflehound.com/portfolio1/wp-includes/js/comment-reply.min.js?ver=4.9.8'></script>
	<script type="text/javascript"> jQuery(document).ready(function ($) { "use strict"; });</script>

</body>
</html>