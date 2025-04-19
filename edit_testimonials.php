<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM testimonials WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $testimonials = $result->fetch_assoc(); // Changed variable name to match usage
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id']; 
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $image_url = $_POST['image_url'];
    $rating = $_POST['rating'];
    $testimonial = $_POST['testimonial'];

    $sql = "UPDATE testimonials SET name = ?, designation = ?, image_url = ?, rating = ?, testimonial = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $designation, $image_url, $rating, $testimonial, $id); // Removed an 's' from the bind_param
    if ($stmt->execute()) {
        header("Location: admin.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit testimonial</title>
</head>
<body>
    <h2>Edit testimonial</h2>
    <form method="post" action="edit_testimonials.php">
        <input type="hidden" name="id" value="<?php echo $testimonials['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $testimonials['name']; ?>"><br>
        <label for="designation">Designation:</label>
        <input type="text" id="designation" name="designation" value="<?php echo $testimonials['designation']; ?>"><br>
        <label for="image_url">Image: </label>
        <input type="text" id="image_url" name="image_url" value="<?php echo $testimonials['image_url']; ?>"><br>
        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" value="<?php echo $testimonials['rating']; ?>"><br>
        <label for="testimonial">Testimonial:</label>
        <input type="text" id="testimonial" name="testimonial" value="<?php echo $testimonials['testimonial']; ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
