
const container = document.getElementById("preview");
const content = document.getElementById("content");
const toggleButton = document.getElementById("preview-toggle-button");

toggleButton.addEventListener("click", () => {
    if (content.style.maxHeight === "0px") {
        content.style.maxHeight = "100%"; // Expand content
        container.classList.add("expanded");
    } else {
        content.style.maxHeight = "0px"; // Collapse content
        container.classList.remove("expanded");
    }
});

$(document).ready(function () {
    initializeApp()
});

function initializeApp(){
    // Get all input fields with the 'autocomplete-input' class
    const inputFields = $('.autocomplete-input');
    inputFields.each(function () {
        initializeAutocomplete($(this))
    });

    const dimensionsQuantity = $('.item-whq');
    dimensionsQuantity.each(function () {
        initializeWHQ($(this))
    });

}
