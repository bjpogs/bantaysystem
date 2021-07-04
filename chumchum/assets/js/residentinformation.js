
$("#residentModal").on('show.bs.modal', function(e){
    var opener = e.relatedTarget;
    var id = $(opener).attr('test');
    var fname = $(opener).attr('fname');
    var mname = $(opener).attr('mname');
    var lname = $(opener).attr('lname');
    var alias = $(opener).attr('alias');
    var bday = $(opener).attr('bday');
    var gender = $(opener).attr('gender');
    var sitio = $(opener).attr('sitio');
    var voters = $(opener).attr('voters');
    var civil = $(opener).attr('civil');
    $('#residentModal').find('[name="resident-id"]').val(id);
    $('#residentModal').find('[name="edit-fname"]').val(fname);
    $('#residentModal').find('[name="edit-mname"]').val(mname);
    $('#residentModal').find('[name="edit-lname"]').val(lname);
    $('#residentModal').find('[name="edit-alias"]').val(alias);
    $('#residentModal').find('[name="edit-bday"]').val(bday);
    $('#residentModal').find('[name="edit-gender"]').val(gender);
    $('#residentModal').find('[name="edit-sitio"]').val(sitio);
    $('#residentModal').find('[name="edit-voterstatus"]').val(voters);
    $('#residentModal').find('[name="edit-civilstatus"]').val(civil);
});
$("#deleteModal").on('show.bs.modal', function(e){
    var opener = e.relatedTarget;
    var delid = $(opener).attr('test');
    $('#deleteModal').find('[name="resident-id"]').val(delid);
});
function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("dataTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }
  }