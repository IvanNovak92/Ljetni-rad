<?php include_once '../../konfiguracija.php'; provjeraLogin(); 

$greska=array();

if(isset($_POST["broj_komore"])){
	if(trim($_POST["broj_komore"])===""){
		$greske["broj_komore"]="Obavezan unos broja komore";
	}
	
	if(count($greska)==0){
		$izraz=$veza->prepare("insert into komora (broj_komore,polje)
		 values (:broj_komore,:polje)");
		$unioRedova = $izraz->execute($_POST);
	}
}
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
	<head>
		<?php include_once '../../predlosci/head.php'; ?>
	</head>
	<body>
		<?php include_once '../../predlosci/meni.php'; ?>
		<div class="row" align="center">
			<div class="large-4 columns large-centered">
					<form method="POST">
						<fieldset class="fieldset">
							<legend>Unosni podaci</legend>
							
							<label id="broj_komore" for="broj_komore">Broj komore</label>
							<input <?php 
							if(isset($greske["broj_komore"])){
								echo " style=\"background-color: #f7e4e1\" ";
							}
							?> 
							name="broj_komore" id="broj_komore" 
							value="<?php echo isset($_POST["broj_komore"]) ? $_POST["broj_komore"] : "" ?>" type="number" />
							<br />
							<label for="polje">Polje</label>
							<input name="polje" id="polje" type="text" />
							<br />
			
							<input type="submit" class="button expanded" value="Dodaj"/>
							<br />
							<a href="index.php" class="alert button expanded">Prekini unos</a>
							<?php if(isset($unioRedova) && $unioRedova>0):?>
							<h1 id="unio" class="success button expanded">Uspjesno ste dodali robu</h1>														
							<?php endif;?>
						</fieldset>
					</form>	
			</div>
		</div>
		
		
			</body>
</html>