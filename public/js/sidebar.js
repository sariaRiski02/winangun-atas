document.addEventListener('click', function(event) {
    const sidebar = document.getElementById('sidebar');
    const toggleButton = document.getElementById('toggleSidebar');
    
    // Periksa apakah klik terjadi di luar sidebar dan bukan pada tombol toggle
    if (!sidebar.contains(event.target) && !toggleButton.contains(event.target)) {
        // Hanya menutup jika sidebar sedang terbuka
        if (sidebar.classList.contains('translate-x-0')) {
            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('-translate-x-full');
            document.getElementById('overlay').classList.add('hidden');
        }
    }
});

document.getElementById('toggleSidebar').addEventListener('click', function () {
    document.getElementById('sidebar').classList.toggle('translate-x-0');
    document.getElementById('sidebar').classList.toggle('-translate-x-full');
    
    document.getElementById('overlay').classList.remove('hidden');
});
