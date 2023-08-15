<?php
$pdo = new PDO("mysql:hpst=localhost;dbname=db_name","db_username","db_password");

if($_SERVER["REQUEST_METHOD"] ==="POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];

    $image_path = "uploads/".basename($_FILES["avatar"]["name"]);
    move_upload_file($_FILES["avatar"]["tmp_name"], $image_path);

    $sql = "INSERT INTO usesr_profiles (username, email, avatar) VALUES (?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $email, $image, $image_path]);

    header("Location: profile: profile.php?id=" . $pdo->lastInsertID());
    exit;
}
?>