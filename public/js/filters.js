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

document.addEventListener("DOMContentLoaded", function () {
    const priceFilterRadios = document.querySelectorAll(
        'input[name="filter_chosed"]'
    );

    priceFilterRadios.forEach((radio) => {
        radio.addEventListener("change", function () {
            sortTableByPrice(this.value);
        });
    });

    function sortTableByPrice(order) {
        let table = document.querySelector("tbody");
        let rows = Array.from(table.querySelectorAll("tr"));

        rows.sort((a, b) => {
            let priceA = parseFloat(
                a
                    .querySelector("#most-expensive")
                    .innerText.replace("R$ ", "")
                    .replace(",", ".")
            );
            let priceB = parseFloat(
                b
                    .querySelector("#most-expensive")
                    .innerText.replace("R$ ", "")
                    .replace(",", ".")
            );

            return order === "big_value" ? priceB - priceA : priceA - priceB;
        });

        rows.forEach((row) => table.appendChild(row));
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const priceFilterRadios = document.querySelectorAll(
        'input[name="filter_chosed"]'
    );
    const dateFilterRadios = document.querySelectorAll(
        'input[name="filter_chosed_data"]'
    );

    priceFilterRadios.forEach((radio) => {
        radio.addEventListener("change", function () {
            sortTable("price", this.value);
        });
    });

    dateFilterRadios.forEach((radio) => {
        radio.addEventListener("change", function () {
            sortTable("date", this.value);
        });
    });

    function sortTable(type, order) {
        let table = document.querySelector("tbody");
        let rows = Array.from(table.querySelectorAll("tr"));

        rows.sort((a, b) => {
            if (type === "price") {
                let priceA = parseFloat(
                    a
                        .querySelector("#most-expensive")
                        .innerText.replace("R$ ", "")
                        .replace(",", ".")
                );
                let priceB = parseFloat(
                    b
                        .querySelector("#most-expensive")
                        .innerText.replace("R$ ", "")
                        .replace(",", ".")
                );
                return order === "big_value"
                    ? priceB - priceA
                    : priceA - priceB;
            } else if (type === "date") {
                let dateA = new Date(
                    a
                        .querySelector("#date-buy")
                        .innerText.split("/")
                        .reverse()
                        .join("-")
                );
                let dateB = new Date(
                    b
                        .querySelector("#date-buy")
                        .innerText.split("/")
                        .reverse()
                        .join("-")
                );
                return order === "big_date" ? dateB - dateA : dateA - dateB;
            }
        });

        rows.forEach((row) => table.appendChild(row));
    }
});
