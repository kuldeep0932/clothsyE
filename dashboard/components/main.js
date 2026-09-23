// $(document).ready(function () {
//         $('#DataTables_Table_0').DataTable({
//             autoWidth: false,
//             responsive: true,
//             columnDefs: [
//                 // {width: '5%', targets: 0},
//                 {width: '10%', targets: 0},
//                 {width: '30%', targets: 1},
//                 {width: '25%', targets: 2},
//                 {width: '15%', targets: 3},
//                 {width: '20%', targets: 4}
//             ]
//         });
//     });





// weekly chart js

var options = {
    series: [{
        name: 'Visitors',
        data: [40, 95, 60, 45, 90, 50, 75]
    }],

    chart: {
        type: 'bar',
        height: 120,
        width: 200,
        toolbar: {
            show: false
        },
        sparkline: {
            enabled: false
        }
    },

    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '60%',
            borderRadius: 7,
            borderRadiusApplication: 'around',
            distributed: true
        }
    },

    colors: [
        '#fcefee',
        '#fcefee',
        '#fcefee',
        '#fcefee',
        '#fcefee',
        '#ef2d19',
        '#fcefee'
    ],

    dataLabels: {
        enabled: false
    },

    xaxis: {
        categories: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],

        labels: {
            show: true,
            style: {
                colors: '#9da3aa',
                fontSize: '13px',
                fontWeight: 400
            },
            offsetY: -2
        },

        axisBorder: {
            show: false
        },

        axisTicks: {
            show: false
        }
    },

    yaxis: {
        show: false,
        min: 0,
        max: 100
    },

    grid: {
        show: false
    },

    tooltip: {
        enabled: false
    },

    legend: {
        show: false
    },

    states: {
        hover: {
            filter: {
                type: 'none'
            }
        },
        active: {
            filter: {
                type: 'none'
            }
        }
    }
};

var chart = new ApexCharts(
    document.querySelector('#weeklyChart'),
    options
);

chart.render();

// activity chart js

var options = {
    series: [
        {
            name: 'Activity',
            data: [38, 55, 43, 98, 30, 88, 63]
        }
    ],

    chart: {
        type: 'area',
        height: 110,
        width: 220,
        toolbar: {
            show: false
        },
        zoom: {
            enabled: false
        },
        sparkline: {
            enabled: false
        }
    },

    stroke: {
        curve: 'smooth',
        width: 2
    },

    fill: {
        type: 'gradient',
        gradient: {
            shadeIntensity: 0.7,
            opacityFrom: 0.35,
            opacityTo: 0.05,
            stops: [0, 85, 100]
        }
    },

    colors: ['#71dd37'],

    dataLabels: {
        enabled: false
    },

    markers: {
        size: 0,
        hover: {
            size: 0
        }
    },

    xaxis: {
        categories: [
            'Mo',
            'Tu',
            'We',
            'Th',
            'Fr',
            'Sa',
            'Su'
        ],

        labels: {
            show: true,
            offsetY: -2,
            style: {
                colors: '#9da3aa',
                fontSize: '13px',
                fontWeight: 400
            }
        },

        axisBorder: {
            show: false
        },

        axisTicks: {
            show: false
        },

        crosshairs: {
            show: false
        },

        tooltip: {
            enabled: false
        }
    },

    yaxis: {
        show: false,
        min: 0,
        max: 100
    },

    grid: {
        show: false
    },

    tooltip: {
        enabled: false
    },

    legend: {
        show: false
    },

    states: {
        hover: {
            filter: {
                type: 'none'
            }
        },
        active: {
            filter: {
                type: 'none'
            }
        }
    }
};

var chart = new ApexCharts(
    document.querySelector('#activityChart'),
    options
);

chart.render();


// profit chart js

var options = {
    series: [
        {
            name: "Series-1",
            data: [73, 56, 56, 100]
        },
        {
            name: "Series-2",
            data: [61, 42, 74, 72]
        }
    ],

    chart: {
        type: "bar",
        height: 105,
        width: 143,
        toolbar: {
            show: false,
            tools: {
                download: false,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false
            }
        }
    },

    colors: [
        "var(--bs-success)",
        "var(--bs-success-bg-subtle)"
    ],

    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: "34%",
            borderRadius: 3,
            borderRadiusApplication: "around",
            borderRadiusWhenStacked: "last"
        }
    },

    dataLabels: {
        enabled: false
    },

    stroke: {
        show: true,
        width: 5,
        colors: [
            "var(--bs-success)",
            "var(--bs-success-bg-subtle)"
        ],
        lineCap: "round"
    },

    xaxis: {
        categories: ["Jan", "Apr", "Jul", "Oct"],
        labels: {
            show: true,
            style: {
                fontSize: "13px",
                fontFamily: "Helvetica, Arial, sans-serif",
                fontWeight: 400,
                colors: "var(--bs-secondary-color)"
            }
        },
        axisBorder: {
            show: false
        },
        axisTicks: {
            show: false
        },
        tooltip: {
            enabled: false
        }
    },

    yaxis: {
        show: false,
        min: 0,
        max: 100
    },

    grid: {
        show: false,
        padding: {
            top: 0,
            right: 0,
            bottom: -4,
            left: 0
        }
    },

    legend: {
        show: false
    },

    tooltip: {
        enabled: true,
        theme: "light"
    },

    fill: {
        opacity: 1
    }
};

var chart = new ApexCharts(
    document.querySelector("#profitChart"),
    options
);

chart.render();



// expense chart js

const expensesChartOptions = {
    chart: {
        type: 'radialBar',
        width: 150,
        height: 124,
        offsetY: 0,
        sparkline: {
            enabled: true
        }
    },

    series: [78],

    colors: [
        'var(--bs-primary)'
    ],

    plotOptions: {
        radialBar: {
            startAngle: -90,
            endAngle: 90,

            hollow: {
                size: '78%'
            },

            track: {
                background: 'var(--bs-secondary-bg-subtle)',
                strokeWidth: '100%',
                margin: 0
            },

            dataLabels: {
                name: {
                    show: false
                },

                value: {
                    show: true,
                    offsetY: -5,
                    fontSize: '18px',
                    fontFamily: 'var(--bs-font-family-base)',
                    fontWeight: 500,
                    color: 'var(--bs-heading-color)',
                    formatter: function (val) {
                        return Math.round(val) + '%';
                    }
                }
            }
        }
    },

    fill: {
        type: 'solid',
        opacity: 0.85
    },

    stroke: {
        lineCap: 'round'
    },

    labels: ['Progress']
};

const expensesChartElement = document.querySelector('#expensesChart');

if (expensesChartElement) {
    const expensesChart = new ApexCharts(
        expensesChartElement,
        expensesChartOptions
    );

    expensesChart.render();
}

// total income chart js
const totalIncomeChartOptions = {
    chart: {
        type: 'area',
        height: 290,
        width: 512,
        toolbar: {
            show: false
        },
        zoom: {
            enabled: false
        },
        parentHeightOffset: 0,
        offsetX: 0,
        offsetY: 0
    },

    series: [
        {
            name: 'Series-1',
            data: [
                2350,
                3800,
                1950,
                1150,
                2750,
                800,
                1600,
                2200,
                3500,
                2750,
                4700,
                5700
            ]
        }
    ],

    colors: [
        // 'var(--bs-primary)'
        'rgba(220, 53, 69, 0.15)'
    ],

    stroke: {
        curve: 'straight',
        width: 3,
        lineCap: 'butt',
        colors: ['var(--bs-primary)']
    },

    fill: {
        type: 'solid',
        opacity: 1
    },

    markers: {
        size: 0,
        hover: {
            size: 0
        }
    },

    dataLabels: {
        enabled: false
    },

    xaxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],

        tickPlacement: 'on',

        labels: {
            show: true,
            offsetY: -4,
            style: {
                fontSize: '13px',
                fontFamily: 'var(--bs-font-family-base)',
                fontWeight: 400,
                colors: 'var(--bs-secondary-color)'
            }
        },

        axisBorder: {
            show: false
        },

        axisTicks: {
            show: false
        },

        tooltip: {
            enabled: false
        }
    },

    yaxis: {
        show: true,

        min: 1000,
        max: 6000,

        tickAmount: 5,

        forceNiceScale: false,

        labels: {
            show: true,

            offsetX: 0,

            style: {
                fontSize: '13px',
                fontFamily: 'var(--bs-font-family-base)',
                fontWeight: 400,
                colors: 'var(--bs-secondary-color)'
            },

            formatter: function (value) {
                return '$' + Math.round(value / 1000) + 'k';
            }
        }
    },

    grid: {
        show: true,

        borderColor: 'var(--bs-border-color)',

        strokeDashArray: 10,

        position: 'back',

        xaxis: {
            lines: {
                show: false
            }
        },

        yaxis: {
            lines: {
                show: true
            }
        },

        padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
        }
    },

    legend: {
        show: false
    },

    tooltip: {
        enabled: true,
        theme: 'light',

        x: {
            show: true
        },

        y: {
            formatter: function (value) {
                return '$' + value.toLocaleString();
            }
        }
    },

    responsive: [
        {
            breakpoint: 768,
            options: {
                chart: {
                    width: '100%',
                    height: 290
                }
            }
        }
    ]
};

const totalIncomeChartElement = document.querySelector('#totalIncomeChart');

if (totalIncomeChartElement) {
    const totalIncomeChart = new ApexCharts(
        totalIncomeChartElement,
        totalIncomeChartOptions
    );

    totalIncomeChart.render();
}


// performance chart js

const performanceChartOptions = {
    chart: {
        type: 'radar',
        height: 310,
        width: 359,
        toolbar: {
            show: false
        },
        parentHeightOffset: 0
    },

    series: [
        {
            name: 'Income',
            data: [65, 75, 67, 100, 75, 69]
        },
        {
            name: 'Earning',
            data: [75, 67, 60, 65, 60, 100]
        }
    ],

    colors: [
        'var(--bs-success)',
        'var(--bs-indigo)'
    ],

    xaxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun'
        ],
        labels: {
            show: true,
            style: {
                colors: 'var(--bs-secondary-color)',
                fontSize: '13px',
                fontFamily: 'var(--bs-font-family-base)',
                fontWeight: 400
            }
        }
    },

    yaxis: {
        show: false,
        min: 0,
        max: 100,
        tickAmount: 4
    },

    plotOptions: {
        radar: {
            size: 108.208333,
            polygons: {
                strokeColors: 'var(--bs-border-color)',
                strokeWidth: 1,
                connectorColors: 'var(--bs-border-color)',
                fill: {
                    colors: ['transparent']
                }
            }
        }
    },

    stroke: {
        width: 0
    },

    fill: {
        opacity: 1
    },

    markers: {
        size: 0,
        hover: {
            size: 0
        }
    },

    dataLabels: {
        enabled: false
    },

    legend: {
        show: true,
        position: 'bottom',
        horizontalAlign: 'center',
        fontSize: '13px',
        fontFamily: 'Helvetica, Arial, sans-serif',
        fontWeight: 400,
        labels: {
            colors: 'var(--bs-body-color)'
        },
        markers: {
            width: 10,
            height: 10,
            radius: 50
        },
        itemMargin: {
            horizontal: 10,
            vertical: 4
        }
    },

    tooltip: {
        enabled: true,
        theme: 'light'
    }
};

const performanceChartElement =
    document.querySelector('#performanceChart');

if (performanceChartElement) {
    const performanceChart = new ApexCharts(
        performanceChartElement,
        performanceChartOptions
    );

    performanceChart.render();
}


// conversion rate js
const conversionRateChartOptions = {
    chart: {
        type: 'line',
        width: 140,
        height: 80,
        toolbar: {
            show: false
        },
        zoom: {
            enabled: false
        },
        sparkline: {
            enabled: true
        },
        parentHeightOffset: 0
    },

    series: [
        {
            name: 'series-1',
            data: [95, 210, 145, 250]
        }
    ],

    colors: [
        'var(--bs-primary)'
    ],

    stroke: {
        curve: 'smooth',
        width: 5,
        lineCap: 'butt'
    },

    markers: {
        size: 0,
        hover: {
            size: 6
        }
    },

    grid: {
        show: false
    },

    xaxis: {
        labels: {
            show: false
        },
        axisBorder: {
            show: false
        },
        axisTicks: {
            show: false
        }
    },

    yaxis: {
        show: false,
        min: 0,
        max: 300
    },

    dataLabels: {
        enabled: false
    },

    legend: {
        show: false
    },

    tooltip: {
        enabled: true,
        theme: 'light'
    },

    fill: {
        type: 'solid',
        opacity: 1
    }
};

const conversionRateChartElement =
    document.querySelector('#conversionRateChart');

if (conversionRateChartElement) {
    const conversionRateChart = new ApexCharts(
        conversionRateChartElement,
        conversionRateChartOptions
    );

    conversionRateChart.render();
}

// total balance chart js
const totalBalanceChartOptions = {
    chart: {
        type: 'line',
        width: 359,
        height: 245,
        toolbar: {
            show: false
        },
        zoom: {
            enabled: false
        },
        parentHeightOffset: 0
    },

    series: [
        {
            name: 'series-1',
            data: [137, 210, 160, 275, 205, 315]
        }
    ],

    colors: [
        'var(--bs-warning)'
    ],

    stroke: {
        curve: 'smooth',
        width: 4,
        lineCap: 'butt'
    },

    markers: {
        size: 0,
        hover: {
            size: 6
        }
    },

    xaxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun'
        ],
        labels: {
            show: true,
            style: {
                colors: 'var(--bs-secondary-color)',
                fontSize: '13px',
                fontFamily: 'var(--bs-font-family-base)',
                fontWeight: 400
            }
        },
        axisBorder: {
            show: false
        },
        axisTicks: {
            show: false
        },
        crosshairs: {
            show: true,
            stroke: {
                color: '#b6b6b6',
                width: 1,
                dashArray: 3
            }
        }
    },

    yaxis: {
        show: false,
        min: 100,
        max: 350,
        tickAmount: 5
    },

    grid: {
        show: false
    },

    dataLabels: {
        enabled: false
    },

    legend: {
        show: false
    },

    tooltip: {
        enabled: true,
        theme: 'light'
    },

    fill: {
        type: 'solid',
        opacity: 1
    },

    states: {
        hover: {
            filter: {
                type: 'none'
            }
        }
    }
};

const totalBalanceChartElement =
    document.querySelector('#totalBalanceChart');

if (totalBalanceChartElement) {
    const totalBalanceChart = new ApexCharts(
        totalBalanceChartElement,
        totalBalanceChartOptions
    );

    totalBalanceChart.render();
}