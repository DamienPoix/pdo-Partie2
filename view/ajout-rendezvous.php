<?php
include '../model/modelPatient.php';
include '../model/modelAppointment.php';
include '../controllers/addAppointment.php';
?> 
<?php
include 'navbar.php';
//affichage du message de succès après validation si tous les champs sont remplis correctement
if (isset($_POST['submit']) && (count($formError) === 0)) {
    ?> 
    <p class="success font-weight-bold text-center text-success p-5">Les données ont été enregistrées</p>
<?php } else { ?>
    <div class="container-fluid">
        <div class="row">
            <div class="bgText offset-2 col-8 py-2 px-5 my-3">
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="">Patient : </label>
                        <select name="idPatients">
                            <option value="0" selected disabled>Sélectionner un patient</option>
                            <?php
                            //boucle permettant d'afficher la liste des patients
                            foreach ($patientsList as $patientDetail) {
                                ?>
                            <option value="<?= $patientDetail->id ?>" <?= (isset($idPatients) && $idPatients== $patientDetail->id  ? 'selected' : '')?>><?= $patientDetail->lastname . ' ' . $patientDetail->firstname ?></option>
                            <?php } ?>
                        </select>
                        <?php
                        //affichage du message d'erreur si erreur dans la saisie du patient
                        if (isset($formError['idPatients'])) {
                            ?>
                            <p class="text-danger"><?= $formError['idPatients']; ?></p>
                        <?php } ?>
                        <label for="date">Date : </label>
                        <input type="date" name="date" id="date" value="<?= isset($date) ? $date : '' ?>" required />
                        <?php
                        //affichage du message d'erreur si erreur dans la saisie de la date
                        if (isset($formError['date'])) {
                            ?>
                            <p class="text-danger"><?= $formError['date']; ?></p>
                        <?php } ?>
                        <label for="hour">Horaire : </label>
                        <select name="hour">
                            <option selected disabled>Heure</option>
                            <?php
                            //boucle permettant d'afficher les heures de rendez-vous de 8h à 18h
                            for ($hours = 8; $hours <= 18; $hours++) {
                                ?>
                            <option value="<?= $hours ?>" <?= (isset($hour) && $hour == $hours) ? 'selected' : '' ?> ><?= $hours ?></option>
                            <?php } ?>
                        </select>
                        <?php
                        //affichage du message d'erreur si erreur dans la saisie de l'heure de rdv (heure)
                        if (isset($formError['hour'])) {
                            ?>
                            <p class="text-danger"><?= $formError['hour']; ?></p>
                        <?php } ?>
                        <select name="minutes">
                            <option value="0" selected disabled>Minutes</option>
                            <option value="00" <?= (isset($minutes) && $minutes == 00) ? 'selected' : ''?>>00</option>
                            <option value="15" <?= (isset($minutes) && $minutes == 15) ? 'selected' : ''?>>15</option>
                            <option value="30" <?= (isset($minutes) && $minutes == 30) ? 'selected' : ''?>>30</option>
                            <option value="45" <?= (isset($minutes) && $minutes == 45) ? 'selected' : ''?>>45</option>
                        </select>
                        <?php
                        //affichage du message d'erreur si erreur dans la saisie de l'heure de rdv (minutes)
                        if (isset($formError['minutes'])) {
                            ?>
                            <p class="text-danger"><?= $formError['minutes']; ?></p>
                        <?php } ?>
                        <input type="submit" class="btn border-dark font-weight-bold my-3" name="submit" id="submit" value="Valider" />
                    </div>
                </form>
                <p class="text-danger font-weight-bold"><?= isset($formError['submit']) ? $formError['submit'] : '' ?></p>
            </div>
        </div>
    </div>
<?php } ?>
    </html>