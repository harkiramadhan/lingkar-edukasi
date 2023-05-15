$('.pay-button').click(function(){
    snap.pay(snapToken, {
        onSuccess: function(result){
            saveTransaction(result, courseid)
        },onPending: function(result){
            saveTransaction(result, courseid)
        },onError: function(result){
            saveTransaction(result, courseid)
        }
    });
})

function saveTransaction(params, courseid){
    $.ajax({
        url: baseUrl + 'course/saveTransaction',
        type: 'post',
        data: {params : params, 'courseid' : courseid},
        success: function(response){
            window.location.href = response.url
        }
    })
}