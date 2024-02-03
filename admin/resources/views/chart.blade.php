<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 80%; margin: auto;">
        <canvas id="weatherChart"></canvas>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
    fetch('/fetch-chart-data')
        .then(response => response.text())
        .then(csvData => {
            
            const parsedData = parseCsvData(csvData);

            const labels = parsedData.map(entry => entry['Date time']);
            const values = parsedData.map(entry => parseFloat(entry['Temperature']));

            const ctx = document.getElementById('weatherChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Temperature (°C)',
                        data: values,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error fetching chart data:', error);
        });

    function parseCsvData(csvData) {
        const lines = csvData.trim().split('\n');
        const header = lines.shift().split(',');

        return lines.map(line => {
            const values = line.split(',');
            return header.reduce((entry, field, index) => {
                entry[field.trim()] = values[index].trim();
                return entry;
            }, {});
        });
    }
});

    </script>
</body>
</html> -->