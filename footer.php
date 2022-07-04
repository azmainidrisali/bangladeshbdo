<?php

global $bangladeshbdooption;

?>

<footer>

<div class="container">
	<div class="footer">
		<div class="row">
			<div class="col-md-6">
				<div class="footerColum1">
					<div class="webTitleName">
						<h1><?php echo $bangladeshbdooption['footerMaintext']?></h1>
					</div>
					<div class="description">
						<p><?php echo $bangladeshbdooption['footerEmail']?></p>
						<p><?php echo $bangladeshbdooption['footerCellNumber']?></p>
					</div>
					<div class="socialMedia">
						<ul>
							<a href="<?php echo $bangladeshbdooption['facebookLink']?>"><li><i class="fab fa-facebook"></i></li></a>
							<a href="<?php echo $bangladeshbdooption['instagramLink']?>"><li><i class="fab fa-instagram"></i></li></a>
							<a href="<?php echo $bangladeshbdooption['twitterLink']?>"><li><i class="fab fa-twitter"></i></li></a>
							<a href="<?php echo $bangladeshbdooption['messengerkLink']?>"><li><i class="fab fa-facebook-messenger"></i></li></a>
							<a href="<?php echo $bangladeshbdooption['DonateLink']?>"><li><i class="fas fa-donate"></i></i></li></a>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="footerColum2">
					<div class="Colum2Title">
						<h2>Terms & Condition</h2>
					</div>
					<div class="menu">
					<?php wp_nav_menu( array(
						'theme_location' => 'footer_Colum_1'
					) )?>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="footerColum3">
					<div class="Colum3Title">
						<h2>Site Links</h2>
					</div>
					<div class="menu">
					<?php wp_nav_menu( array(
						'theme_location' => 'footer_Colum_2'
					) )?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footerBottomInfo">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<p>Made with love <span><i class="fas fa-heart"></i></span>by ww.ahashost.com</p>
			</div>
			<div class="col-md-6">
				<p><?php echo $bangladeshbdooption['footerCopyRight']?></p>
			</div>
		</div>
	</div>
</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
