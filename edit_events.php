<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM events WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $event = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $party_type = $_POST['party_type'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    
    $sql = "UPDATE events SET party_type = ?, price = ?, description = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $party_type, $price, $description, $id);
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
    <title>Edit Events</title>
</head>
<body>
    <h2>Edit Events</h2>
    <form method="post" action="edit_events.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($event['id']); ?>">
        <label for="party_type">Party Type:</label>
        <input type="text" id="party_type" name="party_type" value="<?php echo htmlspecialchars($event['party_type']); ?>"><br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($event['price']); ?>"><br>
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($event['description']); ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
