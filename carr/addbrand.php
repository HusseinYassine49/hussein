<?php
include "../includes/connect.php";

?>


<form id="addBrandForm" action="../carr/addbrand.php" method="post">
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
        url: '../carr/ajaxbrand.php',
        type: 'POST',
        data: $(this).serializeArray(),
        success: function(data) {
            console.log(data);

            // Parse the JSON response
            var responseData = JSON.parse(data);

            if (responseData.hasOwnProperty("error")) {
                // Handle the error case
                popup("error", "Error: " + responseData.error,
                    "Error while updating, double-check the fields!");
            } else {
                // Redirect on success
                window.location.href = 'prodect.php';
            }
        },
        error: function(jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
});
</script>