const ctx = document.getElementById("myChart");
const ctxDay = document.getElementById("chartDayCircle");
const ctxMonth = document.getElementById("chartMonthCircle");

new Chart(ctx, {
    type: "bar",
    data: {
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
                data: [23, 12, 54, 24, 15, 1],
                borderWidth: 1,
            },
        ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});

const dataDay = {
    labels: ["Hoje", "Anterior"],
    datasets: [
        {
            label: "Ganhos",
            data: [300, 50],
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
            data: [56, 23],
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
