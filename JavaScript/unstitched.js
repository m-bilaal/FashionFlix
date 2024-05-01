// Get the button element with ID 'showMoreBtn'
const showMoreBtn = document.getElementById('showMoreBtn');

// Get the element with class 'items-11-to-20' to toggle its display
const itemsToToggle = document.querySelector('.items-11-to-20');

// Add a click event listener to the 'showMoreBtn'
showMoreBtn.addEventListener('click', function() {
    // Check if the 'itemsToToggle' is currently hidden or has no explicit display property
    if (itemsToToggle.style.display === 'none' || itemsToToggle.style.display === '') {
        // If hidden or no display property, show the 'itemsToToggle'
        itemsToToggle.style.display = 'block';
        
        // Change the button text to 'Show Less'
        showMoreBtn.textContent = 'Show Less';
    } else {
        // If visible, hide the 'itemsToToggle'
        itemsToToggle.style.display = 'none';
        
        // Change the button text to 'Show More'
        showMoreBtn.textContent = 'Show More';
    }
});