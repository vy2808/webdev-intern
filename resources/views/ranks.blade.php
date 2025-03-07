@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">
        List top 10 students of group A (Math, Physics, Chemistry)
    </h2>
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            Top 10
        </div>
        <div class="card-body">
            @if ($topStudents->count())
                <div class="table-responsive">

                    <table class="table table-sm table-bordered table-hover text-center" style="table-layout: fixed; width: 100%;">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" style="width: 5%">#</th>
                                <th scope="col" style="width: 25%">Registration Number</th>
                                <th scope="col" style="width: 15%">Math</th>
                                <th scope="col" style="width: 15%">Phys</th>
                                <th scope="col" style="width: 15%">Chem</th>
                                <th scope="col" style="width: 15%">Total</th>
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
                </div>
            @else
                <p class="text-center">No data available.</p>
            @endif
        </div>
    </div>
</div>
@endsection
