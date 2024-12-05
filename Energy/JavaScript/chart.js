const dataUrl = "http://localhost/EnergyConsumptionProject/eco/Energy/energy_data.php";

fetch(dataUrl)
    .then(function (response) {
        return response.json();
    })
    .then(function (jsonData) {
        const xValues = jsonData.map(function (item) {
            return item.country_name; //country_name for labels
        });

        const yValues = jsonData.map(function (item) {
            return parseFloat(item.total_consumption); //total consumption for data
        });

        const barColor = ["black", "darkgray", "lightgray", "gray", "white"]; //colors

        const ctx = document.getElementById("chartCanvas").getContext("2d");

        const gradient = ctx.createLinearGradient(0, 0, 0, 400); // Adjust direction (vertical gradient)
        gradient.addColorStop(0, "red");   // Start color
        gradient.addColorStop(0.5, "yellow"); // Middle color
        gradient.addColorStop(1, "green"); // End color

        const chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: xValues, //country names
                datasets: [{
                    label: "Total Energy Consumption (MWh)",
                    data: yValues, // total consumption
                    backgroundColor: gradient,
                }],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: "black", // Change dataset label color
                            font: {
                                size: 14, // Optional: Change font size
                                weight: "bold" // Optional: Make text bold
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: "black", // Change Y-axis tick color
                        },
                        title: {
                            display: true,
                            text: "Energy Consumption (MWh)",
                            color: "red", // Change Y-axis title color
                            font: {
                                size: 14, // Optional: Change font size
                                weight: 'bold' // Optional: Make text bold
                            }
                        }
                    },
                    x: {
                        ticks: {
                            color: "black", // Change Y-axis tick color
                        },
                        title: {
                            display: true,
                            text: "Countries",
                            color: "red", // Change Y-axis title color
                            font: {
                                size: 14, // Optional: Change font size
                                weight: 'bold' // Optional: Make text bold
                            }
                        }
                    }
                }
            }
        });
    })
    .catch(function (error) {
        console.error("Error fetching data:", error);
    });
