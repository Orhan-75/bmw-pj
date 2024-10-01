// ---------- CHARTS ----------

// pie chart 1
var filterElement = document.getElementById("date_filter");
var userchartdiv = document.getElementById("user-chart");
var url = '../php/user-chart.php';
var filter = "";
var previousFilterElement = null;


fetch(url)
        .then(response => response.json())
        .then(userData => {
            // Process and render the chart data
            var userSeriesData = Object.values(userData).map(value => parseFloat(value));

            var userChart = {
                series: userSeriesData,
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: Object.keys(userData),
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart1 = new ApexCharts(document.querySelector("#user-chart"), userChart);
            chart1.render();
        })
        .catch(error => {
            console.error('Error:', error);
        });

    // this is for filtering user chart
    filterElement.addEventListener("change", function() {
    userchartdiv.innerHTML = "";
    var filter = filterElement.value;
    console.log(filter);

    if (previousFilterElement !== null && previousFilterElement !== filterElement) {
        // Clear the previous filter value
        previousFilterElement.value = "";
    }

    previousFilterElement = filterElement;

    fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ date_filter: filter }),
      })
        .then(response => response.json())
        .then(userData => {
            // Process and render the chart data
            var userSeriesData = Object.values(userData).map(value => parseFloat(value));

            var userChart = {
                series: userSeriesData,
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: Object.keys(userData),
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart1 = new ApexCharts(document.querySelector("#user-chart"), userChart);
            chart1.render();
        })
        .catch(error => {
            console.error('Error:', error);
        });
});


// Pie chart 2
var filterElement = document.getElementById("date_filter");
var citychartdiv = document.getElementById("city-chart");
var url2 = '../php/city-chart.php';
var filter = "";
var previousFilterElement = null;

fetch(url2)
        .then(response => response.json())
        .then(cityData => {
            // Process and render the chart data
            var citySeriesData = Object.values(cityData).map(value => parseFloat(value));
            var colors = ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0', '#00D9E9', '#FF66C3', '#D2D6DE', '#7E9AFF', '#FFD576', '#5E72EB', '#39CCCC', '#DA4F51', '#6B5E62', '#FF0000', '#FF5733', '#FFC300'];

            var cityChart = {
                series: citySeriesData,
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: Object.keys(cityData),
                colors: colors,
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart2 = new ApexCharts(document.querySelector("#city-chart"), cityChart);
            chart2.render();
        })
        .catch(error => {
            console.error('Error:', error);
        });

    // this is for filtering user chart
    filterElement.addEventListener("change", function() {
    citychartdiv.innerHTML = "";
    var filter = filterElement.value;

    if (previousFilterElement !== null && previousFilterElement !== filterElement) {
        // Clear the previous filter value
        previousFilterElement.value = "";
    }

    previousFilterElement = filterElement;

    fetch(url2, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ date_filter: filter }),
      })
        .then(response => response.json())
        .then(cityData => {
            // Process and render the chart data
            var citySeriesData = Object.values(cityData).map(value => parseFloat(value));
            var colors = ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0', '#00D9E9', '#FF66C3', '#D2D6DE', '#7E9AFF', '#FFD576', '#5E72EB', '#39CCCC', '#DA4F51', '#6B5E62', '#FF0000', '#FF5733', '#FFC300'];
            var cityChart = {
                series: citySeriesData,
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: Object.keys(cityData),
                colors: colors,
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart2 = new ApexCharts(document.querySelector("#city-chart"), cityChart);
            chart2.render();
        })
        .catch(error => {
            console.error('Error:', error);
        });
});


// Pie chart 3
var filterElement = document.getElementById("date_filter");
var purposechartdiv = document.getElementById("purpose-chart");
var url3 = '../php/purpose-chart.php';
var filter = "";
var previousFilterElement = null;

fetch(url3)
        .then(response => response.json())
        .then(purposeData => {
            // Process and render the chart data
            var purposeSeriesData = Object.values(purposeData).map(value => parseFloat(value));
            var colors = ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0', '#00D9E9', '#FF66C3', '#D2D6DE', '#7E9AFF', '#FFD576', '#5E72EB', '#39CCCC', '#DA4F51', '#6B5E62', '#FF0000', '#FF5733', '#FFC300'];

            var purposeChart = {
                series: purposeSeriesData,
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: Object.keys(purposeData),
                colors: colors,
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart3 = new ApexCharts(document.querySelector("#purpose-chart"), purposeChart);
            chart3.render();
        })
        .catch(error => {
            console.error('Error:', error);
        });

    // this is for filtering user chart
    filterElement.addEventListener("change", function() {
    purposechartdiv.innerHTML = "";
    var filter = filterElement.value;

    if (previousFilterElement !== null && previousFilterElement !== filterElement) {
        // Clear the previous filter value
        previousFilterElement.value = "";
    }

    previousFilterElement = filterElement;

    fetch(url3, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ date_filter: filter }),
      })
        .then(response => response.json())
        .then(purposeData => {
            // Process and render the chart data
            var purposeSeriesData = Object.values(purposeData).map(value => parseFloat(value));
            var colors = ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0', '#00D9E9', '#FF66C3', '#D2D6DE', '#7E9AFF', '#FFD576', '#5E72EB', '#39CCCC', '#DA4F51', '#6B5E62', '#FF0000', '#FF5733', '#FFC300'];
            var purposeChart = {
                series: purposeSeriesData,
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: Object.keys(purposeData),
                colors: colors,
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart3 = new ApexCharts(document.querySelector("#purpose-chart"), purposeChart);
            chart3.render();
        })
        .catch(error => {
            console.error('Error:', error);
        });
});

//pie chart 4 
var filterElement = document.getElementById("date_filter");
var sourcechartdiv = document.getElementById("source-chart");
var url4 = '../php/source-chart.php';
var filter = "";
var previousFilterElement = null;

fetch(url4)
        .then(response => response.json())
        .then(sourceData => {
            // Process and render the chart data
            var sourceSeriesData = Object.values(sourceData).map(value => parseFloat(value));
            var colors = ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0', '#00D9E9', '#FF66C3', '#D2D6DE', '#7E9AFF', '#FFD576', '#5E72EB', '#39CCCC', '#DA4F51', '#6B5E62', '#FF0000', '#FF5733', '#FFC300'];

            var sourceChart = {
                series: sourceSeriesData,
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: Object.keys(sourceData),
                colors: colors,
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart4 = new ApexCharts(document.querySelector("#source-chart"), sourceChart);
            chart4.render();
        })
        .catch(error => {
            console.error('Error:', error);
        });

    // this is for filtering user chart
    filterElement.addEventListener("change", function() {
    sourcechartdiv.innerHTML = "";
    var filter = filterElement.value;

    if (previousFilterElement !== null && previousFilterElement !== filterElement) {
        // Clear the previous filter value
        previousFilterElement.value = "";
    }

    previousFilterElement = filterElement;

    fetch(url4, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ date_filter: filter }),
      })
        .then(response => response.json())
        .then(sourceData => {
            // Process and render the chart data
            var sourceSeriesData = Object.values(sourceData).map(value => parseFloat(value));
            var colors = ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0', '#00D9E9', '#FF66C3', '#D2D6DE', '#7E9AFF', '#FFD576', '#5E72EB', '#39CCCC', '#DA4F51', '#6B5E62', '#FF0000', '#FF5733', '#FFC300'];

            var sourceChart = {
                series: sourceSeriesData,
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: Object.keys(sourceData),
                colors: colors,
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart4 = new ApexCharts(document.querySelector("#source-chart"), sourceChart);
            chart4.render();
        })
        .catch(error => {
            console.error('Error:', error);
        });
});

//line chart 5 
var filterElement = document.getElementById("date_filter");
var lineChartDiv = document.getElementById("line-chart");
var url6 = '../php/line-chart.php';
var filter = "";
var previousFilterElement = null;
var lineChart = null;

function renderLineChart(labels, data) {
  var config = {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: 'All Datas',
        data: data,
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
      }]
    },
    options: {
      scales: {
        x: {
          title: {
            display: true,
          }
        },
        y: {
          title: {
            display: true,
          }
        }
      },
      plugins: {
        tooltip: {
          callbacks: {
            label: function (context) {
              var label = context.label || '';
              var value = context.parsed.y || 0;
              return `${label}: ${value} records`;
            }
          }
        }
      }
    }
  };

  if (lineChart) {
    lineChart.destroy(); // Destroy the previous chart instance
  }

  lineChart = new Chart(lineChartDiv.getContext('2d'), config);
}

function fetchLineChartData(filter) {
  fetch(url6, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ date_filter: filter }),
    })
    .then(response => response.json())
    .then(jsonData => {
      var labels = jsonData.labels;
      var data = jsonData.data;

      renderLineChart(labels, data); // Render the chart with updated data
    })
    .catch(error => {
      console.error('Error:', error);
    });
}

// Fetch line chart data on initial page load
fetchLineChartData("");

// Filter change event listener
filterElement.addEventListener("change", function() {
  lineChartDiv.innerHTML = "";
  var filter = filterElement.value;

  if (previousFilterElement !== null && previousFilterElement !== filterElement) {
    // Clear the previous filter value
    previousFilterElement.value = "";
  }

  previousFilterElement = filterElement;

  fetchLineChartData(filter);
});