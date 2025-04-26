
// Fungsi untuk menampilkan preview gambar
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('image-upload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewDiv = document.getElementById('image-preview');
                previewDiv.classList.remove('hidden');
                document.getElementById('preview-image').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
});

