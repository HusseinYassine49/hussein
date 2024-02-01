<?php
include "connect.php";

?>

<form id="addBrandForm" action="addbrand.php" method="post">
    <div class="form-group">
        <label for="newBrandName">Brand Name</label>
        <input type="text" class="form-control" id="newBrandName" name="newBrandName" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Brand</button>

</form>

<script>
$('#addBrandForm').on('submit', function(e) {
    e.preventDefault();

    console.log($(this).serializeArray());

    $.ajax({
        url: 'ajaxbrand.php', // Corrected URL to match form action
        type: 'POST',
        data: $(this).serializeArray(),
        success: function(data) {
            console.log(data); // Log the response for debugging
            if (data) {
                window.location.href = 'prodect.php';
            } else {
                popup("error", "Error: " + data, "Error while updating, double check the fields!");
            }
        },
        error: function(jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
});
</script>