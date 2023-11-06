<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $age = $_POST['age'];
    $nic = $_POST['nic'];

    // Save data to a file or database here

    echo "Data saved successfully!";
}
?>