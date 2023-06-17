<?php
include 'conn.php';

// Afficher les équipes
$sql = "SELECT * FROM equipe";
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html>
<head>
<a href="acceuil2.php"  style="margin-block-end: auto;    display: inline-block;
    padding: 10px 20pxpx;
    background: #fff;
    border-radius: 4px;
    text-decoration: none;
    color: #000;
    font-weight: 500px;
    margin-top: 20px;
    box-shadow: 0 2px 5px rgba(0,0,0,.2);
  margin-left: 9px;
  font-size: 40px;
    
    text-decoration: none;
    color: #000;" > <span style="color: #077BFF;font-size: 1.5em;font-weight: 700px;" >L</span>ab<span style="color: #077BFF;
    font-size: 1.5em;
    font-weight: 700px;">G</span>ed</a>
	<title>Research Teams</title>
	<link rel="stylesheet" type="text/css" href="aff.css"> 
	<link rel="stylesheet" href="btn1.css">
</head>
<header>
	<div class="bouton_4">
                <a href="ajoutequipe.php" ><img src="pngwing.com (3).png"/>
                    <span class="texteduboutton_4">Ajouter Équipe</span></a>
	</div>
	<div class="bouton_4">
                <a href="ajouter.php" ><img src="pngwing.com (3).png"/>
                    <span class="texteduboutton_4">Ajouter Chercheur </span></a>
	</div>
</header>
<body>


	<div class="container">
        
		<?php while($row = mysqli_fetch_assoc($result)) { ?>
			<div class="box">
				<div class="icon"><?php echo $row['numero']; ?></div>
				<div class="content">
          <a href="affihchage.php?numEquipe=<?php echo $row['numero']; ?>">Plus</a>
          <h3>Nom de l'équipe: <?php echo $row["acronyme_DEquipe"]; ?></h3>
					<p>Responsable: <?php echo $row["chef_DEquipe"]; ?></p>
					<a href='editeqp.php?numero=<?php echo $row["numero"]; ?>'>Éditer</a>
					<a href='sup.php?numero=<?php echo $row["numero"]; ?>'>Supprimer</a>
				</div>
			</div>
		<?php } ?>
	</div>
    <script> const boxes = document.querySelectorAll('.container .box .icon');

boxes.forEach((box, index) => {
  const color = getColorForIndex(index);
  box.style.boxShadow = `0 0 0 0 ${color}`;
  box.style.background = color;

  box.parentNode.addEventListener('mouseover', () => {
    box.style.boxShadow = `0 0 0 400px ${color}`;
  });

  box.parentNode.addEventListener('mouseout', () => {
    box.style.boxShadow = `0 0 0 0 ${color}`;
  });
});

function getColorForIndex(index) {
  const colors = ['#077BFF', '#2196f3', '#4CAF50', '#FF9800', '#F44336', '#9C27B0'];
  return colors[index % colors.length];
}
</script> 
</body>
</html>
