$('.btn-edit').click(function(){
    var id = $(this).attr('data-id')
    $.ajax({
        url: baseUrl + 'admin/akun/edit/' + id,
        type: 'get',
        beforeSend: function(){
            $('.edit-content').empty()
            $('#modal-edit').modal('show')
        },
        success: function(res){
            $('.edit-content').html(res)
        }
    })
})

$('.btn-remove').click(function(){
    var id = $(this).attr('data-id')

    Swal.fire({
        icon: 'error',
        title: "Are you sure to delete ?",
        text: "You will not be able to recover this imaginary file !!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it !!",
        cancelButtonText: "No, cancel it !!",
        closeOnConfirm: false,
        closeOnCancel: false
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: baseUrl + 'admin/akun/remove/' + id,
                type: 'post',
                error: function(){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    })
                },
                success: function(res){
                    if(res == 1){
                        $('#data-' + id).remove()
                        Swal.fire("Deleted !!", "Hey, your imaginary file has been deleted !!", "success")
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    }
                }
            })
        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
})