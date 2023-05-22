$('#next').click(function(){
    var current = $(this).attr('data-current')

    $.ajax({
        url: baseUrl + '/kelas/saveLogVideo',
        type: 'get',
        data: {current: current}
    })
})