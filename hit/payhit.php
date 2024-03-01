<?php
include "../includes/connect.php";

$username = $_GET['username'];
// Check if 'id' parameter is provided in the URL
if (isset($_GET['maintenanceId'])) {
    $Id = $_GET['maintenanceId'];
    $username = $_GET['username'];
    // Fetch maintenance details based on the ID
    $query = "SELECT * FROM maintenance WHERE id = $Id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $maintenance = mysqli_fetch_assoc($result);

        // Check if the maintenance with the given ID exists
        if ($maintenance) {
            // Now you have the maintenance details, and you can use them in your HTML form
        } else {
            // Maintenance with the given ID not found
            echo "Maintenance not found!";
        }

        // Free result set
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // 'id' parameter not provided in the URL
    echo "Maintenance ID not specified!";
}
?>

<form id="pay" method="post">
    <!-- Add a hidden input field to include the id in the form -->
    <input type="hidden" id="id" name="id" value="<?php echo $Id; ?>">
    <input type="hidden" id="username" name="username" value="<?php echo $username; ?>">
    <div class="form-group">
        <label for="price">price </label>
        <input type="text" class="form-control" id="price" name="newprice" required>
    </div>
    <button type="submit" class="btn btn-primary">pay </button>
</form>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$('#pay').on('submit', function(e) {
    var id = $("#id").val();
    var price = $("#price").val();
    var username = $("#username").val();
    e.preventDefault();
    var data = $(this).serializeArray();

    console.log(data);

    $.ajax({
        url: '../hit/update_hit.php', // Corrected URL to match form action
        type: 'POST',
        data: {
            id: id,
            newprice: price,
            username: username,
        },
        success: function(data) {



            popup('success', 'Success', 'Maintenance added successfully');
            window.location.href = '../hit/paymaintenance.php';
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(textStatus, errorThrown); // Log the error for debugging
            popup('error', 'Error', 'Failed to add maintenance');
        }
    });
});

function popup($type, $title, $message) {
    Swal.fire({
        icon: $type,
        title: $title,
        html: $message

    })
    return true;
};
</script>