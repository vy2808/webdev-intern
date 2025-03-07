@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="">Feature Report Dashboard</h2>
    <div class="card p-4">
        <h4 class="mb-3">Subject Score Distribution</h4>
        <canvas id="scoreChart" width="800" height="400"></canvas>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const report = {!! json_encode($report) !!};

            const subjects = Object.keys(report);

            const level1Data = subjects.map(subject => report[subject]['level1']);
            const level2Data = subjects.map(subject => report[subject]['level2']);
            const level3Data = subjects.map(subject => report[subject]['level3']);
            const level4Data = subjects.map(subject => report[subject]['level4']);

            const data = {
                labels: subjects,
                datasets: [
                    {
                        label: 'Level 1 (>= 8)',
                        data: level1Data,
                        backgroundColor: 'rgba(75, 192, 102, 0.7)',
                        borderColor: 'rgba(75, 192, 102, 0.7)',
                        borderWidth: 1
                    },
                    {
                        label: 'Level 2 (>= 6 and < 8)',
                        data: level2Data,
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Level 3 (>= 4 and < 6)',
                        data: level3Data,
                        backgroundColor: 'rgba(255, 206, 86, 0.7)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Level 4 (< 4)',
                        data: level4Data,
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                        }
                    },
                    scales: {
                        x: {
                            stacked: true, 
                        },
                        y: {
                            beginAtZero: true,
                            stacked: true, 
                            ticks: {
                                precision: 0 
                            }
                        }
                    }
                }
            };

            const ctx = document.getElementById('scoreChart').getContext('2d');
            new Chart(ctx, config);
        });
    </script>
@endsection
