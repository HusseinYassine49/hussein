<?php
include "../includes/connect.php";

echo '<div class="card" id="user" style="width: auto;">';
$Time = $_GET['Time'];
$username = $_GET['username'];

if ($username == "") {
    if ($Time == "") {
        $query = "SELECT `id`, `id_car`, `username`, `action`, `Time` FROM `log_entry`";
    } else {
        $query = "SELECT `id`, `id_car`, `username`, `action`, `Time` FROM `log_entry` WHERE `Time` LIKE '$Time' ORDER BY `Time` ASC";
    }
} else {
    if ($Time == "") {
        $query = "SELECT `id`, `id_car`, `username`, `action`, `Time` FROM `log_entry`where `username`like '$username'";
    } else {
        $query = "SELECT `id`, `id_car`, `username`, `action`, `Time` FROM `log_entry` WHERE `Time` LIKE '$Time' AND `username` LIKE '$username' ORDER BY `Time` ASC";
    }
};

$result = mysqli_query($conn, $query);

if ($result) {
    echo '<div class="card-body">';
    echo '<h5 class="card-title">USER ACTIONS LIST ON : ' . $Time . ' FOR ALL USER </h5>
          <hr>';

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<h6 class="card-subtitle mb-2 text-muted">' . $row['username'] . '</h6>';
            echo '<p class="card-text">' . $row['action'] . ' on ' . $row['Time'] . '</p>';
            echo '<hr>';
        }
    } else {
        echo '<p class="card-text">No actions recorded.</p>';
    }

    echo '</div>';
} else {
    echo "Error: " . mysqli_error($conn);
}

echo '</div>';