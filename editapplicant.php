<?php require_once 'dbConfig.php'; ?>
<?php require_once 'models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Applicant</title>
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
    <?php $applicant = getSoftwareEngineerByID($pdo, $_GET['ApplicantID']); ?>
    <form action="Handleforms.php" method="POST">
        <input type="hidden" name="ApplicantID" value="<?php echo $applicant['ApplicantID']; ?>">
        <p>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" value="<?php echo $applicant['FirstName']; ?>">
        </p>
        <p>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" value="<?php echo $applicant['LastName']; ?>">
        </p>
        <p>
            <label for="gender">Gender</label>
            <input type="text" name="gender" value="<?php echo $applicant['Gender']; ?>">
        </p>
        <p>
            <label for="homeAddress">Home Address</label>
            <input type="text" name="homeAddress" value="<?php echo $applicant['HomeAddress']; ?>">
        </p>
        <p>
            <label for="email">Email</label>
            <input type="text" name="email" value="<?php echo $applicant['Email']; ?>">
        </p>
        <p>
            <label for="collegeDegree">College Degree</label>
            <input type="text" name="collegeDegree" value="<?php echo $applicant['CollegeDegree']; ?>">
        </p>
        <p>
            <label for="skills">Skills</label>
            <textarea name="skills"><?php echo $applicant['Skills']; ?></textarea>
        </p>
        <p>
            <label for="experience">Experience</label>
            <textarea name="experience"><?php echo $applicant['Experience']; ?></textarea>
        </p>
        <p>
            <input type="submit" name="editSoftwareEngineerBtn">
        </p>
    </form>
</body>
</html>