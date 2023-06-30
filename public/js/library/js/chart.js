Chart.defaults.global.defaultFontFamily = "Nunito";
Chart.defaults.global.defaultFontColor = '#888';
Chart.defaults.global.defaultFontSize = '14';

var ctx = document.getElementById('chart').getContext('2d');
var ctx_2 = document.getElementById('chart2').getContext('2d');
var ctx_3 = document.getElementById('chart3').getContext('2d');

var chart = new Chart(ctx, {

    type: 'line',
    // The data for our dataset
    data: {
        labels: ["January", "February", "March", "April", "May", "June"],
        // Information about the dataset
        datasets: [{
            label: "Views",
            backgroundColor: '#ffe6ce',
            borderColor: '#fff',
            borderWidth: "3",
            data: [196,132,215,362,210,252],
            pointRadius: 5,
            pointHoverRadius:5,
            pointHitRadius: 10,
            pointBackgroundColor: "#ffe6ce",
            pointHoverBackgroundColor: "#ffe6ce",
            pointBorderWidth: "2",
        }]
    },

    // Configuration options
    options: {

        layout: {
            padding: 10,
        },

        legend: { display: false },
        title:  { display: false },

        scales: {
            yAxes: [{
                scaleLabel: {
                    display: false
                },
                gridLines: {
                    borderDash: [6, 10],
                    color: "#d8d8d8",
                    lineWidth: 1,
                },
            }],
            xAxes: [{
                scaleLabel: { display: false },
                gridLines:  { display: false },
            }],
        },

        tooltips: {
            backgroundColor: '#333',
            titleFontSize: 13,
            titleFontColor: '#fff',
            bodyFontColor: '#fff',
            bodyFontSize: 13,
            displayColors: false,
            xPadding: 10,
            yPadding: 10,
            intersect: false
        }
    },
});

var chart = new Chart(ctx_2, {

    type: 'line',
    // The data for our dataset
    data: {
        labels: ["January", "February", "March", "April", "May", "June"],
        // Information about the dataset
        datasets: [{
            label: "Views",
            backgroundColor: '#ffe6ce',
            borderColor: '#fff',
            borderWidth: "3",
            data: [196,132,215,362,210,252],
            pointRadius: 5,
            pointHoverRadius:5,
            pointHitRadius: 10,
            pointBackgroundColor: "#ffe6ce",
            pointHoverBackgroundColor: "#ffe6ce",
            pointBorderWidth: "2",
        }]
    },

    // Configuration options
    options: {

        layout: {
            padding: 10,
        },

        legend: { display: false },
        title:  { display: false },

        scales: {
            yAxes: [{
                scaleLabel: {
                    display: false
                },
                gridLines: {
                    borderDash: [6, 10],
                    color: "#d8d8d8",
                    lineWidth: 1,
                },
            }],
            xAxes: [{
                scaleLabel: { display: false },
                gridLines:  { display: false },
            }],
        },

        tooltips: {
            backgroundColor: '#333',
            titleFontSize: 13,
            titleFontColor: '#fff',
            bodyFontColor: '#fff',
            bodyFontSize: 13,
            displayColors: false,
            xPadding: 10,
            yPadding: 10,
            intersect: false
        }
    },
});

var chart = new Chart(ctx_3, {

    type: 'line',
    // The data for our dataset
    data: {
        labels: ["January", "February", "March", "April", "May", "June"],
        // Information about the dataset
        datasets: [{
            label: "Views",
            backgroundColor: '#ffe6ce',
            borderColor: '#fff',
            borderWidth: "3",
            data: [196,132,215,362,210,252],
            pointRadius: 5,
            pointHoverRadius:5,
            pointHitRadius: 10,
            pointBackgroundColor: "#ffe6ce",
            pointHoverBackgroundColor: "#ffe6ce",
            pointBorderWidth: "2",
        }]
    },

    // Configuration options
    options: {

        layout: {
            padding: 0,
        },

        legend: { display: false },
        title:  { display: false },

        scales: {
            yAxes: [{
                scaleLabel: {
                    display: false
                },
                gridLines: {
                    borderDash: [6, 10],
                    color: "#d8d8d8",
                    lineWidth: 1,
                },
            }],
            xAxes: [{
                scaleLabel: { display: false },
                gridLines:  { display: false },
            }],
        },

        tooltips: {
            backgroundColor: '#333',
            titleFontSize: 13,
            titleFontColor: '#fff',
            bodyFontColor: '#fff',
            bodyFontSize: 13,
            displayColors: false,
            xPadding: 10,
            yPadding: 10,
            intersect: false
        }
    },
});
