<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopStudentController extends Controller
{
    public function ranks()
    {
        $topStudents = DB::table('scores')
            ->select('sbd', 'toan', 'vat_li', 'hoa_hoc', DB::raw('(toan + vat_li + hoa_hoc) as total'))
            ->whereNotNull('toan')
            ->whereNotNull('vat_li')
            ->whereNotNull('hoa_hoc')
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();

        return view('ranks', compact('topStudents'));
    }
}
