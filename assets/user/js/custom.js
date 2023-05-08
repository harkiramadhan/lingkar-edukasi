$(document).ready(function() {
    var input = $('.nav-search-input')
    var results = $('.result-search')

    input.on('input', function () {
        val = $(this).val()
        console.log($(this).val())
        $.ajax({
            url: baseUrl + 'course/search/',
            type: 'get',
            data: {val : val},
            beforeSend: function(){
                $('.result-search').empty()
            },
            success: function(res){
                results.css('display', 'block')
                $('.result-search').html(res)
            }
        })
    })

    $('.btn-redirect').click(function(){
        var url = $(this).attr('data-url')
        window.location.href = url
    })

    // input.on('focus', function() {
    //     if (input.is(':focus')) {
    //         results.show().css('display', 'flex')
    //     }
    // })
    // input.on('blur', function() {
    //     results.hide().css('display', 'none')
    // })
})