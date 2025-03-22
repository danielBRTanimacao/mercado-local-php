const ctx = document.getElementById("myChart");
const ctxDay = document.getElementById("chartDayCircle");
const ctxMonth = document.getElementById("chartMonthCircle");
const errorTxt = document.querySelector("h2.error");

const getSales = async () => {
    try {
        const response = await fetch(
            "http://localhost:8080/models/getSales.php/",
            { method: "GET" }
        );

        if (!response.ok) {
            errorTxt.classList.remove("hidden");
            errorTxt.innerHtml =
                "Erro ao buscar os valores. Error: " + response.status;
        }

        const json = response.json();
        console.log(json);

        const dataWeek = {
            labels: [
                "Segunda",
                "Terça",
                "Quarta",
                "Quinta",
                "Sexta",
                "Sabado",
                "Domingo",
            ],
            datasets: [
                {
                    label: "Vendas esta semana",
                    data: json,
                    borderWidth: 1,
                },
            ],
        };

        const dataDay = {
            labels: ["Hoje", "Anterior"],
            datasets: [
                {
                    label: "Ganhos",
                    data: [1, 15],
                    backgroundColor: ["#101828", "rgb(212, 212, 212)"],
                    hoverOffset: 4,
                },
            ],
        };

        const dataMonth = {
            labels: ["Mês atual", "Anterior"],
            datasets: [
                {
                    label: "Ganhos mensal",
                    data: [105, 53],
                    backgroundColor: ["#101828", "rgb(212, 212, 212)"],
                    hoverOffset: 4,
                },
            ],
        };

        new Chart(ctxDay, {
            type: "doughnut",
            data: dataDay,
        });

        new Chart(ctxMonth, {
            type: "doughnut",
            data: dataMonth,
        });
        new Chart(ctx, {
            type: "bar",
            data: dataWeek,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    } catch (error) {
        errorTxt.classList.remove("hidden");
        errorTxt.innerHtml = "Erro ao buscar os valores. Error: " + error;
    }
};

getSales();
