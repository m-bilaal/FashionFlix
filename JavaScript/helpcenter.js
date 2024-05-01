// Select all elements with the class 'faq-item'
const faqItems = document.querySelectorAll('.faq-item');

// Iterate over each FAQ item
faqItems.forEach(item => {
    // Select the FAQ answer and create plus/minus icons
    const faqAnswer = item.querySelector('.faq-answer');
    const plusIcon = document.createElement('i');
    const minusIcon = document.createElement('i');

    // Add classes to the icons and initially hide the minus icon
    plusIcon.classList.add('fas', 'fa-plus');
    minusIcon.classList.add('fas', 'fa-minus');
    minusIcon.style.display = 'none';

    // Insert icons before the line break tag
    const brTag = item.querySelector('br');
    brTag.parentNode.insertBefore(plusIcon, brTag);
    brTag.parentNode.insertBefore(minusIcon, brTag);

    // Function to calculate the total visible height of FAQ answers
    const calculateTotalVisibleHeight = () => {
        const visibleAnswers = document.querySelectorAll('.faq-answer.visible');
        let totalHeight = 1338; // Initial height

        visibleAnswers.forEach(answer => {
            totalHeight += answer.scrollHeight;
        });

        return totalHeight;
    };

    // Function to toggle the visibility of FAQ answers
    const toggleContent = () => {
        const isVisible = faqAnswer.classList.contains('visible');
        const helpBody = document.querySelector('.help-body');
        const visibleHeight = calculateTotalVisibleHeight();

        if (isVisible) {
            // Hide the FAQ answer
            faqAnswer.classList.remove('visible');
            faqAnswer.style.maxHeight = '0px';
            setTimeout(() => {
                faqAnswer.style.display = 'none';
                helpBody.style.height = `${visibleHeight}px`;
            }, 300);
            plusIcon.style.display = 'inline';
            minusIcon.style.display = 'none';
        } else {
            // Show the FAQ answer
            faqAnswer.classList.add('visible');
            faqAnswer.style.display = 'block';
            faqAnswer.style.maxHeight = faqAnswer.scrollHeight + 'px';
            helpBody.style.height = `${visibleHeight + faqAnswer.scrollHeight}px`;
            plusIcon.style.display = 'none';
            minusIcon.style.display = 'inline';
        }
    };

    // Check if the FAQ answer is initially visible
    if (minusIcon.style.display === 'inline') {
        faqAnswer.classList.add('visible');
        faqAnswer.style.display = 'block';
        faqAnswer.style.maxHeight = 'none';
        document.querySelector('.help-body').style.height = `${document.querySelector('.help-body').offsetHeight + faqAnswer.scrollHeight}px`;
    } else {
        faqAnswer.classList.remove('visible');
        faqAnswer.style.display = 'none';
        faqAnswer.style.maxHeight = '0px';
    }

    // Add click event listeners to the plus and minus icons
    plusIcon.addEventListener('click', toggleContent);
    minusIcon.addEventListener('click', toggleContent);
});