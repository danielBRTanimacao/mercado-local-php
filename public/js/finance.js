const getGraph = (plotName, title, listx, listy, typeGraph) => {
    const xArray = listx;
    const yArray = listy;

    const data = [
        {
            x: xArray,
            y: yArray,
            type: typeGraph,
            orientation: "v",
            marker: { color: "#101828" },
        },
    ];

    const layout = { title: title };

    Plotly.newPlot(plotName, data, layout);
};

getGraph(
    "myPlot",
    "Venda esta semana",
    ["Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sabado"],
    [55, 49, 44, 24, 15],
    "bar"
);

getGraph(
    "plotCircleMonth",
    "Venda mensal",
    ["Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sabado"],
    [55, 49, 44, 24, 15],
    "doughnut"
);

getGraph(
    "plotCircle",
    "Venda de hoje",
    ["Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sabado"],
    [55, 49, 44, 24, 15],
    "doughnut"
);
