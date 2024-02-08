<?php
include "connect.php";

// Check if 'id' parameter is provided in the URL
if (isset($_GET['maintenanceId'])) {
    $Id = $_GET['maintenanceId'];

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

<form id="pay" action="payhit.php" method="post">
    <!-- Add a hidden input field to include the id in the form -->
    <input type="text" name="id" value="<?php echo $Id; ?>">

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
    e.preventDefault();

    console.log($(this).serializeArray());

    $.ajax({
        url: 'update_hit.php', // Corrected URL to match form action
        type: 'POST',
        data: $(this).serializeArray(),
        success: function(data) {
            console.log(data);
            window.location.href = 'paymaintenance.php';
            popup('success', 'Success', 'Maintenance added successfully');
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