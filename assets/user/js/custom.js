$(document).ready(function() {
    var input = $('.nav-search-input')
    var results = $('.result-search')

    input.on('input', function () {
        // val = $(this).val()
        // console.log($(this).val())
        // $.ajax({
        //     url: baseUrl + 'course/search/',
        //     type: 'get',
        //     data: {val : val},
        //     beforeSend: function(){

        //     },
        //     success: function(res){
        //         if(res.length > 0){

        //         }else{
                    $('.empty-search').css('display', 'block')
        //         }
        //     }
        // })
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