<?php require_once 'dbConfig.php'; ?>
<?php require_once 'models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Applicant</title>
    <style>
        body {
            font-family: "Arial";
        }
        input {
            font-size: 1.5em;
            height: 50px;
            width: 200px;
        }
        table, th, td {
            border:1px solid black;
        }
    </style>
</head>
<body>
    <h1>Are you sure you want to delete this applicant?</h1>
    <?php
    $applicantID = $_GET['ApplicantID']; // Retrieve applicantID from the URL
    $applicant = getSoftwareEngineerByID($pdo, $applicantID);

    if (is_array($applicant) && !empty($applicant)) {
        // Applicant data is retrieved successfully
        ?>
        <form action="Handleforms.php?applicantID=<?php echo $applicantID; ?>" method="POST">
            <div class="applicantContainer" style="border-style: solid; font-family: 'Arial';">
                <p>First Name: <?php echo $applicant['FirstName']; ?></p>
                <p>Last Name: <?php echo $applicant['LastName']; ?></p>
                <p>Gender: <?php echo $applicant['Gender']; ?></p>
                <p>Home Address: <?php echo $applicant['HomeAddress']; ?></p>
                <p>Email: <?php echo $applicant['Email']; ?></p>
                <p>College Degree: <?php echo $applicant['CollegeDegree']; ?></p>
                <p>Skills: <?php echo $applicant['Skills']; ?></p>
                <p>Experience: <?php echo $applicant['Experience']; ?></p>
                <input type="submit" name="deleteSoftwareEngineerBtn" value="Delete">
            </div>
        </form>
    <?php } else {
        // Handle case where applicant data is not found or invalid
        echo "Applicant not found.";
    }
    ?>
</body>
</html>