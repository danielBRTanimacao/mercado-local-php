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
    const errorP = document.querySelector("p.error");
    const selectedCheckers = document.querySelectorAll(
        "input#checkersDelete:checked"
    );
    const ids = Array.from(selectedCheckers)
        .map((checkbox) => {
            let row = checkbox.closest("tr");
            let idElement = row.querySelector("a.idSales");
            return idElement ? idElement.getAttribute("data-id") : null;
        })
        .filter((id) => id !== null);

    if (ids.length === 0) {
        errorP.innerHTML = "Nenhum item selecionado para exclusão.";
        errorP.classList.remove("hidden");
        return;
    }

    ids.forEach((id) => {
        fetch(`http://localhost:8080/models/delete.php/${id}`, {
            method: "DELETE",
        })
            .then((response) => response.json())
            .then(() => {
                location.reload();
            })
            .catch((error) => {
                errorP.innerHTML = `Erro ao deletar: ${error}`;
                errorP.classList.remove("hidden");
            });
    });
});
