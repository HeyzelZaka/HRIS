// resources/js/karyawan-profile.js
window.toggleProfile = function() {
    const popover = document.getElementById('profilePopover');
    if (popover) {
        popover.classList.toggle('hidden');
    }
}

// Menutup popover jika user klik di luar area profil
window.addEventListener('click', function(event) {
    const popover = document.getElementById('profilePopover');
    const trigger = event.target.closest('.profile-trigger-area');
    
    if (!trigger && popover && !popover.classList.contains('hidden')) {
        popover.classList.add('hidden');
    }
});