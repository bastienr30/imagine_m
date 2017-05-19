	</main>
	<footer>
		<!--
			- Adresse
	        - Téléphone
	        - Nous contacter
	        - Copyright / confidentialité / conditions
	        - Réseaux sociaux ?
	        
	        http://jsfiddle.net/x404/K5enj/
	        http://stackoverflow.com/questions/16837877/detect-scroll-down-inside-body
	        https://codepen.io/Yanestsang/pen/Lpapgb
	        https://jsfiddle.net/yurzui/zdLbx7ss/
	        http://jsfiddle.net/i_heart_php/wbdowtak/
		-->
		
		<!--insérer page contact -->
		<div class="section-footer">
			<div class="popUp">
				<div id="buttonContact" class="button buttonPop contact">Nous contacter</div>
			
				<div class="formBlock" id="blockContact">

					<form id="contactForms" method="post">
						<?= $this->insert("section/s-form-contact"); ?>
				</div>
			</div>
		</div>
		<div class="section-footer middle">
			&copy; Copyright Imagine Marseille 2016 & <a href="">Mentions Légales</a>
		</div>
		
		<div class="section-footer">
			<a href=""><img src="<?= $this->assetUrl('img/facebook-btn.png') ?>"/></a><!--
			--><a href=""><img src="<?= $this->assetUrl('img/twitter-btn.png') ?>"/></a><!--
			
			--><a href=""><img src="<?= $this->assetUrl('img/instagram-btn.png') ?>"/></a><!--
			--><a href=""><img src="<?= $this->assetUrl('img/google-btn.png') ?>"/></a>
		</div>
		
	</footer>
	
	<script>
		var cheminBackgrounds = "<?= $this->assetUrl('img/') ?>";
	</script>
	
	<script src="<?= $this->assetUrl('js/menu.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/forms.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/pagination.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/annonces.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/vote.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/voteAffichage.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/background.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/comment.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/jquery.sliderPro.min.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/slider.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/signalement.js') ?>"></script>


</body>
</html>