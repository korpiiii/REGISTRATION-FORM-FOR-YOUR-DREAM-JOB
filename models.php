<?php
require_once 'dbConfig.php';

function insertIntoSoftwareEngineerRegistration($pdo, $firstName, $lastName, $gender, $homeAddress, $email, $collegeDegree, $skills, $experience) {
    // Check if email already exists
    $existingApplicant = getSoftwareEngineerByEmail($pdo, $email);
    if ($existingApplicant) {
        return false; // Email already exists
    }

    // Insert new applicant
    $sql = "INSERT INTO softwareengineer_registration (FirstName, LastName, Gender, HomeAddress, Email, CollegeDegree, Skills, Experience) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$firstName, $lastName, $gender, $homeAddress, $email, $collegeDegree, $skills, $experience]);
    if ($executeQuery) {
        return true;
    } else {
        // Handle database errors
        return false;
    }
}

function getSoftwareEngineerByEmail($pdo, $email) {
    $sql = "SELECT * FROM softwareengineer_registration WHERE Email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    return $stmt->fetch();
}

function seeAllSoftwareEngineerRegistrations($pdo) {
    $sql = "SELECT * FROM softwareengineer_registration";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();
    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getSoftwareEngineerByID($pdo, $applicantID) {
    $sql = "SELECT * FROM softwareengineer_registration WHERE ApplicantID = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$applicantID])) {
        return $stmt->fetch();
    }
}

function updateSoftwareEngineer($pdo, $applicantID, $firstName, $lastName, $gender, $homeAddress, $email, $collegeDegree, $skills, $experience) {
    $sql = "UPDATE softwareengineer_registration SET FirstName = ?, LastName = ?, Gender = ?, HomeAddress = ?, Email = ?, CollegeDegree = ?, Skills = ?, Experience = ? WHERE ApplicantID = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$firstName, $lastName, $gender, $homeAddress, $email, $collegeDegree, $skills, $experience, $applicantID]);
    if ($executeQuery) {
        return true;
    }
}

function deleteSoftwareEngineer($pdo, $applicantID) {
    $sql = "DELETE FROM softwareengineer_registration WHERE ApplicantID = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$applicantID]);
    if ($executeQuery) {
        return true;
    }
}

