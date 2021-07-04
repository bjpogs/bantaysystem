$("#barangayEdit").on('show.bs.modal', function(e){
    var opener = e.relatedTarget;
    var id = $(opener).attr('test');
    var oname = $(opener).attr('oname');
    var ochairmanship = $(opener).attr('ochairmanship');    
    $('#barangayEdit').find('[name="resident-id"]').val(id);
    $('#barangayEdit').find('[name="brgyedit-name"]').val(oname);
    $('#barangayEdit').find('[name="brgyedit-chairmanship"]').val(ochairmanship);
});
// SK BRGY 
$("#SKbarangayEdit").on('show.bs.modal', function(e){
    var opener = e.relatedTarget;
    var id = $(opener).attr('test');
    var oname = $(opener).attr('oskname');
    var ochairmanship = $(opener).attr('oskchairmanship');
    $('#SKbarangayEdit').find('[name="resident-id"]').val(id);
    $('#SKbarangayEdit').find('[name="brgyedit-name"]').val(oname);
    $('#SKbarangayEdit').find('[name="brgyedit-chairmanship"]').val(ochairmanship);
});
$("#SKbarangayAdd").on('show.bs.modal', function(e){
    var opener = e.relatedTarget;
    var id = $(opener).attr('test');
    $('#SKbarangayAdd').find('[name="resident-id"]').val(id);
});
$("#SKofficialDelete").on('show.bs.modal', function(e){
    var opener = e.relatedTarget;
    var id = $(opener).attr('test');
    $('#SKofficialDelete').find('[name="resident-id"]').val(id);
});
//show-hide button
$("#show_hide_password a").on('click', function(event) {
    event.preventDefault();
    if($('#show_hide_password input').attr("type") == "text"){
        $('#show_hide_password input').attr('type', 'password');
        $('#show_hide_password i').addClass( "fa-eye-slash" );
        $('#show_hide_password i').removeClass( "fa-eye" );
    }else if($('#show_hide_password input').attr("type") == "password"){
        $('#show_hide_password input').attr('type', 'text');
        $('#show_hide_password i').removeClass( "fa-eye-slash" );
        $('#show_hide_password i').addClass( "fa-eye" );
    }
});
$("#usersEdit").on('show.bs.modal', function(e){
    var opener = e.relatedTarget;
    var id = $(opener).attr('test');
    var name = $(opener).attr('name');
    var username = $(opener).attr('username');
    var password = $(opener).attr('password');
    var usertype = $(opener).attr('usertype');
    $('#usersEdit').find('[name="resident-id"]').val(id);
    $('#usersEdit').find('[name="useredit-name').val(name);
    $('#usersEdit').find('[name="useredit-username"]').val(username);
    $('#usersEdit').find('[name="useredit-password"]').val(password);
    $('#usersEdit').find('[name="useredit-usertype"]').val(usertype);
});
$("#usersDelete").on('show.bs.modal', function(e){
    var opener = e.relatedTarget;
    var id = $(opener).attr('test');
    $('#usersDelete').find('[name="resident-id"]').val(id);
});
$("#sitioEdit").on('show.bs.modal', function(e){
    var opener = e.relatedTarget;
    var id = $(opener).attr('test');
    var name = $(opener).attr('name');
    $('#sitioEdit').find('[name="resident-id"]').val(id);
    $('#sitioEdit').find('[name="sitioedit-name').val(name);
});
$("#sitioDelete").on('show.bs.modal', function(e){
    var opener = e.relatedTarget;
    var id = $(opener).attr('test');
    $('#sitioDelete').find('[name="resident-id"]').val(id);
});