$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});

function filterByUserType(type){
    $.post('/admin-filter-users', {type: type}).done(function(data) {
        $('#allUsersData').html(data);
    })
}

function assignToCsr(ticketId) {
    var assignedTo = $('#assignedTo' + ticketId).val();
    var updatedMsg = $('#updatedMsg' + ticketId);
    $.post('/admin-assign-ticket', {ticketId: ticketId, to: assignedTo}).done(function(data) {
        if(data == "Done") {
            updatedMsg.addClass('show').removeClass('hide');
            setTimeout(function(){
                updatedMsg.addClass('hide').removeClass('show');
            }, 5000);
        }
    })
}
