

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="assets/js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="assets/js/vendor/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>

<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script>
    $("#alert").fadeTo(2000, 500).slideUp(500, function () {
        $("#alert").slideUp(1000);
    });
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>


<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "paging":   true,
        "bPaginate": false,
        "ordering": true,
        "columnDefs":[{ 'orderable': false }],
        "info":     false,
        "searching":false,
        "bLengthChange": false,
        "language": {
            "lengthMenu": "Display -- records per page",
            "zeroRecords": "Sorry No Data Available, We Will Let You Know When Anything Come",
            "infoEmpty": "No records available"
        }
    } );
} );
</script>

</body>
</html>
