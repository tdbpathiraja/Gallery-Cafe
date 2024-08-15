document.getElementById('AdminTeamloginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var messageDiv = document.getElementById('message');

    
    var adminUsername = 'tharindu';
    var adminPassword = 'tharindu@4321';

    
    if (username === adminUsername && password === adminPassword) {
        messageDiv.innerHTML = '<div class="alert alert-success">Login successful!!</div>';
        setTimeout(() => {
            window.location.href = '../../../control-dashboards/admin/dashboard/admin.php';
        }, 2000);
    } else {
        messageDiv.innerHTML = '<div class="alert alert-danger">Invalid username or password. Please try again.</div>';
    }
});
