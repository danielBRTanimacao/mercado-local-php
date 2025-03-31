let clicked = false;
const filterActive = document.querySelector("#id_filter");

filterActive.addEventListener("click", () => {
    const filterContainer = document.querySelector("div.container_filters");
    filterContainer.classList.toggle("hidden");
    clicked = !clicked;
});

const searchInput = document.querySelector("#id_search");
searchInput.addEventListener("input", () => {
    const searchValue = searchInput.value.toLowerCase();
    const rows = document.querySelectorAll("tbody tr");

    rows.forEach((row) => {
        const nameCell = row.querySelector("td:nth-child(3)");
        if (nameCell) {
            const nameText = nameCell.textContent.toLowerCase();
            row.style.display = nameText.includes(searchValue) ? "" : "none";
        }
    });
});
