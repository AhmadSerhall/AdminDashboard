<!DOCTYPE html>
<html lang="en">
<head>
    <!-- @push('user-styles')
        <link rel="stylesheet" href="{{ asset('admin/public/css/user.style.css') }}">
    @endpush -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="charts-container" id="user-content">
        <!-- <div class="4containers" style="display: flex; flex-wrap: wrap; width: 90%; margin: 1em; border: 2px solid blue;">
            <div class="container" style="width:50%; height:40%;">
                <canvas id="doughnutChart" ></canvas>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        console.log('DOMContentLoaded event fired');
                        
                        const doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
                        console.log('Canvas context:', doughnutCtx);
                        if (!doughnutCtx) {
                            console.error('Canvas context not found');
                            return;
                        }

                        try {
                            new Chart(doughnutCtx, {
                                type: 'doughnut',
                                data: {
                                    labels: ['Cloudy', 'Windy', 'Clear'],
                                    datasets: [{
                                        label:'Day Types',
                                        data: [50, 30, 20],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.6)',
                                            'rgba(54, 162, 235, 0.6)',
                                            'rgba(255, 206, 86, 0.6)'
                                        ],
                                        hoverOffset: 4
                                    }]
                                }
                            });
                        } catch (error) {
                            console.error('Error creating Chart:', error);
                        }
                    });
                </script>
            </div>
            <div class="container"></div>
            <div class="container"></div>
            <div class="container"></div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script> -->
        <h1>Users</h1>
    </div>
</body>
</html>
