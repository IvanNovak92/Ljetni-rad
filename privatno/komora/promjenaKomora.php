<?php include_once '../../konfiguracija.php'; provjeraLogin(); 

if(isset($_GET["sifra"])){
	$izraz=$veza->prepare("select * from komora where sifra=:sifra");
	$izraz->execute(array("sifra"=>$_GET["sifra"]));
	$komora = $izraz->fetch(PDO::FETCH_OBJ);
	if(isset($_GET["uvjet"])){
		$komora->uvjet =$_GET["uvjet"];
	}
}

if(isset($_POST["sifra"])){
	
	$uvjet="";
	if(isset($_POST["uvjet"])){
		$uvjet=$_POST["uvjet"];
		unset($_POST["uvjet"]);
	}
	$izraz=$veza->prepare("update komora set broj_komore=:broj_komore, 
							polje=:polje where sifra=:sifra");
	$izraz->execute($_POST);
	
	header("location: index.php?uvjet=" . $uvjet);
}
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
	<head>
		<?php include_once '../../predlosci/head.php'; ?>
	</head>
	<body>
		<?php include_once '../../predlosci/meni.php'; ?>
		<form method="POST">
		<div class="row">
			<div class="large-8 columns large-centered">
				<div class="row">
					<div class="large-6 columns">
							
								<fieldset class="fieldset">
									<legend>Unosni podaci</legend>
									
									<label id="broj_komore" for="broj_komore">Broj komore</label>
									<input 	name="broj_komore" id="broj_komore" value="<?php echo $komora->broj_komore; ?>" type="number" />
									
									<label id="polje" for="polje">polje</label>
									<input 	name="polje" id="polje" value="<?php echo $komora->polje; ?>" type="text" />
									
									
									
									
							
					
				<input type="submit" class="succes button expanded" value="Promjeni"/>
							<br />
							<input type="hidden" name="sifra" value="<?php echo $komora->sifra; ?>" />
							<?php if(isset($_GET["uvjet"])):?>
							<input type="hidden" name="uvjet" value="<?php echo $komora->uvjet; ?>" />
							
							<?php endif;?>
				
				<input name="odustani" type="submit" class="alert button expanded" value="Odustani"/>
			
			</div>
		</div>
		</form>	

		<?php	include_once '../../skripte.php'; ?>
		
	</body>
</html>