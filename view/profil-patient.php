<?php
include '../controllers/profilPatientCtl.php';
include 'navbar.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/profil.css" />
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="other m-1">
                    <h2 class="text-center ">Profil du patient</h2>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="https://icon-icons.com/icons2/154/PNG/512/user_edit_21973.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Patient n°<?= $profilPatient->id ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?= $profilPatient->lastname ?></li>
                            <li class="list-group-item"><?= $profilPatient->firstname ?></li>
                            <li class="list-group-item"><?= $profilPatient->birthdate ?></li>
                            <li class="list-group-item"><?= $profilPatient->mail ?></li>
                            <li class="list-group-item"><?= $profilPatient->phone ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#exampleModal">
            Modifier le profil patient
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Profil Patient n°<?=$profilPatient->id?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <form action="profil-patient.php?id=<?= $patient->id ?>" method="post">
                                <div class="form-group">
                                    <label for="lastname">Nom : </label><input type="text"  class="form-control" value="<?= $profilPatient->lastname?>" id="lastname" name="lastname"/>
                                    <label for="firstname">Prénom : </label><input type="text" class="form-control" value="<?= $profilPatient->firstname?>" id="firstname" name="firstname"/>
                                    <label for="birthdate">Date de naissance : </label><input type="date" class="form-control" value="<?= $profilPatient->birthdate?>" id="birthdate" name="birthdate"/>
                                    <label for="mail">mail : </label><input type="text" class="form-control" value="<?= $profilPatient->mail?>" id="mail" name="mail"/>
                                    <label for="phone">phone : </label><input type="text" class="form-control" value="<?= $profilPatient->phone?>" id="phone" name="phone"/>
                                    <button type="submit" class="btn btn-primary" name="submit">Sauvegarder les modifications</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').trigger('focus')
            })
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>