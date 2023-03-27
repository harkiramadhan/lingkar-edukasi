$('.btn-detail-ajuan').click(function(){
    var id = $(this).attr('data-id')

    $.ajax({
        url: baseUrl + 'admin/tutor/edit/' + id,
        type: 'get',
        beforeSend: function(){

        },
        success: function(res){
            $('.ajuan-content').html(res)
            $('#modal-ajuan').modal('show')
        }
    })
})