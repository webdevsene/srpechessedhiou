<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>srpechessedhiou</title>
</head>
<body>
    <!-- <div class="container d-flex justify-content-center">
        <h1 style="margin-top: 50px; padding-bottom: 10px;"> Informations personnelles sur Pêcheur ! </h1>
    </div> -->

    
</body>
</html>

<?php

    session_start();

    $mysqli = new mysqli('localhost', 'root', '', 'srpechessedhiou') or die($mysqli_error($mysqli));

    $id = 0;
    $nom = "";
    $prenom = ""; 
    $raisonsociale = "";
    $profession = "";
    $adresse = "";
    $portattache = "";
    $departement = "";
    $region = "";
    $numcin = "";
    $numtel = "";
    $delivered = false;
    $deliveredat = date('Y-m-d'); # à priori o met la date de livraison permis à ujourd'hui
    

    $isupdateDisabled = true;
    $issaveDisabled= false;

    if (isset($_POST['save'])) {
        # code...
        
        // declarer une var datetimeNow
        # test var dump
        #var_dump($_POST);

        $nom = mysqli_real_escape_string($mysqli, $_POST['nom']);

        $prenom = mysqli_real_escape_string($mysqli, $_POST['prenom']);

        $raisonsociale = mysqli_real_escape_string($mysqli, $_POST['raisonsociale']);

        $profession = mysqli_real_escape_string($mysqli, $_POST['profession']);

        $adresse = mysqli_real_escape_string($mysqli, $_POST['adresse']);

        $portattache = mysqli_real_escape_string($mysqli, $_POST['portattache']);

        $departement = mysqli_real_escape_string($mysqli, $_POST['departement']);

        $region = mysqli_real_escape_string($mysqli, $_POST['region']);

        $numcin = mysqli_real_escape_string($mysqli, $_POST['numcin']);

        #$numcin = $_POST['numcin']; // on recupere seulement la saisie sans transformer la chaine
        $numtel = mysqli_real_escape_string($mysqli, $_POST['numtel']);

        $dateTimeNow = date('Y-m-d H:i:s'); #la date d'enrollement du pêcheur courant
        

        $mysqli->query("INSERT INTO `tbl_pecheur` (
            nom,
            prenom,
            raison_sociale,
            profession,
            adresse,
            port_attache,
            departement,
            region,
            num_cin,
            num_tel,
            delivered,
            delivered_at,
            created_at) VALUES ('$nom', '$prenom', '$raisonsociale', '$profession', '$adresse', '$portattache', '$departement', '$region', '$numcin', '$numtel', '$delivered', '$deliveredat', '$dateTimeNow')") or die($mysqli->error);

        $_SESSION['message'] = "Bravo :) Cette oppération a été effectuée avec succès !";
        $_SESSION['msg_type'] = "success";

        header('location: register.php');

    }

    /**
     * traitement du btn delete 
     */
    /** 
     * @Author: mayeva.co
     * @Date: 2021-03-16 18:06:17 
     * @Desc:  
     */
    if (isset($_GET['id'])) { 
        # code...
        $id = $_GET['id'];  #recupere l'id de l'element qui doit être supprimé

        // supprimer dabord les enregistrement liées à la table embarcation
        $mysqli->query("DELETE FROM `tbl_embarcation` WHERE tbl_embarcation.pecheur_id='$id'") or die($mysqli->error);

        $mysqli->query("DELETE FROM `tbl_pecheur` WHERE id='$id'") or die($mysqli->error) ;
        
        $_SESSION['message'] = "Ce pêcheur a été définitivement supprimé de la base !";
        $_SESSION['msg_type'] = "danger";
        
        header('location: touslespecheurs.php');
    }


    /** triatement du btn edit */   
    
    #if (isset($_GET['edit'])) {
    #    # code...
#
    #    $isupdateDisabled = false;
    #    $issaveDisabled= true;
#
    #    $id = $_GET['edit'];
    #    $update = true;
    #    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error);
    #    
    #    #if (count($result)==1) {
    #        # code...
    #        $row = $result->fetch_array();
    #        $name = $row['name'];
    #        $location = $row['location'];
    #    #}
    #}
    

    /**
     * if (isset($_POST['update'])) {
     * $id = $_POST['id'];
     *   $name = $_POST['name'];
     *   $location = $_POST['location'];
     *   
     *   $mysqli->query("UPDATE data SET name='$name', location='$location' WHERE id=$id") or die($mysqli->error);
     *   
     *   $_SESSION['message'] = 'Record has been updated!';
     *   $_SESSION['msg_type'] = 'warning';
     *   
     *   header('location: register.php');
     *  }
     * 
     * */
?>