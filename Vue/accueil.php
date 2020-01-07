<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" media="all" title="CSS" href="../CSS/style.css" />
  <script type="text/javascript" src="../js/onglet.js"></script>
	<title>TabStats</title>
</head>
<body>
	 <div class="systeme_onglets">
        <div class="onglets">
            <span class="onglet_0 onglet" id="onglet_Tab1" onclick="change_onglet('Tab1');">Tab 1</span>
            <span class="onglet_0 onglet" id="onglet_Tab2" onclick="change_onglet('Tab2');">Tab 2</span>
            <span class="onglet_0 onglet" id="onglet_Tab3" onclick="change_onglet('Tab3');">Tab 3</span>
        </div>

        <div class="contenu_onglets">
            <div class="contenu_onglet" id="contenu_onglet_Tab1">
              
              <table>
              <tr>
              <td><th><p>Projets</p></th></td>
              <td><th><p>7 jours et moins</p></th></td>
              <td><th><p>de 7 à 14 jours</p></th></td>
              <td><th><p>de 15 à 21 jours</p></th></td>
              <td><th><p>de 22 à 28 jours</p></th></td>
              <td><th><p>de 29 à 90 jours</p></th></td>
              <td><th><p>de 91 à 180 jours</p></th></td>
              <td><th><p>plus de 180 jours</p></th></td>
              <td><th><p>Total</p></th></td>
              <td><th><p>Semaine S-1</p></th></td>
              <td><th><p>Evolution</p></th></td>
              </tr>

            <tr>
            
            <?php
            
            while ($donnees = $req->fetch())

            echo"<td>{$donnees['PROJETS']}</td>";
            ?>
            
            </tr>


              </table>

            </div>




            <div class="contenu_onglet" id="contenu_onglet_Tab2">
                <h1></h1>
            </div>
            <div class="contenu_onglet" id="contenu_onglet_Tab3">
                <h1></h1>
                
            </div>
        </div>
    </div>

</body>
</html>