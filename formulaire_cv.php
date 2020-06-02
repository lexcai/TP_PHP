<?php
include_once('bdd.php');
session_start();

$uploaddir = "/".$_SESSION['email']."/";
if (isset($_POST['fileName']) and isset($_FILES['file']))
{
    $folder = ($_SESSION['email']);
    
    if (!file_exists($folder)) 
    {
        mkdir($folder);
    }

    $infofichier = pathinfo($_FILES['file']['name']);
    $extension = $infofichier['extension'];
    $name = basename($_FILES['file']['name']);
    $filename = $_POST['fileName'].'.'.$extension;
    $filename = str_replace(' ', '_', $filename);
    $filepath = $folder.'/'.$filename;

    if (! file_exists($folder . '/' . $filename)) {
        move_uploaded_file($_FILES["file"]["tmp_name"], "$folder/$filename");
        $query1 = $pdo->prepare("UPDATE candidats SET cv = :cv");
        $query1->bindParam(':cv', $filepath);
        $query1->execute();
        $query2 = $pdo->prepare('UPDATE candidats SET nom_cv = :nom_cv');
        $query2->bindParam(':nom_cv', $filename);
        $query2->execute();
        $_SESSION['fichier'] = TRUE;
       
        header('Location: http://localhost:8080/TP/index.php');
        exit;
    } else {
    header('Location: http://localhost:8080/TP/index.php');
    exit;
    }
}