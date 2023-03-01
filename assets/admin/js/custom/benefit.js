$('.btn-edit').click(function(){
    var id = $(this).attr('data-id')
    $.ajax({
        url: baseUrl + 'admin/benefit/edit/' + id,
        type: 'get',
        beforeSend: function(){
            $('.edit-content').empty()
            $('#modal-edit').modal('show')
        },
        success: function(res){
            $('.edit-content').html(res)
        }
    })
})

$('.btn-remove').click(function(){
    var id = $(this).attr('data-id')
    $.ajax({
        url: baseUrl + 'admin/benefit/remove/' + id,
        type: 'get',
        beforeSend: function(){
            $('.remove-content').empty()
            $('#modal-remove').modal('show')
        },
        success: function(res){
            $('.remove-content').html(res)
        }
    })
})