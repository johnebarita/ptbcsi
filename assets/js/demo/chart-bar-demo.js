// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}


// Bar Chart Example
var ctx = document.getElementById("myBarChart");
console.log('test');
var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [
            {
                label: "Late",
                backgroundColor: "#acadba",
                hoverBackgroundColor: "#acadba",
                borderColor: "#acadba",
                data: [4215, 5312, 6251, 7841, 9821, 14984,4215, 5312, 6251, 7841, 9821, 14984],
            },
            {
                label: "On-time",
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#4e73df",
                borderColor: "#4e73df",
                data: [4215, 5312, 6251, 7841, 9821, 14984,],
            },
            {
                label: "Absent",
                backgroundColor: "#ff5243",
                hoverBackgroundColor: "#e74a3b",
                borderColor: "#ff5243",
                data: [4215, 5312, 6251, 7841, 9821, 14984],
            }],
    },
    options: {
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
        },
        scales: {
            xAxes: [{
                time: {
                    unit: 'month'
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 6
                },
                maxBarThickness: 25,
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 15000,
                    maxTicksLimit: 5,
                    padding: 10,
                    // Include a dollar sign in the ticks
                    callback: function (value, index, values) {
                        return '$' + number_format(value);
                    }
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2]
                }
            }],
        },
        legend: {
            display: true
        },
        tooltips: {
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            callbacks: {
                label: function (tooltipItem, chart) {
                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                    return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                }
            }
        },
    }
});


function lates() {
    $.ajax({
        url: 'chart-data',
        type: 'post',
        dataType: 'json',
        async: false,
        success: late(data),
    }).data;
    // return [1000, 5312, 6251, 7841, 9821, 14984];
}

function late(data) {
    return data[0];
}
// function parseRow(row) {
//     var rowArray = row.trim().split(",");
//     var date = rowArray[0];
//     var checknum = rowArray[1];
//     var payee = rowArray[2];
//     var memo = rowArray[3];
//     var amount = rowArray[4];
//
//     autoSelectCategory(payee, function (category) {
//         saveRecord(date, checkNum, payee, memo, category, payment, deposit);
//     });
// }
//
// function autoSelectCategory(payee, callback) {
//     $.ajax({
//         async: false,
//         url: "autoselectcategory",
//         dataType: "json",
//         data: {
//             string: payee
//         },
//         success: callback
//     });
// }


// $(function () {
//     $.ajax({
//         url: 'chart-data',
//         type: 'post',
//         success: function (data) {
//             var response = JSON.parse(data);
//             chart.data.datasets.forEach(function (dataset) {
//                 dataset.data.pop();
//                 chart.update();
//             });
//
//         }
//     })
// });

// $.(
//
//     function addData() {
//             console.log("Test");
//         // chart.data.labels.push(label);
//         // chart.data.datasets.forEach(function (dataset) {
//         //     console.log(dataset);
//         // });
//     }
// );
// function addData(chart, label, data) {
//     chart.data.labels.push(label);
//     chart.data.datasets.forEach((dataset) = > {
//         dataset.data.push(data);
// })
//     ;
//     chart.update();
// };

// function removeData(chart) {
//     chart.data.labels.pop();
//     chart.data.datasets.forEach((dataset) = > {
//         dataset.data.pop();
// })
//     ;
//     chart.update();
// }
//
