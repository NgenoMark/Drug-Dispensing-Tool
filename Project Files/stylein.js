// Get references to elements
const catSelect = document.getElementById('cat');
const descriptionButton = document.getElementById('description-button');
const descriptionText = document.getElementById('description-text');

// Define descriptions for each option
const descriptions = {
    Analgesics: 'Pain relievers',
    Antibiotics: 'Bacterial infection treatment',
    Antivirals: 'Antiviral agents',
    Antifungals: 'Fungal infection treatment',
    Antidepressants: 'Mood disorder treatment',
    Antihistamines: 'Allergy symptom relief',
};

// Add a change event listener to the select element
catSelect.addEventListener('change', function () {
    const selectedOption = catSelect.value;
    if (descriptions[selectedOption]) {
        descriptionText.textContent = descriptions[selectedOption];
        descriptionButton.style.display = 'block'; // Show the "Description" button
    } else {
        descriptionText.textContent = '';
        descriptionButton.style.display = 'none'; // Hide the "Description" button if no description exists
    }
});

// Add a click event listener to the "Description" button
descriptionButton.addEventListener('click', function () {
    descriptionText.classList.toggle('open');
});
