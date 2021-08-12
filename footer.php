<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });


    //tambah class active jika di klik
    var url = window.location;

    // untuk menambahkan class active pada menu yg tidak memiliki anak atau single link
    $('a').filter(function() {

        return this.href == url;

    }).parent().addClass('active');

    // ini untuk menu beranak, jadi otomatis akan terbuka sesuai dengan link tujuan

    $('a').filter(function() {

        return this.href == url;

    }).parentsUntil(".navigation > .list").addClass('active');



    //preloader
    $(window).on("load", function() {
        $(".preloader").fadeOut("slow");
    });


    //konfirmasi logout
    function keluar(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
        console.log(urlToRedirect); // verify if this is the right URL
        Swal.fire({
                title: "Apakah anda yakin ingin keluar?",

                showDenyButton: true,
                confirmButtonText: `Ya`,
                icon: "question",
                dangerMode: true,
                denyButtonColor: 'rgba(29,151,108,1)',
                confirmButtonColor: '#404e67',
                denyButtonText: `Batal`,
                customClass: {
                    confirmButton: "mr-2 pl-2 pr-2"

                },

                allowOutsideClick: () => {
                    const popup = Swal.getPopup()
                    popup.classList.remove('swal2-show')
                    setTimeout(() => {
                        popup.classList.add('animate__animated', 'animate__headShake')
                    })
                    setTimeout(() => {
                        popup.classList.remove('animate__animated', 'animate__headShake')
                    }, 500)
                    return false
                }
            })
            .then((willQuit) => {
                // redirect with javascript here as per your logic after showing the alert using the urlToRedirect value
                if (willQuit.isConfirmed) {
                    window.location = urlToRedirect;
                }
            });
    }

    //toast menu
    function inputMenu() {
        Swal.fire({
            icon: 'info',
            title: 'Pesan menu terlebih dahulu!',
            timer: 1500,
            type: 'danger',
            confirmButtonColor: "rgba(29,151,108,1)",
            confirmButtonClass: "pl-3 pr-3"
        })
    }

    //konfirmasi hapus
    function konfirmasi(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
        console.log(urlToRedirect); // verify if this is the right URL
        Swal.fire({
                title: "Apakah anda yakin ingin menghapus ?",

                icon: "question",
                showDenyButton: true,
                confirmButtonText: `Ya, hapus`,
                denyButtonColor: 'rgba(29,151,108,1)',
                confirmButtonColor: '#404e67',
                denyButtonText: `Batal`,
                customClass: {
                    confirmButton: "mr-2 pl-2 pr-2"

                },

                allowOutsideClick: () => {
                    const popup = Swal.getPopup()
                    popup.classList.remove('swal2-show')
                    setTimeout(() => {
                        popup.classList.add('animate__animated', 'animate__headShake')
                    })
                    setTimeout(() => {
                        popup.classList.remove('animate__animated', 'animate__headShake')
                    }, 500)
                    return false
                }
            })
            .then((willDelete) => {

                // redirect with javascript here as per your logic after showing the alert using the urlToRedirect value

                if (willDelete.isConfirmed) {
                    window.location = urlToRedirect;
                }
            });
    }
</script>

</body>

</html>