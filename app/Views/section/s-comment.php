<form method="post">
	<label for="pseudoCom">Veuillez renseigner votre</label>
	<input type="text" name="pseudoCom" class="pseudoCom" placeholder="Pseudo" />
	<label for="comment">et votre</label>
	<textarea name="comment" class="comment"placeholder="avis"></textarea>
	<input type="hidden" class="idProposition" value="<?=$id?>" />
	<button class="button btnComment" type="submit" data-idproposition="<?=$id?>">Envoyer</button>
</form>
<div id="listComment<?=$id?>" class="listeComment">

</div>
