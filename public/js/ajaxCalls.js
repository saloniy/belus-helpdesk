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

function sendMail() {
    var user = $('#raised_by').val();
    var userEmail = $('#email').val();
    var ticketId = $('#ticket_id').val();
    var status = $('#status').val();
    var priority = $('#priority').val();
    var description = $('#description').val();
    var additionalComment = $('#additional_comment').val();
    var comments = ""
    var successMsgDiv = $('#success-msg');
    $('#comments textarea').each(function(){
        comments += ($(this).val() + "\n\n");
    });
    $.post('/mail-ticket-details', {user: user, userEmail: userEmail, ticketId: ticketId, status: status, priority: priority, description: description, comments: comments, additionalComment: additionalComment}).done(function(data) {
        if(data == "Done") {
            successMsgDiv.addClass('show').removeClass('hide');
            setTimeout(function(){
                successMsgDiv.addClass('hide').removeClass('show');
            }, 5000);
        }
    })
}
