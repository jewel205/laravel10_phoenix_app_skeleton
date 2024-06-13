document.getElementById('images').addEventListener('change', function() {
    var previewContainer = document.getElementById('preview-container');
    var files = this.files;

    // Clear previous previews
    previewContainer.innerHTML = '';

    if (files.length > 10) {
        alert("Cannot upload more than 10 images.");
        // Clear the file input value
        this.value = '';
        return; // Exit the function
    }

    for (var i = 0; i < files.length; i++) {
        (function(file) { // Create closure to capture file in the scope
            var reader = new FileReader();

            reader.onload = function(event) {
                var imageContainer = document.createElement('div');
                imageContainer.className = 'preview-image';

                var image = document.createElement('img');
                image.src = event.target.result;

                var removeButton = document.createElement('button');
                removeButton.innerHTML = '<i class="fas fa-trash"></i>';
                removeButton.className = 'remove-button';
                removeButton.addEventListener('click', function() {
                    // Remove the preview
                    imageContainer.remove();
                    // Remove the corresponding file from the input file array
                    updateFileArray(file.name);
                });

                imageContainer.appendChild(image);
                imageContainer.appendChild(removeButton);
                previewContainer.appendChild(imageContainer);
            };

            reader.readAsDataURL(file);
        })(files[i]); // Pass the current file into the closure
    }
});

function updateFileArray(fileNameToRemove) {
    var inputFiles = document.getElementById('images').files;
    var newFiles = [];
    for (var i = 0; i < inputFiles.length; i++) {
        if (inputFiles[i].name !== fileNameToRemove) {
            newFiles.push(inputFiles[i]);
        }
    }

    // Create a DataTransfer object to create a new FileList
    var dataTransfer = new DataTransfer();
    for (var j = 0; j < newFiles.length; j++) {
        dataTransfer.items.add(newFiles[j]);
    }

    // Set the new FileList to the input field
    document.getElementById('images').files = dataTransfer.files;
}
