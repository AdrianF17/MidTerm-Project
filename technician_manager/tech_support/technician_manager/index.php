<?php
// Connect to the tech_support database
require_once('../model/database.php');

// Retrieve all technicians from the database
$query = 'SELECT techID, firstName, lastName, email, phone, password
          FROM technicians
          ORDER BY lastName';

$statement = $db->prepare($query);
$statement->execute();

// Store all technician records in an array
$technicians = $statement->fetchAll(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>

<?php

include '../view/header.php';
?>

<main>
    <h2>Technician List</h2>

    <!-- Display the technician records in a table -->
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($technicians as $technician) : ?>
        <tr>
            <td><?php echo htmlspecialchars($technician['firstName']); ?></td>
            <td><?php echo htmlspecialchars($technician['lastName']); ?></td>
            <td><?php echo htmlspecialchars($technician['email']); ?></td>
            <td><?php echo htmlspecialchars($technician['phone']); ?></td>
            <td><?php echo htmlspecialchars($technician['password']); ?></td>

            <td>
                <!-- Send the technician ID to the controller for deletion -->
                <form action="technician_manager.php" method="post">
                    <input type="hidden" name="action" value="delete_technician">
                    <input type="hidden" name="tech_id"
                           value="<?php echo $technician['techID']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Link to the Add Technician page -->
    <p>
        <a href="add_technician/">Add Technician</a>
    </p>
</main>

<?php

include '../view/footer.php';
?>
