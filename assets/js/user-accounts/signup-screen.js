document.getElementById('signup-form').addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(this);
    fetch('../../assets/database/user-account/register-user.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        
        document.getElementById('success-message').style.display = 'none';
        document.getElementById('error-message').style.display = 'none';
        document.getElementById('error-message').textContent = '';

        if (data.status === 'success') {
            document.getElementById('success-message').textContent = data.message;
            document.getElementById('success-message').style.display = 'block';
            setTimeout(() => {
                window.location.href = 'login.php';
            }, 2000);
        } else {
            document.getElementById('error-message').textContent = data.message;
            document.getElementById('error-message').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('error-message').textContent = 'System Error. Please try again later or contact our staff.';
        document.getElementById('error-message').style.display = 'block';
    });
});

  
  