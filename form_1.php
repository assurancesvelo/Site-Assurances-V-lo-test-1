<?php

if (is_ajax()) {
    if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
        $action = $_POST["action"];

        switch ($action) { //Switch case for value of action
            case "new_custommer": saveToDatabase();
                break;
        }
    }
}

$return = $_POST;

//Function to check if the request is an AJAX request
function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function saveToDatabase() {

    try {
        $bdd = new PDO('mysql:host=assuretosrpierre.mysql.db;dbname=assuretosrpierre', 'assuretosrpierre', 'CanardWC69');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
        echo $e;
    }

    $a = $_POST;


    if (!isset($a['email_client'])) {
        $a['email_client'] = "";
    }
    if (!isset($a['prix_velo'])) {
        $a['prix_velo'] = "";
    }


// Insertion du partenaire à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO form_1(email, price) VALUES(:email, :price)');
    $req->execute(array(
        'email' => $a['email_client'],
        'price' => $a['prix_velo']
    ));

    $return["json"] = json_encode($return);
    echo json_encode($return);
}
