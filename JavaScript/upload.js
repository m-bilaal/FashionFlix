// Get references to HTML elements
let productname = document.getElementById("productname");
let price = document.getElementById("price");
let discount = document.getElementById("discount");
let uploadImage = document.getElementById("imageUpload");
let choose = document.getElementById("choose");

// Function to trigger the file upload input when the "Choose Image" button is clicked
function upload() {
    uploadImage.click();
}

// Add an event listener to the "Choose Image" button to trigger the file upload
choose.addEventListener('click', upload);

// Add an event listener to the file upload input to handle changes
uploadImage.addEventListener("change", function() {
    // Get the selected file from the input
    let file = this.files[0];

    // Check if the product name input is empty
    if (productname.value == "") {
        // Set the product name input value to the name of the selected file
        productname.value = file.name;
    }

    // Update the text of the "Choose Image" button to indicate the selected file
    choose.innerHTML = "You can change (" + file.name + ") picture";
});