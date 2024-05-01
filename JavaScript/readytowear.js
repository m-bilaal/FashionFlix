// Select the 'showMoreBtn' button element using its ID
const showMoreBtn = document.getElementById('showMoreBtn');

// Select the elements to be toggled for visibility
const itemsToToggle = document.querySelector('.items-11-to-20');

// Add a click event listener to the 'showMoreBtn' button
showMoreBtn.addEventListener('click', function() {
    // Check if the 'display' style property of 'itemsToToggle' is 'none' or empty
    if (itemsToToggle.style.display === 'none' || itemsToToggle.style.display === '') {
        // If hidden, set the 'display' property to 'block' to show the items
        itemsToToggle.style.display = 'block';
        // Change the button text to 'Show Less'
        showMoreBtn.textContent = 'Show Less';
    } else {
        // If visible, set the 'display' property to 'none' to hide the items
        itemsToToggle.style.display = 'none';
        // Change the button text to 'Show More'
        showMoreBtn.textContent = 'Show More';
    }
});