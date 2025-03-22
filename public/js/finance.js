const ctx = document.getElementById("myChart");
const ctxDay = document.getElementById("chartDayCircle");
const ctxMonth = document.getElementById("chartMonthCircle");
const errorTxt = document.querySelector("h2.error");

const getSales = () => {
    fetch("http://localhost:8080/models/getSales.php/", { method: "GET" })
        .then((response) => response.json())
        .then((sales) => {
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
                        data: sales.week,
                        borderWidth: 1,
                    },
                ],
            };

            const dataDay = {
                labels: ["Hoje", "Anterior"],
                datasets: [
                    {
                        label: "Ganhos",
                        data: sales.day,
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
                        data: sales.month,
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
        })
        .catch((error) => {
            errorTxt.classList.remove("hidden");
            errorTxt.innerHtml = "Erro ao buscar os valores. Error: " + error;
        });
};

getSales();
