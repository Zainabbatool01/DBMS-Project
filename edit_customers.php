<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM customers WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $customer = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    $sql = "UPDATE customers SET name = ?, email = ?, phone = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $email, $phone, $id);
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
    <title>Edit Customer</title>
</head>
<body>
    <h2>Edit Customer</h2>
    <form method="post" action="edit_customers.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($customer['id']); ?>"><br>
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($customer['name']); ?>"><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($customer['email']); ?>"><br>
        <label for="phone">Phone:</label>
        <input type="number" id="phone" name="phone" value="<?php echo htmlspecialchars($customer['phone']); ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
