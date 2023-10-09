
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
