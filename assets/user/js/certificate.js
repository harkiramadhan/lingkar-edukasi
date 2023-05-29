$('.search-btn').click(function(){
    var searchValue = $('#search-value').val()
    $.ajax({
        url: baseUrl + 'sertifikat/getData',
        type: 'get',
        data: {searchValue: searchValue},
        success: function(res){
            $('.result').html(res)
        }
    })
})