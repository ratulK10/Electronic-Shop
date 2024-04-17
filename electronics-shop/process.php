<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <style>
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #d35266;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php
// Define variables to store user input
$first_name = $last_name = $address = $email = $comment = $mobile = '';

// If form is submitted, process the input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = test_input($_POST["first_name"]);
    $last_name = test_input($_POST["last_name"]);
    $address = test_input($_POST["address"]);
    $email = test_input($_POST["email"]);
    $comment = test_input($_POST["comment"]);
    $mobile = test_input($_POST["mobile"]);
}
  
// Function to sanitize user input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>Feedback Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required>
    
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required>
    
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="comment">Comment:</label>
    <textarea id="comment" name="comment" rows="4" required></textarea>
    
    <label for="mobile">Mobile:</label>
    <input type="text" id="mobile" name="mobile" required>
    
    <input type="submit" value="Submit">
</form>

<?php
// Display user input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>Your Feedback:</h2>";
    echo "<p><strong>First Name:</strong> $first_name</p>";
    echo "<p><strong>Last Name:</strong> $last_name</p>";
    echo "<p><strong>Address:</strong> $address</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Comment:</strong> $comment</p>";
    echo "<p><strong>Mobile:</strong> $mobile</p>";
}
?>

</body>
</html>