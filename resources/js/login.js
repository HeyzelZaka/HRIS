// resources/js/login.js
window.switchRole = function(role) {
    const btnUser = document.getElementById('btn-user');
    const btnAdmin = document.getElementById('btn-admin');
    const roleInput = document.getElementById('selected-role');

    if (role === 'user') {
        btnUser.classList.add('active');
        btnAdmin.classList.remove('active');
        roleInput.value = 'user';
    } else {
        btnAdmin.classList.add('active');
        btnUser.classList.remove('active');
        roleInput.value = 'admin';
    }
}