// resources/js/dashboard.js

function updateClock() {
    const clockElement = document.getElementById('clock');
    if (clockElement) {
        const now = new Date();
        const timeStr = now.toLocaleTimeString('id-ID', { 
            hour: '2-digit', 
            minute: '2-digit', 
            second: '2-digit' 
        });
        clockElement.innerText = timeStr;
    }
}

// Jalankan setiap detik
setInterval(updateClock, 1000);

// Jalankan sekali saat halaman dimuat
document.addEventListener('DOMContentLoaded', updateClock);