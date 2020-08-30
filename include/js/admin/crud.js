$(".delete").click(function(){
    var deleteModal = $('#delete_modal');
    var url = $(this).attr('data-url');

    deleteModal.find('.delete_form').attr('action', url);
    deleteModal.modal('show');
});