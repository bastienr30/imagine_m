<!--
	- ça bouge à marseille 
	- 
-->

<nav class="pageNav">
	<ul>
		<li class="pageFirst li-selected"></li>
		<li class="pageLast"></li>
	</ul>
</nav>

<section class="page current" id="s-carousel">
	
		<div class="slider-pro" id="my-slider">
		    <div class="sp-slides">
		        <!-- Slide 1 -->
		        <div class="sp-slide">
		            <img class="sp-image" src="<?= $this->assetUrl('img/commerce-croissant.jpg')?>"/>
		            
			        <p class="sp-caption" 
						data-position="bottomCenter" data-vertical="50"
						data-show-transition="right" data-hide-transition="left" data-show-delay="750" >
						Commerce
					</p>	
		        </div>
		
		        <!-- Slide 2 -->
		        <div class="sp-slide">
		            <img class="sp-image" src="<?= $this->assetUrl('img/sport-surf.jpg') ?>"/>
					<p class="sp-caption" 
						data-position="bottomCenter" data-vertical="50"
						data-show-transition="right" data-hide-transition="left" data-show-delay="750" >
						Sport
					</p>		            
		        </div>
		
		        <!-- Slide 3 -->
		        <div class="sp-slide">
		            <img class="sp-image" src="<?= $this->assetUrl('img/loisir-cabane.jpg') ?>"/>
		            <p class="sp-caption" 
						data-position="bottomCenter" data-vertical="50" 
						data-show-transition="right" data-hide-transition="left" data-show-delay="750" >
						Loisir
					</p>
		        </div>
		        
		         <!-- Slide 4 -->
		        <div class="sp-slide">
		            <img class="sp-image" src="<?= $this->assetUrl('img/autre-bateau.jpg') ?>"/>
		            <p class="sp-caption" 
						data-position="bottomCenter" data-vertical="50" 
						data-show-transition="right" data-hide-transition="left" data-show-delay="750" >
						Autre
					</p>
		        </div>
		    </div>
		</div>
	</section>
	
<section class="page" id="s-index">
		
	<div class="paragraphes">
		<h2>Imagine Marseille, c'est quoi ?</h2>
		
		<p>
			Si vous êtes à la recherche de concepts innovants, vous avez frappé à la bonne porte. 
			Imagine Marseille met à l'honneur vos annonces pour un mois. Qu'ils soient nouveaux, qu'ils soient en phase de projets on vous en parle !
		</p>
		
		<p>
			C'est vous qui les choisissez, par simple vote ou en les proposant vous mêmes, que vous soyez à l'origine du projet ou simplement amateur du café du coin, 
			il n'y a pas de restriction si ce n'est d'avoir un site internet ou une adresse. 

		</p>
		
		<a href="<?php echo $this->url("route_projetsValides"); ?>" class="button">Vos annonces</a>
	</div><!--
	
	--><div class="paragraphes">
		<h2>Comment ça marche ?</h2>
		<p>
			Il suffit de remplir le formulaire d'annonce (un titre, une description, l'adresse du site et autres informations qui nous serons utiles). Il est possible, que votre annonce
			se retrouve dans la liste d'attente. Pas de panique, elle apparaîtra quoi qu'il arrive puisqu'il y a un roulement tous les quinze jours. Par ailleurs, quand les annonces apparaissent, 
			elles sont soumises aux votes des internautes. <br><br>
			C'est là que le jeu commence : Il faut 200 votes positifs et moins de 50 votes négatifs. Une fois le quota atteint, 
			lorsque le roulement à lieu, votre annonce sera mise en valeur et devient l'une de nos chouchous. <br><br>
			Qu'est-ce que ça change ? <br>
			Description détaillée, ajoût des horaires et d'une carte pour bénéficier de toutes les informations pour satisfaire votre curiosité. Tout ça pour une durée d'un mois entier.

			<br/><br/>
			Alors, convaincu ?
			
		</p>
		
		<div class="popUp">
			<div id="buttonProposition" class="button buttonPop proposition">Proposer une annonce</div>
		
			<div class="formBlock" id="blockProposition">

				<form id="propositionForms" method="post" enctype="multipart/form-data">
					<?php $this->insert("section/s-form-proposition"); ?>
				</form>
				<div class="button buttonPop proposition fermer">fermer</div>

			</div>
		</div>
			
	</div>

</section>