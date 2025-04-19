<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM chefs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $chef = $result->fetch_assoc(); // Fetch chef data
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $specialization = $_POST['specialization'];
    $image_url = $_POST['image_url'];
    $twitter_url = $_POST['twitter_url'];
    $facebook_url = $_POST['facebook_url'];
    $instagram_url = $_POST['instagram_url'];
    $linkedin_url = $_POST['linkedin_url'];

    $sql = "UPDATE chefs SET name = ?, specialization = ?, image_url = ?, twitter_url = ?, facebook_url = ?, instagram_url = ?, linkedin_url = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $name, $specialization, $image_url, $twitter_url, $facebook_url, $instagram_url, $linkedin_url, $id);
    if ($stmt->execute()) {
        header("Location: admin.php");
        exit(); // Ensure no further code is executed after redirection
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
    <title>Edit Chef</title>
</head>
<body>
    <h2>Edit Chef</h2>
    <form method="post" action="edit_chefs.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($chef['id']); ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($chef['name']); ?>"><br>
        <label for="specialization">Specialization:</label>
        <input type="text" id="specialization" name="specialization" value="<?php echo htmlspecialchars($chef['specialization']); ?>"><br>
        <label for="image_url">Image URL:</label>
        <input type="text" id="image_url" name="image_url" value="<?php echo htmlspecialchars($chef['image_url']); ?>"><br>
        <label for="twitter_url">Twitter URL:</label>
        <input type="text" id="twitter_url" name="twitter_url" value="<?php echo htmlspecialchars($chef['twitter_url']); ?>"><br>
        <label for="facebook_url">Facebook URL:</label>
        <input type="text" id="facebook_url" name="facebook_url" value="<?php echo htmlspecialchars($chef['facebook_url']); ?>"><br>
        <label for="instagram_url">Instagram URL:</label>
        <input type="text" id="instagram_url" name="instagram_url" value="<?php echo htmlspecialchars($chef['instagram_url']); ?>"><br>
        <label for="linkedin_url">LinkedIn URL:</label>
        <input type="text" id="linkedin_url" name="linkedin_url" value="<?php echo htmlspecialchars($chef['linkedin_url']); ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
