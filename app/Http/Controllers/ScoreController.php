<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;

class ScoreController extends Controller
{
    public function getScore(Request $request)
    {
        $sbd = $request->query('sbd'); // Lấy SBD từ request
        $score = Score::where('sbd', $sbd)->first();

        if ($score) {
            return response()->json(['success' => true, 'data' => $score]);
        } else {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy kết quả']);
        }
    }
}
