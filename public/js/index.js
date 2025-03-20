document.getElementById("openModal").addEventListener("click", () => {
    document.getElementById("modal").classList.remove("hidden");
});

document.getElementById("closeModal").addEventListener("click", () => {
    document.getElementById("modal").classList.add("hidden");
});

document.getElementById("modal").addEventListener("click", (event) => {
    if (event.target === document.getElementById("modal")) {
        document.getElementById("modal").classList.add("hidden");
    }
});

const allCheckers = document.querySelectorAll("input#checkersDelete");
document.querySelector("button#showDelete").addEventListener("click", () => {});
