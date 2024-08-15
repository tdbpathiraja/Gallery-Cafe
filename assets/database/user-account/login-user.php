<?php
session_start();

include '../db-connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
       
        if (password_verify($password, $user['password'])) {
            
            $_SESSION['user'] = $user['username'];
            echo json_encode(["status" => "success", "message" => "Login successful", "redirect" => "../../index.php"]);
        } else {
            
            echo json_encode(['status' => 'error', 'message' => 'Incorrect password or username.']);
        }

        
        setcookie('username', $username, time() + (86400 * 30), "/"); // 30 days store the cookies
        
    } else {
        
        echo json_encode(['status' => 'error', 'message' => 'This User not Registered.']);
    }

    $stmt->close();
    $conn->close();
}
?>
