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

let btnClicked = false;
const allCheckers = document.querySelectorAll("input#checkersDelete");
const hiddeTds = document.querySelectorAll("#hiddeTd");
document.querySelector("button#showDelete").addEventListener("click", (btn) => {
    if (!btnClicked) {
        btn.target.innerHTML = "Cancelar";
        hiddeTds.forEach((e) => {
            e.classList.remove("hidden");
        });
        btnClicked = true;
    } else {
        btn.target.innerHTML = "Remover";
        hiddeTds.forEach((e) => {
            e.classList.add("hidden");
        });
        btnClicked = false;
    }
});
