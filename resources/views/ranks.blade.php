@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">List top 10 students of group A including (math, physics, chemistry)</h2>
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            Top 10
        </div>
        <div class="card-body">
            @if ($topStudents->count())
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Rank</th>
                            <th scope="col">Registration Number</th>
                            <th scope="col">Math</th>
                            <th scope="col">Physics</th>
                            <th scope="col">Chemistry</th>
                            <th scope="col">Total Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topStudents as $index => $student)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $student->sbd }}</td>
                            <td>{{ $student->toan }}</td>
                            <td>{{ $student->vat_li }}</td>
                            <td>{{ $student->hoa_hoc }}</td>
                            <td>{{ number_format($student->total, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">Không có dữ liệu.</p>
            @endif
        </div>
    </div>
</div>
@endsection
