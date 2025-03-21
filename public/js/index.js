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
const confirmDelete = document.querySelector("button#confirmDelete");

document.querySelector("button#showDelete").addEventListener("click", (btn) => {
    if (!btnClicked) {
        btn.target.innerHTML = "Cancelar";
        hiddeTds.forEach((e) => {
            e.classList.remove("hidden");
        });
        btnClicked = true;
        confirmDelete.classList.remove("hidden");
    } else {
        btn.target.innerHTML = "Remover";
        hiddeTds.forEach((e) => {
            e.classList.add("hidden");
        });
        btnClicked = false;
        confirmDelete.classList.add("hidden");
    }
});

confirmDelete.addEventListener("click", () => {
    let ids = Array.from(document.querySelectorAll("a.idSales")).map((a) =>
        a.getAttribute("data-id")
    );

    allCheckers.forEach(() => {
        ids.forEach((id) => {
            fetch(`http://localhost:8080/models/delete.php/${id}`, {
                method: "DELETE",
            })
                .then((response) => response.json())
                .then((data) => console.log("Deletado:", data))
                .catch((error) => console.error("Erro ao deletar:", error));
        });
    });
});
