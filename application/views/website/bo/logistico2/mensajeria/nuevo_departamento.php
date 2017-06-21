<form id="form_ciudad" method="post" class="smart-form">
	<fieldset>
		<legend>Datos De Departamento</legend>
		<div class="row">
			<section class="col col-6">
				País<label class="select">
					<select id="pais" required name="pais">'
						<?foreach ($paises as $key){?>'
							<option value="<?=$key->Code?>"><?=$key->Name?></option>
						<?}?>
					</select>
				</label>
			</section>
			
			<section class="col col-6">
				<label class="input">Nombre de departamento
					<input required type="text" name="nombre" placeholder="Nombre de departamento">
				</label>
			</section>
			
		</div>
	</fieldset>
</form>
