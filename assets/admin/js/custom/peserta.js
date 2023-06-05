$('.btn-detail').click(function(){
    var id = $(this).attr('data-id')
    $.ajax({
        url: baseUrl + 'admin/peserta/detail/' + id,
        type: 'get',
        beforeSend: function(){
            $('.detail-content').empty()
            $('#modal-detail').modal('show')
        },
        success: function(res){
            $('.detail-content').html(res)
        }
    })
})

$('.btn-edit').click(function(){
    var id = $(this).attr('data-id')
    $.ajax({
        url: baseUrl + 'admin/peserta/edit/' + id,
        type: 'get',
        beforeSend: function(){
            $('.detail-content').empty()
            $('#modal-detail').modal('show')
        },
        success: function(res){
            $('.detail-content').html(res)
        }
    })
})