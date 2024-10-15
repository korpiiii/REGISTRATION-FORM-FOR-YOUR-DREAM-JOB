<?php require_once 'dbConfig.php'; ?>
<?php require_once 'models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <h3>Welcome to the Software Engineer Registration System. Input your details here to register</h3>
    <form action="Handleforms.php" method="POST">
        <p><label for="firstName">First Name</label> <input type="text" name="firstName"></p>
        <p><label for="lastName">Last Name</label> <input type="text" name="lastName"></p>
        <p><label for="gender">Gender</label> <input type="text" name="gender"></p>
        <p><label for="homeAddress">Home Address</label> <input type="text" name="homeAddress"></p>
        <p><label for="email">Email</label> <input type="text" name="email"></p>
        <p><label for="collegeDegree">College Degree</label> <input type="text" name="collegeDegree"></p>
        <p><label for="skills">Skills</label> <textarea name="skills"></textarea></p>
        <p><label for="experience">Experience</label> <textarea name="experience"></textarea></p>
        <p><input type="submit" name="insertNewSoftwareEngineerBtn"></p>
    </form>

    <table style="width:50%; margin-top: 50px;">
        <tr>
            <th>Applicant ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Home Address</th>
            <th>Email</th>
            <th>College Degree</th>
            <th>Skills</th>
            <th>Experience</th>
            <th>Date Added</th>
            <th>Action</th>
        </tr>

        <?php $seeAllSoftwareEngineerRegistrations = seeAllSoftwareEngineerRegistrations($pdo); ?>
        <?php foreach ($seeAllSoftwareEngineerRegistrations as $row) { ?>
        <tr>
            <td><?php echo $row['ApplicantID']; ?></td>
            <td><?php echo $row['FirstName']; ?></td>
            <td><?php echo $row['LastName']; ?></td>
            <td><?php echo $row['Gender']; ?></td>
            <td><?php echo $row['HomeAddress']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['CollegeDegree']; ?></td>
            <td><?php echo $row['Skills']; ?></td>
            <td><?php echo $row['Experience']; ?></td>
            <td><?php echo $row['DateAdded']; ?></td>
            <td>
                <a href="editapplicant.php?ApplicantID=<?php echo $row['ApplicantID'];?>">Edit</a>
                <a href="deleteapplicant.php?ApplicantID=<?php echo $row['ApplicantID'];?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>