<?php
include 'connection.php';
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "hello";
    while ($row = $result->fetch_assoc()) {
        echo "hello";
?> 
        <tr>
            <td><?= $row['name']; ?></td>
            <td><?= $row['email']; ?></td>
            <!--<td><button type="button" class="btn btn-success btn-sm update" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#update_country" data-id="<?= $row['id']; ?>" data-name="<?= $row['name']; ?>" data-email="<?= $row['email']; ?>" data-phone="<?= $row['phone']; ?>" data-city="<?= $row['city']; ?>" ">Edit</button></td>
    -->
        </tr>
<?php
    }
} else {
    echo "<tr >
		<td colspan='5'>No Result found !</td>
		</tr>";
}
mysqli_close($conn);
?>