$('.pay-button').click(function(){
    snap.pay(snapToken, {
        // Optional
        onSuccess: function(result){
            /* You may add your own js here, this is just example */ 
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            saveTransaction(result, courseid)
        },
        // Optional
        onPending: function(result){
            /* You may add your own js here, this is just example */ 
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            saveTransaction(result, courseid)
        },
        // Optional
        onError: function(result){
            /* You may add your own js here, this is just example */ 
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
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
            console.log(response)
            alert(response.status)
            // window.location.href = url
        }
    })
}