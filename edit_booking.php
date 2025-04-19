<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM booking WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $booking = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $people_num = $_POST['people_num'];
    $message = $_POST['message'];

    $sql = "UPDATE booking SET name = ?, email = ?, phone = ?, date = ?, time = ?, people_num = ?, message = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $name, $email, $phone, $date, $time, $people_num, $message, $id);
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
    <title>Edit Booking</title>
</head>
<body>
    <h2>Edit Booking</h2>
    <form method="post" action="edit_booking.php">
        <input type="hidden" name="id" value="<?php echo $booking['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $booking['name']; ?>"><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $booking['email']; ?>"><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $booking['phone']; ?>"><br>
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="<?php echo $booking['date']; ?>"><br>
        <label for="time">Time:</label>
        <input type="time" id="time" name="time" value="<?php echo $booking['time']; ?>"><br>
        <label for="people_num">People:</label>
        <input type="number" id="people_num" name="people_num" value="<?php echo $booking['people_num']; ?>"><br>
        <label for="message">Message:</label>
        <textarea id="message" name="message"><?php echo $booking['message']; ?></textarea><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
