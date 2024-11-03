<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $gender = $_POST['gender'];
    $interests = isset($_POST['interests']) ? implode(", ", $_POST['interests']) : 'None';
    $newsletter = isset($_POST['newsletter']) ? 'Yes' : 'No';
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Handle file upload
    $profile_picture = '';
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/'; // Ensure this directory exists
        $profile_picture = basename($_FILES['profile_picture']['name']);
        $target_file = $upload_dir . $profile_picture;

        // Move the uploaded file to the desired location
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file);
    }

    // Display the submitted data
    echo '<h3>Submitted Information:</h3>';
    echo '<p><strong>Username:</strong> ' . htmlspecialchars($username) . '</p>';
    echo '<p><strong>Name:</strong> ' . htmlspecialchars($name) . '</p>';
    echo '<p><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>';
    echo '<p><strong>Phone Number:</strong> ' . htmlspecialchars($phone) . '</p>';
    echo '<p><strong>Date of Birth:</strong> ' . htmlspecialchars($dob) . '</p>';
    echo '<p><strong>Address:</strong> ' . htmlspecialchars($address) . '</p>';
    echo '<p><strong>City:</strong> ' . htmlspecialchars($city) . '</p>';
    echo '<p><strong>State:</strong> ' . htmlspecialchars($state) . '</p>';
    echo '<p><strong>Zip Code:</strong> ' . htmlspecialchars($zip) . '</p>';
    echo '<p><strong>Gender:</strong> ' . htmlspecialchars($gender) . '</p>';
    echo '<p><strong>Interests:</strong> ' . htmlspecialchars($interests) . '</p>';
    echo '<p><strong>Subscribe to Newsletter:</strong> ' . htmlspecialchars($newsletter) . '</p>';

    // Display the uploaded profile picture
    if ($profile_picture) {
        echo '<p><strong>Profile Picture:</strong><br>';
        echo '<img src="' . htmlspecialchars($target_file) . '" alt="Profile Picture" style="max-width: 200px; max-height: 200px;"></p>';
    }
} else {
    echo '<p>No data submitted.</p>';
}
?>
