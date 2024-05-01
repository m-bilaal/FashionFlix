// Retrieving references to the "Show More" button and the container of items 11 to 20
const showMoreBtn = document.getElementById('showMoreBtn');
const itemsToToggle = document.querySelector('.items-11-to-20');

// Adding a click event listener to the "Show More" button
showMoreBtn.addEventListener('click', function() {
    // Checking if the items are currently hidden or have no explicit display property
    if (itemsToToggle.style.display === 'none' || itemsToToggle.style.display === '') {
        // If hidden or no display property, set display to 'block', making the items visible
        itemsToToggle.style.display = 'block';
        // Update the button text to indicate "Show Less"
        showMoreBtn.textContent = 'Show Less';
    } else {
        // If visible, hide the items by setting display to 'none'
        itemsToToggle.style.display = 'none';
        // Update the button text to indicate "Show More"
        showMoreBtn.textContent = 'Show More';
    }
});