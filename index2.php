<?php
include 'db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
</head>

<body>
<?php

// fetching candidate data from db
$result = $conn->query("SELECT * FROM candidate_information");

if ($result->num_rows > 0) {
?>    
    <table class="display" style="width:100%" id="example"><thead><tr><th>Candidate ID</th><th>Full name</th><th>Date of Birth</th><th>Age</th><th>Gender</th><th>Address</th><th>Contact number</th><th>E-mail</th><th colspan = '3'>Actions</th></tr></thead>
<?php
    // displaying data from db
    while ($row = $result->fetch_assoc()) {
        $candidate_phone = $row["phnum"];
        $candidate_email = $row["candidate_email"];
        echo "<tbody><tr><td>" . $row["candidate_id"] . "</td><td id = 'fname_td'>" . $row["candidate_fullname"] . "</td><td id = 'dob_td'>" . $row["candidate_dob"] . "</td><td id = 'age_td'>" . $row["candidate_age"] . "</td><td id = 'gender_td'>" . $row["candidate_gender"] . "</td><td id = 'address_td'>" . $row["candidate_address"] . "</td><td id = 'phnum_td'> <a href='tel:$candidate_phone' class='hyperlinked_phones'>$candidate_phone</a></td><td id = 'email_td'><a href='mailto:$candidate_email' class='hyperlinked_emails'>$candidate_email</a></td>";
?>
        <td><a href="candidate_delete.php?del=<?php echo $row["candidate_id"]; ?>"><button type="submit" class="btn btn-danger">Delete</button></td>
        <?php
        // different button styles based on whether candidate was already accepted or not
        if ($row["employee_id"]) {
            echo "<td><button type='submit' class='btn btn-warning' disabled>Cannot update</button></td>";
            echo "<td><button type='submit' class='btn btn-secondary' disabled>Accepted</button></td></tr>";
        } else {
        ?>
            <td><button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modal_update<?php echo $row["candidate_id"]; ?>">Update</button></td>
            <td><a href='emp_info.php?acc=<?php echo $row["candidate_id"]; ?>'><button type='submit' class='btn btn-success'>Accept</button></td>
            </tr>
            </tbody>
<?php

        }
    }
    echo "<tfoot>" . "<tr><th>" . "Candidate ID" . "</th><th>" . "Full name" . "</th><th>" . "Date of Birth" . "</th><th>" . "Age" . "</th><th>" . "Gender" . "</th><th>" . "Address" . "</th><th>" . "Contact number" . "</th><th>" . "E-mail" . "</th><th colspan = '3'>" . "Actions" . "</th></tr></tfoot>";

    echo "</table>";
}
?>
</body>

</html>