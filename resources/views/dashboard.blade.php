@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Feature Report Dashboard</h2>
    <div class="card p-4">
        <h4 class="mb-3">Subject Score Distribution</h4>
        <!-- Canvas để hiển thị biểu đồ -->
        <canvas id="scoreChart" width="800" height="400"></canvas>
    </div>
</div>
@endsection

@section('scripts')
    <!-- Tải Chart.js từ CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Dữ liệu report được truyền từ Controller dưới dạng mảng PHP
            // Ví dụ: 
            // $report = [
            //   'toan'    => ['level1' => 10, 'level2' => 5, 'level3' => 3, 'level4' => 2],
            //   'ngu_van' => ['level1' => 8, 'level2' => 7, 'level3' => 4, 'level4' => 1],
            //   ...
            // ];
            const report = {!! json_encode($report) !!};

            // Lấy danh sách các môn học (keys của report)
            const subjects = Object.keys(report);

            // Tạo mảng dữ liệu cho từng mức cho mỗi môn
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
                        backgroundColor: 'rgba(75, 192, 192, 0.7)',
                        borderColor: 'rgba(75, 192, 192, 1)',
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
                type: 'bar', // Kiểu biểu đồ cột
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
                            stacked: true, // Xếp chồng dữ liệu trên trục X
                        },
                        y: {
                            beginAtZero: true,
                            stacked: true, // Xếp chồng dữ liệu trên trục Y
                            ticks: {
                                precision: 0 // Hiển thị số nguyên
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
