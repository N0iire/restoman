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
</script>

</body>

</html>