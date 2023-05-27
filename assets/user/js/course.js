$('.pay-button').click(function(){
    saveSnapToken(snapToken, courseid, orderid)
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

function saveSnapToken(snapToken, courseid, orderid){
    $.ajax({
        url: baseUrl + 'course/saveSnapTransaction',
        type: 'post',
        data: {snapToken : snapToken, 'courseid' : courseid, 'orderid' : orderid},
        success: function(response){
            console.log(response)
        }
    })
}

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