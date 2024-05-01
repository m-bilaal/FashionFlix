// Get a reference to the 'Show More' button
const showMoreBtn = document.getElementById('showMoreBtn');

// Get a reference to the items you want to toggle
const itemsToToggle = document.querySelector('.items-11-to-20');

// Add a click event listener to the 'Show More' button
showMoreBtn.addEventListener('click', function() {
    // Check if the items are currently hidden or have no specified display property
    if (itemsToToggle.style.display === 'none' || itemsToToggle.style.display === '') {
        // If hidden or no display property, show the items
        itemsToToggle.style.display = 'block';
        // Change the button text to 'Show Less'
        showMoreBtn.textContent = 'Show Less';
    } else {
        // If visible, hide the items
        itemsToToggle.style.display = 'none';
        // Change the button text to 'Show More'
        showMoreBtn.textContent = 'Show More';
    }
});