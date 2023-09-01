function changeImage() {
    var selectedImage = document.getElementById("selectedImage");
    var imageInput = document.getElementById("productImage");

    if (imageInput.files && imageInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            selectedImage.src = e.target.result;
        };
        reader.readAsDataURL(imageInput.files[0]);
    }
}

document.getElementById("productImage").addEventListener("change", changeImage);
