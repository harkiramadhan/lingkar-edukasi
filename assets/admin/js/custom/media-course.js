$('.btn-edit-materi').click(function(){
    var id = $(this).attr('data-id')
    var materi = $(this).attr('data-materi')

    $('#materi-edit-id').val(id)
    $('#materi-edit-materi').val(materi)
    
    $('#modal-edit-materi').modal('show')
})

$('.btn-edit-video').click(function(){
    var materi = $(this).attr('data-materi')
    var id = $(this).attr('data-id')
    var video = $(this).attr('data-video-url')
    var judul = $(this).attr('data-judul')
    var durasi = $(this).attr('data-durasi')
    var status = $(this).attr('data-status')

    $('#video-edit-id').val(id)
    $('#video-edit-video-src').attr('src', video)
    $('#video-edit-judul').val(judul)
    $('#video-edit-durasi').val(durasi)
    $('#video-edit-status').val(status).change()
    $('#video-edit-materi').text(materi)

    $('#modal-edit-video').modal('show')
    document.getElementById('video-edit-video').play()
})

$('.btn-add-video').click(function(){
    var id = $(this).attr('data-id')
    var materi = $(this).attr('data-materi')

    $('#video-add-id').val(id)
    $('.text-modal-tambah-video').text(materi)

    $('#modal-tambah-video').modal('show')
})

$('.btn-remove-materi').click(function(){
    var id = $(this).attr('data-id')
    var materi = $(this).attr('data-materi')

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
                url: baseUrl + 'admin/course/removeMateri/' + id,
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
                        $('#accordion-' + id).remove()
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

$('.btn-remove-video').click(function(){
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
                url: baseUrl + 'admin/course/removeVideo/' + id,
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
                        $('#data-video-' + id).remove()
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

document.getElementById("videoUpload").onchange = function(event) {
    let file = event.target.files[0]
    let blobURL = URL.createObjectURL(file)
    $('.video-upload').removeClass('d-none')
    document.querySelector("video").src = blobURL
}

$('#modal-edit-video').on('hidden.bs.modal', function () {
    document.querySelectorAll('video').forEach(vid => vid.pause())
})