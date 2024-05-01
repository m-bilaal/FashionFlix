// DOM elements
const searchBar = document.getElementById('searchBar');
const suggestionsContainer = document.getElementById('suggestionsContainer');

// Object to store product data
const productsData = {};

// Function to display suggestions based on user input
function showSuggestions(input) {
    const inputValue = input.value.toLowerCase();

    // Filtering products based on input
    const filteredProducts = Object.keys(productsData).filter(product =>
        product.toLowerCase().includes(inputValue)
    );

    // Handling display and content of suggestions container
    if (inputValue === '') {
        suggestionsContainer.style.display = 'none';
        suggestionsContainer.innerHTML = '';
        return;
    }

    suggestionsContainer.innerHTML = '';
    filteredProducts.forEach(product => {
        // Creating suggestion link and item
        const productLink = document.createElement('a');
        productLink.href = productsData[product];
        productLink.classList.add('suggestions-item');
        productLink.addEventListener('click', (event) => {
            event.stopPropagation();
        });

        const suggestionItem = document.createElement('div');
        suggestionItem.textContent = product;

        // Appending link and item to container
        productLink.appendChild(suggestionItem);
        suggestionsContainer.appendChild(productLink);
    });

    suggestionsContainer.style.display = 'block';

    // Setting the search icon link to the first product URL
    if (filteredProducts.length > 0) {
        const firstProductUrl = productsData[filteredProducts[0]];
        document.querySelector('.search-icon a').href = firstProductUrl;
    }
}

// Event listener for input changes to trigger showSuggestions
searchBar.addEventListener('input', function () {
    showSuggestions(this);
});

// Event listener to hide suggestions container when clicking outside
document.addEventListener('click', function (event) {
    if (!event.target.closest('.nav-search')) {
        suggestionsContainer.style.display = 'none';
    }
});

// Event listener to handle Enter key press and redirect to first suggestion
searchBar.addEventListener('keyup', function (event) {
    if (event.key === 'Enter') {
        const inputValue = this.value.toLowerCase();
        const filteredProducts = Object.keys(productsData).filter(product =>
            product.toLowerCase().includes(inputValue)
        );

        if (filteredProducts.length > 0) {
            window.location.href = productsData[filteredProducts[0]];
        }
    }
});

// Event listener for Enter key press on search icon
document.querySelector('.search-icon').addEventListener('keyup', function (event) {
    if (event.key === 'Enter') {
        const firstProductUrl = document.querySelector('.search-icon a').href;
        window.location.href = firstProductUrl;
    }
});

// Variable to keep track of selected suggestion index
let selectedSuggestionIndex = -1;

// Function to highlight the selected suggestion
function highlightSuggestion(index) {
    const suggestions = document.querySelectorAll('.suggestions-item');
    suggestions.forEach((suggestion, i) => {
        if (i === index) {
            suggestion.classList.add('selected');
        } else {
            suggestion.classList.remove('selected');
        }
    });
}

// Event listener for keydown on the search bar
searchBar.addEventListener('keydown', function (event) {
    const suggestions = document.querySelectorAll('.suggestions-item');

    // Check if there are suggestions
    if (suggestions.length > 0) {
        // Handle ArrowDown key
        if (event.key === 'ArrowDown') {
            event.preventDefault();
            selectedSuggestionIndex = (selectedSuggestionIndex + 1) % suggestions.length;
            highlightSuggestion(selectedSuggestionIndex);
            this.value = suggestions[selectedSuggestionIndex].textContent;
        } 
        // Handle ArrowUp key
        else if (event.key === 'ArrowUp') {
            event.preventDefault();
            if (selectedSuggestionIndex <= 0) {
                selectedSuggestionIndex = suggestions.length - 1;
            } else {
                selectedSuggestionIndex -= 1;
            }
            highlightSuggestion(selectedSuggestionIndex);
            this.value = suggestions[selectedSuggestionIndex].textContent;
        } 
        // Handle Enter key
        else if (event.key === 'Enter') {
            if (selectedSuggestionIndex !== -1) {
                const selectedProductLink = suggestions[selectedSuggestionIndex].querySelector('a');
                window.onload = function() {
                    window.location.href = selectedProductLink.href;
                }
            }
        }
    }
});

// Function to handle click on a suggestion
function handleSuggestionClick(suggestion) {
    searchBar.value = suggestion.textContent;
    suggestionsContainer.style.display = 'none';
    window.location.href = 'search.php?keyword=' + encodeURIComponent(suggestion.textContent);
}

// Event listener for clicks outside the search bar
document.addEventListener('click', function (event) {
    if (!event.target.closest('.nav-search')) {
        suggestionsContainer.style.display = 'none';
    }

    // Check if a suggestion was clicked
    const clickedSuggestion = event.target.closest('.suggestions-item');
    if (clickedSuggestion) {
        handleSuggestionClick(clickedSuggestion);
    }
});

// Event listener for keyup on the search bar
searchBar.addEventListener('keyup', function (event) {
    if (event.key === 'Enter') {
        const inputValue = this.value.toLowerCase();
        // Additional function to show search results
        showSearchResults(inputValue);
        suggestionsContainer.style.display = 'none';
    }
});

// Event listener for input changes in the search bar
searchBar.addEventListener('input', function () {
    showSuggestions(this);
});

// Event listener for keydown on the search bar
searchBar.addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        const selectedSuggestion = suggestionsContainer.querySelector('.selected');
        // Redirect to the selected suggestion on Enter key
        if (selectedSuggestion) {
            searchBar.value = selectedSuggestion.textContent;
            suggestionsContainer.style.display = 'none';
            window.location.href = 'search.php?keyword=' + encodeURIComponent(selectedSuggestion.textContent);
        }
    }
});

// Event listener for keyup on the search bar
searchBar.addEventListener('keyup', function (event) {
    if (event.key === 'Enter') {
        const inputValue = this.value.toLowerCase();
        // Redirect to search results page on Enter key
        window.location.href = `search.php?keyword=${encodeURIComponent(inputValue)}`;
        showSuggestions(this);
    }
});

// Event listener for click on the search icon
searchIcon.addEventListener('click', function () {
    const inputValue = searchBar.value.toLowerCase();
    // Redirect to search results page on search icon click
    window.location.href = `search.php?keyword=${encodeURIComponent(inputValue)}`;
});

// Event listener for keydown on the search bar
searchBar.addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        const selectedSuggestion = suggestionsContainer.querySelector('.selected');
        // Redirect to the selected suggestion on Enter key
        if (selectedSuggestion) {
            searchBar.value = selectedSuggestion.textContent;
            suggestionsContainer.style.display = 'none';
            window.location.href = `search.php?keyword=${encodeURIComponent(selectedSuggestion.textContent)}`;
        } else {
            const inputValue = this.value.toLowerCase();
            // Redirect to search results page on Enter key
            window.location.href = `search.php?keyword=${encodeURIComponent(inputValue)}`;
        }
    }
});