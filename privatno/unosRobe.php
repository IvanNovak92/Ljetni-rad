<?php include_once '../konfiguracija.php'; provjeraLogin(); 

$greska=array();

if(isset($_POST["vrsta_robe"])){
	if(trim($_POST["vrsta_robe"])===""){
		$greske["vrsta_robe"]="Obavezan unos vrste robe";
	}
	
	if(count($greska)==0){
		$izraz=$veza->prepare("insert into roba (vrsta_robe,datum_berbe,datum_skladistenja,vrsta_boxa,komad_boxa,tezina) values (:vrsta_robe,:datum_berbe,:datum_skladistenja,:vrsta_boxa,:komad_boxa,:tezina)");
		$unioRedova = $izraz->execute($_POST);
	}
}
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
	<head>
		<?php include_once '../predlosci/head.php'; ?>
	</head>
	<body>
		<?php include_once '../predlosci/meni.php'; ?>
		<div class="row" align="center">
			<div class="large-4 columns large-centered">
					<form method="POST">
						<fieldset class="fieldset">
							<legend>Unosni podaci</legend>
							
							<label id="lvrsta_robe" for="vrsta_robe">Vrsta Robe</label>
							<input <?php 
							if(isset($greske["vrsta_robe"])){
								echo " style=\"background-color: #f7e4e1\" ";
							}
							?> 
							name="vrsta_robe" id="vrsta_robe" value="<?php echo isset($_POST["vrsta_robe"]) ? $_POST["vrsta_robe"] : "" ?>" type="text" />
							<br />
							<label for="datum_berbe">Datum berbe</label>
							<input name="datum_berbe" id="datum_berbe" type="date" />
							<br />
							
							<label for="datum_skladistenja">Datum skladistenja</label>
							<input name="datum_skladistenja" id="datum_skladistenja" type="date" />
							<br />
							<label for="vrsta_boxa">Vrsta boxa</label>
							<input name="vrsta_boxa" id="vrsta_boxa" type="text" />
							<br />
							<label for="komad_boxa">Komada boxa</label>
							<input name="komad_boxa" id="komad_boxa" type="number" min="1" max="5" />
							<br />
							<label for="tezina">Težina</label>
							<input name="tezina" id="tezina" type="number" min="1" max="2000" />
							<br />
							<input type="submit" class="button expanded" value="Dodaj"/>
							<br />
							<a href="roba.php" class="alert button expanded">Prekini unos</a>
							<?php if(isset($unioRedova) && $unioRedova>0):?>
							<h1 id="unio" class="success button expanded">Uspjesno ste dodali robu</h1>														
							<?php endif;?>
						</fieldset>
					</form>	
			</div>
		</div>
		
		
			</body>
</html>