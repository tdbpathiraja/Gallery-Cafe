document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var form = event.target;
    var formData = new FormData(form);
    var messageDiv = document.getElementById('message');

    fetch('../../assets/database/user-account/login-user.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        messageDiv.innerHTML = '';
        if (data.status === 'success') {
            messageDiv.innerHTML = '<div class="alert alert-success">' + data.message + '</div>';
            setTimeout(() => {
                window.location.href = data.redirect;
            }, 2000);
        } else {
            messageDiv.innerHTML = '<div class="alert-failed">' + data.message + '</div>';
        }
    })
    .catch(error => {
        messageDiv.innerHTML = '<div class="alert-failed">An error occurred. Please try again.</div>';
    });
});