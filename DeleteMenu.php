<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM ref_menu WHERE id=$id");
if ($result) {
    echo "Menu deleted successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>