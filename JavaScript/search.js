// Wait for the DOM to be fully loaded before executing the code
document.addEventListener('DOMContentLoaded', function() {

    // Get references to relevant HTML elements
    const searchBar = document.getElementById('searchBar');
    const searchResultsContainer = document.getElementById('searchResults');
    const searchIcon = document.querySelector('.search-icon');
    const suggestionsContainer = document.getElementById('suggestionsContainer');

    // Function to fetch and display search results based on the provided keyword
    const showSearchResults = (keyword) => {
        if (keyword.trim() !== '') {
            // Fetch search results from the backend
            fetch(`Backend/backend-search.php?keyword=${keyword}`)
                .then(response => response.json())
                .then(data => {
                    // Check if there are any search results
                    if (data.length > 0) {
                        // Create HTML markup for each product and display in the results container
                        const resultsHTML = data.map(product => `
                            <a href="#coll" id="link">
                                <div class="product">
                                    <img src="${product.product_image}" alt="${product.product_name}">
                                    <h6>${product.product_name}</h6>
                                    <p>Price: ${product.price}</p>
                                    <form method="POST" action="Backend/backend-addtocart.php">
                                        <input type="hidden" name="product_id" value="${product.product_id}">
                                        <button type="submit" id="addtocart">Add to Cart</button>
                                    </form>
                                </div>
                            </a>
                        `).join('');
                        // Update the search results container with the generated HTML
                        searchResultsContainer.innerHTML = resultsHTML;
                        // Hide suggestions container
                        suggestionsContainer.style.display = 'none';
                    } else {
                        // Display a message if no products are found
                        searchResultsContainer.innerHTML = '<p>No products found.</p>';
                    }
                })
                .catch(error => console.error('Error:', error));
        } else {
            // Clear search results if the search bar is empty
            searchResultsContainer.innerHTML = '';
        }
    };

    // Function to fetch and display search suggestions based on the input value
    const showSuggestions = (input) => {
        const inputValue = input.value.trim().toLowerCase();

        // Hide suggestions container if the input is empty
        if (inputValue === '') {
            suggestionsContainer.style.display = 'none';
            suggestionsContainer.innerHTML = '';
            return;
        }

        // Fetch suggestions from the backend
        fetch(`Backend/backend-suggestions.php?keyword=${inputValue}`)
            .then(response => response.json())
            .then(data => {
                suggestionsContainer.innerHTML = '';
                // Create suggestion items for each suggestion and display in the suggestions container
                data.forEach(suggestion => {
                    const suggestionItem = document.createElement('div');
                    suggestionItem.classList.add('suggestions-item');
                    suggestionItem.textContent = suggestion.product_name;

                    // Add click event listener to handle suggestion click
                    suggestionItem.addEventListener('click', () => {
                        searchBar.value = suggestion.product_name;
                        suggestionsContainer.style.display = 'none';
                        showSearchResults(suggestion.product_name);
                    });

                    suggestionsContainer.appendChild(suggestionItem);
                });

                // Show suggestions container
                suggestionsContainer.style.display = 'block';
            })
            .catch(error => console.error('Error:', error));
    };

    // Event listener for handling 'Enter' key press in the search bar
    searchBar.addEventListener('keyup', function (event) {
        if (event.key === 'Enter') {
            const inputValue = this.value.toLowerCase();
            // Show search results and hide suggestions on 'Enter'
            showSearchResults(inputValue);
            suggestionsContainer.style.display = 'none';
        }
    });

    // Event listener for handling click on the search icon
    searchIcon.addEventListener('click', function() {
        // Show search results when the search icon is clicked
        showSearchResults(searchBar.value);
    });

    // Event listener for handling 'Enter' key press in the search bar (keydown event)
    searchBar.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            // Show search results and hide suggestions on 'Enter'
            showSearchResults(searchBar.value);
        }
    });

    // Event listener for handling input changes in the search bar
    searchBar.addEventListener('input', function () {
        // Show suggestions based on the input value
        showSuggestions(this);
    });

    // Event listener for handling 'Enter' key press on selected suggestion
    searchBar.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            const selectedSuggestion = suggestionsContainer.querySelector('.selected');
            if (selectedSuggestion) {
                // Update search bar with selected suggestion and show corresponding search results
                searchBar.value = selectedSuggestion.textContent;
                suggestionsContainer.style.display = 'none';
                showSearchResults(selectedSuggestion.textContent);
            }
        }
    });

});