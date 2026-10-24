
<?php
require_once('model/database.php');

// Retrieve all technicians
$query = 'SELECT techID, firstName, lastName, email, phone, password
          FROM technicians
          ORDER BY lastName';

$statement = $db->prepare($query);
$statement->execute();
$technicians = $statement->fetchAll(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>

<?php include 'view/header.php'; ?>

<main>
    <h2>Technician List</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
        </tr>

        <?php foreach ($technicians as $technician) : ?>
        <tr>
            <td>
                <?php echo htmlspecialchars(
                    $technician['firstName'] . ' ' .
                    $technician['lastName']
                ); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($technician['email']); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($technician['phone']); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($technician['password']); ?>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>

    <p>
    <a href="add_technician.php">Add Technician</a>
    </p>

</main>

<?php include 'view/footer.php'; ?>
