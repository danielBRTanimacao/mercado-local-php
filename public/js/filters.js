let clicked = false;
const filterActive = document.querySelector("button#id_filter");

filterActive.addEventListener("click", () => {
    if (!clicked) {
        document
            .querySelector("div.container_filters")
            .classList.remove("hidden");
        clicked = true;
    } else {
        document.querySelector("div.container_filters").classList.add("hidden");
        clicked = false;
    }
});
