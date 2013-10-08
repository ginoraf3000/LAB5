<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Upload</title>
</head>

<body>
    <h1> Formulaire d'envoi de fichier ! </h1>
    <form method="POST" action="upload.php" enctype="multipart/form-data">
        <input type="file" name="fichier">
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
        <input type="submit" name="envoyer" value="Envoyer le fichier">
    </form>
    <p>
    <?php
    //Les variables
    $Dossier = '/home/administrateur/upload/';
    $Fichier = basename($_FILES['fichier'][name]);
    $Extensions = array('.jpg','.jpeg','.txt','.doc','.docx');
    $EXten = strrchr($_FILES['fichier']['name'],'.');

    //Vérification de l'extension
    if(!in_array($EXten,$Extensions))
    {
        $erreur = 'Vous devez uploader un fichier de type jpg, jpeg, txt, doc ou docx';
    }

    //Vérifie s'il y a eu une erreur
    if(!isset($erreur))
    {
        //Formatage du nom de fichier
        $fichier = strtr($fichier,
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
        if(move_uploaded_file($_FILES['fichier']['tmp_name'], $Dossier . $Fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
        {
            echo 'Upload effectué avec succès !';
        }
        else //Sinon (la fonction renvoie FALSE).
        {
            echo 'Echec de l\'upload! ';
            echo "Pssssss : Ton fichier est-il plus grand que 2 Mo? Oui? Désoler, on ne peut l'accepter!";
        }
    }
    else
    {
        echo $erreur;
    }
    ?>
    </p>
</body>
</html>