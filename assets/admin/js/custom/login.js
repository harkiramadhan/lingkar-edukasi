var token = localStorage.getItem('token')
if(token){
    $.ajax({
        url: baseUrl + 'admin/admin/ajaxTokenAuth',
        type: 'post',
        data: {token : token},
        success: function(res){
            if(res.status === 200){
                window.location.href = res.redirect_url
            }else{
                localStorage.removeItem('token')
            }
        }
    })
}

$('.btn-action').click(function(){
    var email = $('#email').val()
    var pwd = $('#password').val()

    var token = localStorage.getItem('token')

    $.ajax({
        url: baseUrl + 'admin/admin/ajaxAuth',
        type: 'post',
        data: {email: email, pwd : pwd},
        beforeSend: function(){

        },
        success: function(res){
            if(res.status === 200){
                if($('input.checkbox_check').is(':checked')){
                    localStorage.setItem('token', res.token)
                }
            }

            window.location.href = res.redirect_url
        }
    })
})