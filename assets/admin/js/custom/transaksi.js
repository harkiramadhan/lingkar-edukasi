$('.btn-detail').click(function(){
    var orderid = $(this).attr('data-id')

    $.ajax({
        url: baseUrl + 'admin/transaksi/detail/' + orderid,
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