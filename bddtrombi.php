

<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=basesimplon;charset=utf8', 'root', 'tusauraspas');
}
catch (Exception $e)
{
        die('Erreur : ' .$e->getMessage());
}



$reponse = $bdd->query('SELECT * FROM tablesimplon');

 //On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
echo $donnees['nom'];
 }
   

$req = $bdd->prepare('INSERT INTO tablesimplon(nom, prenom, lien_cv, adresse_mail, numero_tel, lien_photo, date_naissance)
 VALUES(:nom, :prenom, :lien_cv, :adresse_mail, :numero_tel, :lien_photo, :date_naissance)');
$req->execute(array(
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'lien_cv' => $_POST['lien_cv'],
    'adresse_mail' => $_POST['adresse_mail'],
    'numero_tel' => $_POST['numero_tel'],
    'lien_photo' => $_POST['lien_photo'],
    'date_naissance' => $_POST['date_naissance']));

echo 'Vos données ont été ajoutées';


?>