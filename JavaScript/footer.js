// Waiting for the DOM content to be fully loaded before executing the JavaScript code
document.addEventListener("DOMContentLoaded", function () {
    
    // Selecting necessary DOM elements
    const emailInput = document.querySelector('.news-email input');
    const subscribeButton = document.querySelector('.news-email button');
    const thanksMessage = document.createElement('div');
    const checkIcon = document.createElement('i');

    // Adding classes to the checkIcon element
    checkIcon.classList.add('fa-solid', 'fa-circle-check');
    
    // Appending the checkIcon and text to the thanksMessage div
    thanksMessage.appendChild(checkIcon);
    thanksMessage.appendChild(document.createTextNode(' Thanks for subscribing'));
    thanksMessage.classList.add('subscription-message');

    // Function to handle subscription action
    function subscribeAction() {
        // Checking if the email input is not empty
        if (emailInput.value !== '') {
            // Clearing the email input
            emailInput.value = '';
            // Appending the thanksMessage to the parent of the email input
            emailInput.parentElement.appendChild(thanksMessage);
        }
    }

    // Adding a click event listener to the subscribeButton
    subscribeButton.addEventListener('click', subscribeAction);

    // Adding a keyup event listener to the emailInput to handle Enter key press
    emailInput.addEventListener('keyup', function(event) {
        // Checking if the pressed key is Enter
        if (event.key === 'Enter') {
            // Triggering the subscribeAction function
            subscribeAction();
        }
    });
});