<?php
  include ('connect.php');
  include('menu.html');
  include('fonctions.php');
?>
  <center>
    <h2>Affectations</h2>
    <form action="resultatsaffect.php" method="post">
      <input type="hidden" name="id" value="1">
      <input type="submit" value="Afficher Volontaires Responsable">
    </form>
  </center>
  <center>
    <form action="resultatsaffect.php" method="post">
      <input type="hidden" name="id2" value="2">
      <input type="submit" value="Afficher Volontaires Affectés à une Buvette">
    </form>
  </center>
  <center>
    <form action="resultatsaffect.php" method="post">
      <input type="hidden" name="id3" value="3">
      <input type="submit" value="Afficher les Buvettes Ouvertes pour un Match">
    </form>
  </center>