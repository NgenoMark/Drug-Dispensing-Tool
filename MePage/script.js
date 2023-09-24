const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
  });
});

prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") &&
      formStep.classList.remove("form-step-active");
  });

  formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
    } else {
      progressStep.classList.remove("progress-step-active");
    }
  });

  const progressActive = document.querySelectorAll(".progress-step-active");

  progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}




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
