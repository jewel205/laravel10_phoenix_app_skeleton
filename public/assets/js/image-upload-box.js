document.querySelector('.image-upload-box').addEventListener('click', function() {
    document.querySelector('.formFileSm').click();
});

    document.querySelector('.formFileSm').addEventListener('change', function() {
    const file = this.files[0];
    const imageType = /image.*/;

    if (file && file.type.match(imageType)) {
    const reader = new FileReader();

    reader.onload = function(e) {
    const img = document.querySelector('.uploaded-image');
    img.src = e.target.result;
    img.style.display = 'block';
    document.querySelector('.upload-icon').style.display = 'none';
    document.querySelector('.edit-icon').style.display = 'block';
}

    reader.readAsDataURL(file);
}
});

document.querySelector('.image-upload-box').addEventListener('click', function(event) {
    const fileInput = document.querySelector('.formFileSm');
    const removeIcon = document.getElementById('editImage');

    if (event.target === removeIcon) {
        const img = document.querySelector('.uploaded-image');
        img.src = '#';
        img.style.display = 'none';
        document.querySelector('.upload-icon').style.display = 'block';
        removeIcon.style.display = 'none'; // Hide the remove icon
        fileInput.value = '';
    }
});












