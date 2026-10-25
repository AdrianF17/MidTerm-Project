<?php

include '../../view/header.php';
?>

<main>
    <h2>Add Technician</h2>

    <!-- Send the technician information to the controller -->
    <form action="../technician_manager.php" method="post" id="aligned">

        <!-- Identify the action as adding a technician -->
        <input type="hidden" name="action" value="add_technician">

        <label>First Name:</label>
        <input type="text" name="first_name">
        <br>

        <label>Last Name:</label>
        <input type="text" name="last_name">
        <br>

        <label>Email:</label>
        <input type="text" name="email">
        <br>

        <label>Phone:</label>
        <input type="text" name="phone">
        <br>

        <label>Password:</label>
        <input type="text" name="password">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Technician">
        <br>
    </form>

    <!-- Return to the Technician List page -->
    <p>
        <a href="../">View Technician List</a>
    </p>
</main>

<?php

include '../../view/footer.php';
?>