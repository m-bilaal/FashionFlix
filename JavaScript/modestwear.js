// Select the 'showMoreBtn' button by its ID
const showMoreBtn = document.getElementById('showMoreBtn');

// Select the elements to toggle visibility
const itemsToToggle = document.querySelector('.items-11-to-20');

// Add a click event listener to the 'showMoreBtn' button
showMoreBtn.addEventListener('click', function() {
    // Check if the style display property of 'itemsToToggle' is 'none' or empty
    if (itemsToToggle.style.display === 'none' || itemsToToggle.style.display === '') {
        // If hidden, display the items and update button text
        itemsToToggle.style.display = 'block';
        showMoreBtn.textContent = 'Show Less';
    } else {
        // If visible, hide the items and update button text
        itemsToToggle.style.display = 'none';
        showMoreBtn.textContent = 'Show More';
    }
});