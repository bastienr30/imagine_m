
	<span class="first active-span">
		<label for="pseudo">Veuillez renseigner votre</label>
		<input type="text" name="pseudo" placeholder="Pseudo" />
		<label for="email">et votre</label>
		<input type="email" name="email" placeholder="email" />
	</span>
	<span>
		<label for="photo">Veuillez renseigner
		<input type="file" name="photo" value="fileUpload"/>
		<input type="url" name="url" placeholder="l'adresse du site" />
		<input type="text" name="adresse" placeholder="l'adresse postale" />
        <input type="text" name="titreAnnonce" placeholder="un titre d'annonce" />
	</span>
	<span class="last">
		<label for="description">Veuillez renseigner une</label>
		<textarea name="description" placeholder="description d'annonce"></textarea>
		<label for="categorie">Et sa catégorie :
		<select name="categorie">
			<option value="Loisir">Loisir</option>
			<option value="Commerce">Commerce</option>
			<option value="Sport">Sport</option>
			<option value="Autre">Autre</option>
		</select>
	</span>

    <input type="hidden" name="idForm" value="proposition" />
	<button class="formsPrev">Précédent</button><button class="formsNext">Suivant</button><button class="formsSubmit" type="submit">Envoyer</button>
