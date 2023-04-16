function previewImageEdit() {
    var element = document.getElementById("image-preview-edit")
    element.classList.remove("d-none")
    document.getElementById("image-preview-edit").style.display = "block"

    var oFReader = new FileReader()
    oFReader.readAsDataURL(document.getElementById("image-source-edit").files[0])
    oFReader.onload = function(oFREvent) {
    document.getElementById("image-preview-edit").src = oFREvent.target.result
  }
}

function previewImage() {
    var element = document.getElementById("image-preview")
    element.classList.remove("d-none")
    document.getElementById("image-preview").style.display = "block"

    var oFReader = new FileReader()
    oFReader.readAsDataURL(document.getElementById("image-source").files[0])
    oFReader.onload = function(oFREvent) {
    document.getElementById("image-preview").src = oFREvent.target.result
  }
}

function previewImage2() {
    var element = document.getElementById("image-preview2")
    element.classList.remove("d-none")
    document.getElementById("image-preview2").style.display = "block"

    var oFReader = new FileReader()
    oFReader.readAsDataURL(document.getElementById("image-source2").files[0])
    oFReader.onload = function(oFREvent) {
    document.getElementById("image-preview2").src = oFREvent.target.result
  }
}

function previewImage3() {
    var element = document.getElementById("image-preview3")
    element.classList.remove("d-none")
    document.getElementById("image-preview3").style.display = "block"

    var oFReader = new FileReader()
    oFReader.readAsDataURL(document.getElementById("image-source3").files[0])
    oFReader.onload = function(oFREvent) {
    document.getElementById("image-preview3").src = oFREvent.target.result
  }
}

function previewImage4() {
    var element = document.getElementById("image-preview3")
    element.classList.remove("d-none")
    document.getElementById("image-preview4").style.display = "block"

    var oFReader = new FileReader()
    oFReader.readAsDataURL(document.getElementById("image-source4").files[0])
    oFReader.onload = function(oFREvent) {
    document.getElementById("image-preview4").src = oFREvent.target.result
  }
}

function previewImage5() {
    var element = document.getElementById("image-preview3")
    element.classList.remove("d-none")
    document.getElementById("image-preview5").style.display = "block"

    var oFReader = new FileReader()
    oFReader.readAsDataURL(document.getElementById("image-source5").files[0])
    oFReader.onload = function(oFREvent) {
    document.getElementById("image-preview5").src = oFREvent.target.result
  }
}

$('.btn-edit-banner').click(function(){
    var id = $(this).attr('data-id')

    $.ajax({
        url: baseUrl + 'admin/konten/editBanner/' + id,
        type: 'get',
        beforeSend: function(){
            $('.edit-content').empty()
            $('#modalEdit').modal('show')
        },
        success: function(res){
            $('.edit-content').html(res)
        }
    })
})