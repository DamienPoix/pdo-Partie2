<?php

//affichage de la liste des patients
$patient = NEW patients();
$patientsList = $patient->getPatientsList();
//déclaration de la regex pour la date 
$regexDate = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}/';
//déclaration de la regex pour l'horaire
$regexHour = '/[\d]/';
//déclaration de form error
$formError = array();
// YYYY-MM-DD 20:00:00
if (isset($_POST['submit'])) {
    $appointment = NEW appointments();
    if (!empty($_POST['idPatients'])) {
        if (preg_match($regexHour, $_POST['idPatients'])) {
            $idPatients = htmlspecialchars($_POST['idPatients']);
        } else {
            $formError['idPatients'] = 'Merci de ne pas tenter de pirater le système';
        }
    } else {
        $formError['idPatients'] = 'Veuillez sélectionner un patient';
    }
    //vérification de la présence de hour si hour existe le/la placer dans une variable
    if (!empty($_POST['hour'])) {
        if (preg_match($regexHour, $_POST['hour'])) {
            $hour = htmlspecialchars($_POST['hour']);
        } else {
            $formError['hour'] = 'Merci de ne pas tenter de pirater le système';
        }
    } else {
        $formError['hour'] = 'Veuillez sélectionner une horaire correcte (heure)';
    }
    //faire la même chose avec minutes
    if (!empty($_POST['minutes'])) {
        if (preg_match($regexHour, $_POST['minutes'])) {
            $minutes = htmlspecialchars($_POST['minutes']);
        } else {
            $formError['minutes'] = 'Merci de ne pas tenter de pirater le système';
        }
    } else {
        $formError['minutes'] = 'Veuillez sélectionner une horaire correcte (minute)';
    }
    if (isset($hour) && isset($minutes)) {
        $timetable = $hour . ':' . $minutes . ':00';
    }
    if (!empty($_POST['date'])) {
        if (preg_match($regexDate, $_POST['date'])) {
            $date = htmlspecialchars($_POST['date']);
        } else {
            $formError['date'] = 'Veuillez indiquer une date au bon format';
        }
    } else {
        $formError['date'] = 'Veuillez indiquer une date ';
    }
    if (isset($timetable) && isset($date)) {
        $appointment->dateHour = $date . ' ' . $timetable;
        $appointment->idPatients = $idPatients  ;
    }
    $patientAppointement = $appointment->addAppointment();
}
