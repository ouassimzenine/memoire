<?php
$numequipe=$_GET['numEquipe'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use. fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width,intial-scale=1.0"/>
    <title>LabGed</title>
<body>
    <header>
        <img src="cropped-logo-labged.png" alt="Logo">
    <div class="search">
        <div class="icon"></div>
        <div class="input">
        <input type="text" placeholder="search..." id="mysearch">
        </div>
        <span class="clear" onclick="document.getElementById('mysearch').value = ''"></span>
    </div>     
        <script>
            const icon = document.querySelector('.icon');
            const search = document.querySelector('.search');
            icon.onclick = function(){
            search.classList.toggle('active')
            }
            const searchInput = document.getElementById('mysearch');
        searchInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                const query = searchInput.value;
                if (query.trim() !== '') {
                    const url = `https://scholar.google.com/scholar?q=${encodeURIComponent(query)}`;
                    window.open(url, '_blank');
                }
            }
        });
        </script>
        <a href="#" class="logo" > <span>L</span>ab<span>G</span>ed</a>
    <div class="menuToggle" onclick="toggleMenu();"></div>
    <ul class="navbar">
        <li><a href="#desc" onclick="toggleMenu();">Description</a></li>
        <li><a href="#pub" onclick="toggleMenu();">Publication</a></li>
        <li><a href="affequipe3.php?numEquipe=<?php echo $numequipe ?>" onclick="toggleMenu();">Équipes de recherche</a></li>
        <li><a href="afftheseq.php?numEquipe=<?php echo $numequipe?>" onclick="toggleMenu();">Projets de recherche</a></li>
        <li><a href="#" onclick="toggleMenu();">Accueil</a></li>
    </ul>  
   
</header>

<section class="banniere" id="banniere">
    <div class="contenu">
        <h2 class="logo"><span>L</span>ab<span>G</span>ed</h2>
        <p>Laboratoire de Gestion</p> 
        <p>Document électronique</p>
    </div>
</section>
<section class="menu3" id="menu3">
    <div class="row" id="desc">
        <div class="col50">
            <h2 class="titre-texte"><span>D</span>escription</h2>
            <p style="color: black;font-size: 30px;font-family: Arial Rounded MT Bold;text-align: left;">Une grande partie des travaux de recherche réalisés par les différentes équipes de LabGED répond beaucoup plus à une logique d'intégration et de réponse aux besoins socio-économiques dans le domaine du traitement de documents, quelle que soit leur nature, et travaillent en étroite collaboration avec des partenaires industriels et sociaux principalement basés sur des paradigmes d'intelligence artificielle (IA). Cela est doublement productif car de tels investissements dans des applications réelles, utilisant des technologies innovantes, notamment l'IA, ne peuvent qu'aboutir à un travail académique de qualité scientifique non seulement élevée mais également validé, permettant une production scientifique de qualité ainsi que des brevets et des résultats dans le domaine socio-économique.</p>
        </div>        
    </div>
    <div class="titre">
    <a href="#" class="btn1">Haut de la page </a>
 </div>




   
 
 






 <script type="text/javascript">
     window.addEventListener('scroll', function(){
         const header =document.querySelector('header');
         header.classList.toggle("sticky", window.scrollY > 0 );
     });

     function toggleMenu(){
         const tmenuToggle = document.querySelector('.menuToggle');
         const navbar = document.querySelector('.navbar');
         navbar.classList.toggle('active');
         menuToggle.classList.toggle('active');
     }
 </script>
</body>
</html>

