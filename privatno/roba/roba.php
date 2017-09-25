<?php
include_once '../../konfiguracija.php';provjeraLogin();?>
<?php
$uvjet = isset($_GET["uvjet"]) ? $_GET["uvjet"] : "";
$stranica=1;
if(isset($_GET["stranica"])){
	if ($_GET["stranica"]>0){
		$stranica=$_GET["stranica"];
	}
}
if(isset($_SESSION["logiran"]->rezultata_po_stranici)){
	$rezultataPoStranici = $_SESSION["logiran"]->rezultata_po_stranici;
}?>
<head> <?php
include_once '../../predlosci/head.php';
  ?>
	
</head>
<body bgcolor="E9967A">
	<?php
	include_once '../../predlosci/meni.php';
  ?>
	<div class="row" align="center">
<div class="large 12 columns">
				<div class="callout">
					<div class="row">
						<div class="small-4 large-6 columns">
							<form method="GET">
								<input type="text" placeholder="Unesite vrstu robe" name="uvjet" 
								value="<?php echo $uvjet; ?>"/>	
							</form>
						</div>
						<?php 
					$uvjetUpit="%" . $uvjet . "%";
							$izraz=$veza->prepare("select sifra,vrsta_robe,naziv,jedinica_mjere						
							from roba where vrsta_robe like :uvjet");
							$izraz->execute(array("uvjet"=>$uvjetUpit));
							$ukupnoRoba=$izraz->fetchColumn();
							$ukupnoStranica= ceil($ukupnoRoba/$rezultataPoStranici);
							if($stranica>$ukupnoStranica){
								$stranica=$ukupnoStranica;
							}					
					?>
						
						<div class="small-4 large-12 columns">
							<a href="unosRobe.php" class="success button expanded">Dodaj robu</a>
							
					
						
					<table>
						<thead>
							<tr>
								<th>Vrsta robe</th>
								<th>Naziv</th>
								<th>Jedinica mjere</th>
														
							</tr>
						</thead>
						<tbody>
							<?php 
							$izraz = $veza->prepare("select sifra,vrsta_robe,naziv,jedinica_mjere						
							from roba where 
							vrsta_robe like :uvjet
							group by sifra,vrsta_robe,naziv,jedinica_mjere 
							limit " . (($rezultataPoStranici*$stranica)-$rezultataPoStranici) . ", " . $rezultataPoStranici);
							$uvjet="%" . $uvjet . "%";
							$izraz->execute(array("uvjet"=>$uvjet));
							$rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
							foreach ($rezultati as $red) :
							?>
							<tr>
								<td><?php echo $red -> vrsta_robe; ?></td>
								<td><?php echo $red -> naziv; ?></td>
								<td><?php echo $red -> jedinica_mjere; ?></td>										
								<td><a href="promjenaRobe.php?sifra=<?php echo $red -> sifra;

								if (isset($_GET["uvjet"])) {
									echo "&uvjet=" . $_GET["uvjet"];
								}
								?>">Promjeni</a> 
								
								
								<a href="brisanjeRobe.php?sifra=<?php echo $red -> sifra;
									if (isset($_GET["uvjet"])) {
										echo "&uvjet=" . $_GET["uvjet"];
									}
								?>">Obriši</a>
								
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					</div>		
					</div>
					</div>
					</div>
			</div>
		</div>
		
		
		<?php include_once '../../skripte.php';?>
		<?php include_once '../../predlosci/paginator.php';  ?>
		
	</body>
</html>