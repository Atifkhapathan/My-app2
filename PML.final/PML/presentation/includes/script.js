// script.js

function moveTo(Add) {
    var loadingSpinner = document.getElementById('loading-spinner');
    loadingSpinner.style.display = 'block';

    // Simulate a delay (you can replace this with an actual loading process)
    setTimeout(function () {
        loadingSpinner.style.display = 'none';
        // Redirect to login.html after loading
        window.location.href = Add;
    }, 500); // Adjust the duration as needed
}
fetch('../includes/header.html')
            .then(response => response.text())
            .then(html => {
                document.getElementById('header-container').innerHTML = html;
            });