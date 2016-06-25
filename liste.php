<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Google -->
        <title>Bergamote - Liste</title>

        <link rel="icon" type="/image/jpg" href="images/favicon.jpg" />

        <!-- Bootstrap -->
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="/style.css" rel="stylesheet"> 

    </head>
    <body>
        <script language="javascript">
              var password;
              var pass1 = "canard";
              password = prompt('Mot de passe :', '');
              if (password != pass1) {
                  location.reload();
              }
          </script>
        <div class="container">

            <!-- TITLE -->

            <div class="row" id="section_title">
                <div class="col-xs-12 col-md-8 col-md-offset-2">
                    <h1 class="title_bergamote">Assurance vélo</h1>
                    <h2 class="title_light">Clients</h2>
                </div>
            </div>


            <div class="row" id="section_partenaire_liste">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Email</th>
                            <th>Prix</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
// Connexion à la base de données
                        try {
        $bdd = new PDO('mysql:host=assuretosrpierre.mysql.db;dbname=assuretosrpierre', 'assuretosrpierre', 'CanardWC69');
                        } catch (Exception $e) {
                            die('Erreur : ' . $e->getMessage());
                        }

// Récupération des 10 derniers messages
                        $reponse = $bdd->query('SELECT * FROM form_1 ORDER BY ID ASC');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
                        while ($donnees = $reponse->fetch()) {
                            ?>

                            <tr>
                                <th scope="row"><?php echo htmlspecialchars($donnees['id']) ?></th>
                                <td><?php echo htmlspecialchars($donnees['date']) ?></td>
                                <td><?php echo htmlspecialchars($donnees['email']) ?></td>
                                <td><?php echo htmlspecialchars($donnees['price']) ?></td>
                            </tr>
                            <?php
                        }

                        $reponse->closeCursor();
                        ?>
                    </tbody>
                </table>
            </div>
    </body>
</html>