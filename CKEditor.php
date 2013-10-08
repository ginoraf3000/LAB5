<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>CKEditor</title>
    <script type="text/javascript" src="fancyBox/lib/jquery-1.10.1.min.js"></script>
    <link rel="stylesheet" href="fancyBox/source/jquery.fancybox.css" type="text/css" media="screen"/>
    <script type="text/javascript" src="fancyBox/source/jquery.fancybox.pack.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {


            $("#fancybox-manual-c").click(function () {
                $.fancybox.open([
                    {
                        href: 'big.jpg',
                        title: 'Singapore from the air (Andrew Tan 2011)'
                    },
                ], {
                    helpers: {
                        thumbs: {
                            width: 75,
                            height: 50
                        }
                    }
                });
            });


        });
    </script>
</head>

<body>
<script src="ckeditor/ckeditor.js"></script>
<form method="POST" action="CKEditor.php">
    <?php
    $base = mysql_connect('127.0.0.1', 'root', 'admin123') or die("Impossible de se connecter : " . mysql_error());
    mysql_select_db('Lab5', $base) or die("Impossible de se sélectionner la base de données : " . mysql_error());

    if (isset($_REQUEST['envoyer'])) {
        $sql = 'UPDATE Page SET idPage=1,contenue="' . $_REQUEST['maj'] . '" WHERE idPage=1';
        mysql_query($sql) or die("Impossible de mettre à jour : " . mysql_error());

    }


    $sql = "SELECT contenue FROM Page Where idPage = 1";
    $reponse = mysql_query($sql);
    $ligne = mysql_fetch_array($reponse);


    ?>

    <textarea class="ckeditor" name="maj"><?php echo $ligne['contenue']; ?></textarea>
    <input type="submit" name="envoyer" value="Mettre à jour le site !">
</form>
<br><br>

<a id="fancybox-manual-c" title="Singapore from the air (Andrew Tan 2011)">
    <img src="small.jpg" alt=""/>
</a>


</body>
</html>