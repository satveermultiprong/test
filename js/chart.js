//  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
// Fetch data using AJAX
document.addEventListener("DOMContentLoaded", function () {
fetch('data.php')
    .then(response => response.json())
    .then(data => {
        const xValues = Object.keys(data);
        const yValues = Object.values(data);
        const barColors = ["red", "green", "blue", "orange", "#747d8c", "#00d2d3" , "#341f97","#B53471","#C4E538"];

        // Bar chart
        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: { display: false },
                title: {
                    display: true,
                    text: "Expense by Category "
                }
             
            }
        });


        fetch('data.php?chart=line')
                        .then(response => response.json())
                        .then(lineData => {
                            const lineXValues = Object.keys(lineData);
                            const lineYValues = Object.values(lineData);

                            // Line chart
                            new Chart("myLineChart", {
                                type: "line",
                                data: {
                                    labels: lineXValues,
                                    datasets: [{
                                        borderColor: "purple",
                                        data: lineYValues,
                                        fill: false,
                                        label: "Line Chart"
                                    }]
                                },
                                options: {
                                    title: {
                                        display: true,
                                        text: "Yearly Expense (Line Chart)"
                                    }
                                    
                                }
                            });
                        })
                        .catch(error => console.error('Error fetching line chart data:', error));
                })

    .catch(error => console.error('Error fetching data:', error));
  });
