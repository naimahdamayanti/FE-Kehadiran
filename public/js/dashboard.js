document.addEventListener('DOMContentLoaded', function() {
    const token = document.querySelector('meta[name="token"]').getAttribute('content');

    if (token) {
        fetch('http://localhost:8080/verify-token', {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + token
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log('Token valid:', data);
            document.getElementById('welcome').innerText = "Selamat datang, " + data.email;
        })
        .catch(error => {
            console.error('Token tidak valid:', error);
            window.location.href = '/login';
        });
    } else {
        window.location.href = '/login';
    }
});
