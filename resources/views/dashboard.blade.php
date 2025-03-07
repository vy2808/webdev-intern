@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2>Feature Report Dashboard</h2>
    <div class="card p-4">
        <h4 class="mb-3">Subject Score Distribution</h4>
        <div class="chart-container" style="position: relative;">
            <canvas id="scoreChart"></canvas>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const report = {!! json_encode($report) !!};

    const subjectMap = {
        toan: 'Math',
        ngu_van: 'Literature',
        ngoai_ngu: 'Foreign Language',
        vat_li: 'Physics',
        hoa_hoc: 'Chemistry',
        sinh_hoc: 'Biology',
        lich_su: 'History',
        dia_li: 'Geography',
        gdcd: 'Civic Education'
    };

    const subjects = Object.keys(report).map(subject => {
        return subjectMap[subject] || subject; 
    });

    const level1Data = Object.keys(report).map(subject => report[subject]['level1']);
    const level2Data = Object.keys(report).map(subject => report[subject]['level2']);
    const level3Data = Object.keys(report).map(subject => report[subject]['level3']);
    const level4Data = Object.keys(report).map(subject => report[subject]['level4']);

    const data = {
        labels: subjects, 
        datasets: [
            {
                label: 'Level 1 (>= 8)',
                data: level1Data,
                backgroundColor: 'rgba(75, 192, 102, 0.7)',
            },
            {
                label: 'Level 2 (>= 6 and < 8)',
                data: level2Data,
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
            },
            {
                label: 'Level 3 (>= 4 and < 6)',
                data: level3Data,
                backgroundColor: 'rgba(255, 206, 86, 0.7)',
            },
            {
                label: 'Level 4 (< 4)',
                data: level4Data,
                backgroundColor: 'rgba(255, 99, 132, 0.7)',
            }
        ]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
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
                x: { stacked: true },
                y: {
                    beginAtZero: true,
                    stacked: true,
                    ticks: { precision: 0 }
                }
            }
        }
    };

    const ctx = document.getElementById('scoreChart').getContext('2d');
    new Chart(ctx, config);
});
</script>

<style>
    .chart-container {
    margin: 0 auto;
}
@media (max-width: 576px) {
    .chart-container {
        height: 400px;
        width: 30vh; 
    }

    table.table {
        font-size: 0.95rem;
    }
}

@media (min-width: 577px) and (max-width: 1199px) {
    .chart-container {
        height: 400px;
        width: 70vh; 
    }

    table.table {
        font-size: 0.95rem; 
    }
}

@media (min-width: 1200px) {
    .chart-container {
        height: 450px; 
        width: 800px; 
    }

    table.table {
        font-size: 1rem; 
    }
}
</style>
@endsection
