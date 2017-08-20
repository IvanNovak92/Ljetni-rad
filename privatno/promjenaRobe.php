<?php include_once '../konfiguracija.php'; provjeraLogin(); 


if(isset($_GET["sifra"])){
	$izraz=$veza->prepare("select * from roba where sifra=:sifra");
	$izraz->execute(array("sifra"=>$_GET["sifra"]));
	$roba = $izraz->fetch(PDO::FETCH_OBJ);
	if(isset($_GET["uvjet"])){
		$roba->uvjet =$_GET["uvjet"];
	}
}

if(isset($_POST["sifra"])){
	
	$uvjet="";
	if(isset($_POST["uvjet"])){
		$uvjet=$_POST["uvjet"];
		unset($_POST["uvjet"]);
	}
	$izraz=$veza->prepare("update roba set vrsta robe=:vrsta_robe, 
							datum berbe=:datum_berbe, datum skladistenja=:datum_skladistenja, vrsta boxa=:vrsta_boxa,
							komad boxa=:komad_boxa, tezina=:tezina  where sifra=:sifra");
	$izraz->execute($_POST);
	
	header("location: roba.php?uvjet=" . $uvjet);
}
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
	<head>
		<?php include_once '../predlosci/head.php'; ?>
	</head>
	<body bgcolor="E9967A">
		<?php include_once '../predlosci/meni.php'; ?>
		<div class="row">
			<div class="large-4 columns large-centered">
					<form method="POST">
						<fieldset class="fieldset">
							<legend>Obavite izmjenu na polju kojem želite</legend>
							
							<label id="lvrsta_robe" for="vrsta_robe">Vrsta robe</label>
							<input 	name="vrsta_robe" id="vrsta_robe" value="<?php echo $roba->vrsta_robe; ?>" type="text" />
							<br />
							
							<label for="datum_berbe">Datum berbe</label>
							<input name="datum_berbe" id="datum_berbe" type="date" value="<?php echo $roba->datum_berbe; ?>"/>
							<br />
							<label for="datum_skladistenja">Datum skladistenja</label>
							<input name="datum_skladistenja" id="datum_skladistenja" type="date" value="<?php echo $roba->datum_skladistenja; ?>"/>
							<br />
							<label for="vrsta_boxa">Vrsta boxa</label>
							<input name="vrsta_boxa" id="vrsta_boxa" type="text" value="<?php echo $roba->vrsta_boxa; ?>" />
							<br />
							<label for="komad_boxa">Komada boxa</label>
							<input name="komad_boxa" id="komad_boxa" type="number"min="1" max="5" value="<?php echo $roba->komad_boxa; ?>" />
							<br />
							<label for="tezina">Težina</label>
							<input 	name="tezina" id="tezina" type="number" max="2000" value="<?php echo $roba->tezina; ?>/>
							<br />
							<input type="submit" class="succes button expanded" value="Promjeni"/>
							<br />
							<input type="hidden" name="sifra" value="<?php echo $roba->sifra; ?>" />
							<?php if(isset($_GET["uvjet"])):?>
							<input type="hidden" name="uvjet" value="<?php echo $roba->uvjet; ?>" />
							<?php endif;?>
							<a href="roba.php" class="alert button expanded">Odustani</a>
						</fieldset>
					</form>	
			</div>
		</div>
		
		<?php	include_once '../skripte.php'; ?>
		
	</body>
</html>