<?php
// Connect to the database (replace 'db_username', 'db_password', and 'db_name' with your actual credentials)
$pdo = new PDO("mysql:host=localhost;dbname=db_name", "db_username", "db_password");

// Check if the profile ID is provided in the URL
if (isset($_GET["id"])) {
  $profile_id = $_GET["id"];

  // Retrieve the user profile from the database
  $sql = "SELECT * FROM user_profiles WHERE id = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$profile_id]);
  $profile = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($profile) {
    // Display the user profile information
    echo "<h2>User Profile</h2>";
    echo "Username: " . $profile["username"] . "<br>";
    echo "Email: " . $profile["email"] . "<br>";
    echo "<img src='" . $profile["avatar"] . "' alt='Avatar' width='150'><br>";
  } else {
    echo "User profile not found.";
  }
} else {
  echo "Invalid profile ID.";
}
?>
