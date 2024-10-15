<?php

require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertNewSoftwareEngineerBtn'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $gender = trim($_POST['gender']);
    $homeAddress = trim($_POST['homeAddress']);
    $email = trim($_POST['email']);
    $collegeDegree = trim($_POST['collegeDegree']);
    $skills = trim($_POST['skills']);
    $experience = trim($_POST['experience']);

    if (!empty($firstName) && !empty($lastName) && !empty($gender) && !empty($homeAddress) && !empty($email) && !empty($collegeDegree) && !empty($skills) && !empty($experience)) {
        $query = insertIntoSoftwareEngineerRegistration($pdo, $firstName, $lastName, $gender, $homeAddress, $email, $collegeDegree, $skills, $experience);

        if ($query) {
            header("Location: ../index.php");
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "Make sure that no fields are empty";
    }
}

if (isset($_POST['editSoftwareEngineerBtn'])) {
    $applicantID = $_POST['ApplicantID'];
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $gender = trim($_POST['gender']);
    $homeAddress = trim($_POST['homeAddress']);
    $email = trim($_POST['email']);
    $collegeDegree = trim($_POST['collegeDegree']);
    $skills = trim($_POST['skills']);
    $experience = trim($_POST['experience']);

    if (!empty($applicantID) && !empty($firstName) && !empty($lastName) && !empty($gender) && !empty($homeAddress) && !empty($email) && !empty($collegeDegree) && !empty($skills) && !empty($experience)) {
        $query = updateSoftwareEngineer($pdo, $applicantID, $firstName, $lastName, $gender, $homeAddress, $email, $collegeDegree, $skills, $experience);

        if ($query) {
            header("Location: index.php");
        } else {
            echo "Update failed";
        }
    } else {
        echo "Make sure that no fields are empty";
    }
}

if (isset($_POST['deleteSoftwareEngineerBtn'])) {
    $query = deleteSoftwareEngineer($pdo, $_GET['applicantID']);

    if ($query) {
        header("Location: ../index.php");
    } else {
        echo "Deletion failed";
    }
}