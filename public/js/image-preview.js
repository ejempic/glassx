// Function to open the file input when clicking the image placeholder
function openFileInput(container) {
    $(container).parent().find('.image-upload').click()
}

// Function to display a preview of the selected image
function previewImage(input) {
    var preview = $(input).parent().find('.image-preview')[0]

    var file = input.files[0];

    if (file) {
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.style.backgroundImage = `url(${e.target.result})`;
            preview.style.backgroundSize = 'cover';
            preview.style.backgroundPosition = 'center';
            preview.textContent = '';
        }

        reader.readAsDataURL(file);
    } else {
        // If no file is selected, display the placeholder text
        preview.style.backgroundImage = 'none';
        preview.style.backgroundColor = '#f0f0f0';
        preview.textContent = 'Click here to upload an image';
    }
}
