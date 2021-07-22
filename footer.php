<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });


    //tambah class active jika di klik
    var url = window.location;

    // untuk menambahkan class active pada menu yg tidak memiliki anak atau single link
    $('ul li a').filter(function() {

        return this.href == url;

    }).parent().addClass('active');

    // ini untuk menu beranak, jadi otomatis akan terbuka sesuai dengan link tujuan

    $('ul li a').filter(function() {

        return this.href == url;

    }).parentsUntil(".navigation > .list").addClass('active');

    //preloader
    $(window).on("load", function() {
        $(".preloader").fadeOut("slow");
    });

    function keluar(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
        console.log(urlToRedirect); // verify if this is the right URL
        Swal.fire({
                title: "Anda yakin ingin keluar?",

                showDenyButton: true,
                confirmButtonText: `Iya`,
                icon: "question",
                dangerMode: true,
                denyButtonText: `Tidak`,
                customClass: {
                    confirmButton: "btn btn-md btn-dark mr-2 pl-2 pr-2",
                    denyButton: "btn btn-blue"
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
</script>

</body>

</html>