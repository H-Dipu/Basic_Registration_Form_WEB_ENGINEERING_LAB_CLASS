document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting

    // Get form values
    const username = document.getElementById('username').value;
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const dob = document.getElementById('dob').value;
    const address = document.getElementById('address').value;
    const city = document.getElementById('city').value;
    const state = document.getElementById('state').value;
    const zip = document.getElementById('zip').value;
    const gender = document.querySelector('input[name="gender"]:checked');
    const interests = Array.from(document.querySelectorAll('input[name="interests[]"]:checked')).map(el => el.value);
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;

    // Basic validation
    if (username === '' || name === '' || email === '' || phone === '' || dob === '' || address === '' || city === '' || state === '' || zip === '' || !gender || password === '' || confirmPassword === '') {
        document.getElementById('message').innerHTML = '<div class="alert alert-danger">Please fill all fields!</div>';
        return;
    }

    // Check if passwords match
    if (password !== confirmPassword) {
        document.getElementById('message').innerHTML = '<div class="alert alert-danger">Passwords do not match!</div>';
        return;
    }

    // Simulate successful registration
    document.getElementById('message').innerHTML = '<div class="alert alert-success">Registration successful!</div>';
    
    // Here you can add code to send data to the server if needed (e.g., using AJAX)
});
