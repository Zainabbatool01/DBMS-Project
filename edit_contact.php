<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM contact_us WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $contact_us = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $customer_id = $_POST['customer_id'];
    
    $sql = "UPDATE contact_us SET name = ?, email = ?, subject = ?, message = ?, customer_id = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $email, $subject, $message, $customer_id, $id);
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
    <title>Edit Contact</title>
</head>
<body>
    <h2>Edit Contact</h2>
    <form method="post" action="edit_contact.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($contact_us['id']); ?>"><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($contact_us['name']); ?>"><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($contact_us['email']); ?>"><br>
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" value="<?php echo htmlspecialchars($contact_us['subject']); ?>"><br>
        <label for="message">Message:</label>
        <input type="text" id="message" name="message" value="<?php echo htmlspecialchars($contact_us['message']); ?>"><br>
        <label for="customer_id">Customer ID:</label>
        <input type="text" id="customer_id" name="customer_id" value="<?php echo htmlspecialchars($contact_us['customer_id']); ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
