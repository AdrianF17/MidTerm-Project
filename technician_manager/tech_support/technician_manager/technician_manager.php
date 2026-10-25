Here’s your technician_manager.php with clean comments added:
<?php
// Connect to the tech_support database
require_once('../model/database.php');

// Get the action submitted from the form
$action = filter_input(INPUT_POST, 'action');

// Delete the selected technician
if ($action == 'delete_technician') {
    $tech_id = filter_input(INPUT_POST, 'tech_id', FILTER_VALIDATE_INT);

    // Make sure the technician ID is valid
    if ($tech_id != false) {
        $query = 'DELETE FROM technicians
                  WHERE techID = :tech_id';

        $statement = $db->prepare($query);
        $statement->bindValue(':tech_id', $tech_id);
        $statement->execute();
        $statement->closeCursor();
    }

    // Return to the Technician List page
    header('Location: index.php');
    exit();
}

// Add a new technician
if ($action == 'add_technician') {

    // Get the technician data from the form
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    $password = filter_input(INPUT_POST, 'password');

    // Validate that all required fields were entered
    if (
        empty($first_name) ||
        empty($last_name) ||
        empty($email) ||
        empty($phone) ||
        empty($password)
    ) {
        $error = 'All fields are required.';
        include('../errors/error.php');
        exit();
    }

    // Insert the new technician into the database
    $query = 'INSERT INTO technicians
              (firstName, lastName, email, phone, password)
              VALUES
              (:first_name, :last_name, :email, :phone, :password)';

    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();

    // Return to the Technician List page
    header('Location: index.php');
    exit();
}
?>