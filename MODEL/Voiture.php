<?php
require_once("ConnexionMySql.inc.php");
$question = 1;
if(isset($_POST['question'])){
    $question = $_POST['question'];
}

  if($question==1)
  {
                    ## Récupérer des enregistrements
              $requette= "SELECT * FROM voiture"; 
              $resultat = mysqli_query($conn, $requette);
              $data = array();
              
              while ($row = mysqli_fetch_assoc($resultat)) {
                      // Update Button
                      $updateButton = "<button class='btn btn-sm btn-primary updateUser' data-id='".$row['immatriculation']."' data-bs-toggle='modal' data-bs-target='#viewModal' >Update</button>";

                      // Delete Button
                      $deleteButton = "<button class='btn btn-sm btn-danger deleteUser' data-id='".$row['immatriculation']."'>Delete</button>";
                      // View Button
                        $viewButton = "<button class='btn btn-sm btn-success viewUser' data-id='".$row['immatriculation']."' data-bs-toggle='modal' data-bs-target='#viewModal' >View</button>";
              
                      
                      $action = $updateButton." ".$deleteButton." ".$viewButton;
                      $data[] = array(

                        "immatriculation" => $row['immatriculation'],
                        "marque" => $row['marque'],
                        "Modele" => $row['Modele'],
                        "Cylindree" => $row['Cylindree'],
                        "dateachat" => $row['dateachat'],
                        "action" => $action
                    );
              
              }

            ## Response
            $response =array(
                "echo" => 1,
                "totalrecords" => count($data),
                "totaldisplayrecords" => count($data),
                "data" => $data
            );

            echo json_encode($response);
            exit;
  }
 
if ($question==2) {
        $id ='';

        if(isset($_POST['id'])){
            $id = mysqli_escape_string($conn,$_POST['id']);
        }

        // verifier id
        $record = mysqli_query($conn,"SELECT * FROM voiture WHERE immatriculation LIKE '".$id."'");
        if(mysqli_num_rows($record) > 0){

            mysqli_query($conn,"DELETE FROM voiture WHERE immatriculation LIKE '".$id."'");

            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
  
}






?>