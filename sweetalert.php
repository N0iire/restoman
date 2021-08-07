<script>
    //toast login
    const Info = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        customClass: {
            popup: 'login-toast'
        }

    })

    function sukses() {
        Info.fire({
            icon: 'success',
            title: 'Login sukses'
        })
    }



    //toast info
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        iconColor: 'white',
        customClass: {
            popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true
    });

    function m09(ev) {
        Toast.fire({
            icon: 'success',
            title: 'Menu dikonfirmasi!'
        });
    }

    function m10(ev) {
        Toast.fire({
            icon: 'error',
            title: 'Menu ditolak!'
        })
    }

    function berhasilTambah(ev) {
        Toast.fire({
            icon: 'success',
            title: 'Data berhasil ditambah!'
        })
    }

    function berhasilHapus(ev) {
        Toast.fire({
            icon: 'success',
            title: 'Data berhasil dihapus!'
        })
    }

    function berhasilUbah(ev) {
        Toast.fire({
            icon: 'success',
            title: 'Data berhasil diubah!'
        })
    }

    function gagalTambah(ev) {
        Toast.fire({
            icon: 'error',
            title: 'Gagal menambah data!'
        })
    }

    function gagalUbah(ev) {
        Toast.fire({
            icon: 'error',
            title: 'Gagal mengubah data!'
        })
    }

    function gagalHapus(ev) {
        Toast.fire({
            icon: 'error',
            title: 'Data gagal dihapus!'
        })
    }
</script>