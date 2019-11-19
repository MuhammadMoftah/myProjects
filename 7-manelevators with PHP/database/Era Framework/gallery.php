<?
include_once ("classes/core.php");
$core = new core;

include ("classes/mail/MAIL5.php");

include ("inc_formemail.php");

$err = null;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="stylesheet" href="css/screen.css">
		<link rel="stylesheet" href="css/lightbox.css">
		<?
		include ("header.html");
		?>
	</head>
	<body class="body">
		<div class="wrapper">
			<div class="header">
				<?
				include ("inc_header.php");
				?>
			</div>
			<div class="clrrr"></div>
			<div class="menu">
				<?
				include ("inc_menu.php");
				?>
			</div>
			<div class="clrrr"></div>

	 
 
 
			 <div class="innerbody">
					<div class="reachtext">

				 		<p class="topbodytextheader">Gallery <span style="color: #C33;">Al NADA Co</span>
<br/>
 <img src="images/aboutline.png" style="margin: auto; margin-top: 10px;" alt="<? echo $alt; ?>"/>
</p>




 

						<div class="innerdecrption">
							<div style="text-align: center; line-height: 26px;" class="teext">
								  <?php
							$logopram = array();

	$photogallery = $core -> getgallery($logopram);

	if($photogallery){
			 
		$index  = 0;
	while ($index < count($photogallery)){
							?>

<div class="innerddslide3">
 <div class="underslidercontentblock1" style="margin-bottom: 0px;">
							<div class="servicesimagebottom1">
								  <img class="pppoimg" src="images/<? echo $photogallery[$index]['image'];?>" alt="<?php echo $alt; ?>"/>  

								<a   title="<? echo $title; ?>" href="images/<? echo $photogallery[$index]['image'];?>" data-lightbox="<? echo $title; ?>" data-title="<? echo $title; ?>">
								<div class="backgrounnd1"> 
								</div> </a>
							</div>
				</div>
</div>

<?php
							$index = $index + 1;
							}

							}
							?>
							</div>
						</div>
					</div>
				</div>

			<div class="clrrr"></div>

			<div class="footer">

				<?
				include ("inc-footer.php");
				?>
			</div>

			<div class="clrrr"></div>

			<div class="copyright">

				<?
				include ("inc-copyright.php");
				?>
			</div>
			<div class="clrrr"></div>
		</div>
	</body>
</html>
<script src="js/lightbox.js"></script>
<script>
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-2196019-1']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script');
		ga.type = 'text/javascript';
		ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(ga, s);
	})(); 
</script>
<?
include ("inc_script.php");
?>
