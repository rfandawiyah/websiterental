{{-- javascripct --}}

<script src="{{ asset('template/assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('template/assets/js/app.js') }}"></script>

<!-- Need: Apexcharts -->
<script src="{{ asset('template/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('template/assets/js/pages/dashboard.js') }}"></script>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function deleteUser(userId) {
        Swal.fire({
            title: 'Apa kamu yakin?',
            text: "Anda tidak akan dapat mengembalikannya!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#d9534f',
            confirmButtonText: 'Ya, hapus saja!',
            buttonsStyling: false, // Menonaktifkan gaya bawaan tombol
            customClass: {
                confirmButton: 'btn btn-danger mx-1', // Menambahkan class untuk tombol Yes
                cancelButton: 'btn btn-secondary mx-1' // Menambahkan class untuk tombol Cancel
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-btn-' + userId).click();
            }
        });
    }
</script>

<script>
    // Tangkap event submit form
    document.getElementById('editForm').addEventListener('submit', function(event) {
        // Hentikan proses submit form
        event.preventDefault();

        // Cek apakah ada perubahan pada formulir
        var form = event.target;
        var formData = new FormData(form);
        var isChanged = false;

        // Loop through each form field to check if there are changes
        formData.forEach(function(value, key) {
            var originalValue = form.elements[key].defaultValue;
            if (value !== originalValue) {
                isChanged = true;
            }
        });

        // Jika tidak ada perubahan, tampilkan Sweet Alert error
        if (!isChanged) {
            Swal.fire({
                icon: "error",
                title: "Ups...",
                text: "Tidak ada perubahan!",
            });
            return;
        }

        // Jika ada perubahan, lanjutkan proses submit form
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500
        });

        setTimeout(function() {
            form.submit();
        }, 1000); // Delay in milliseconds
    });
</script>
