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

$('#summernote').summernote()