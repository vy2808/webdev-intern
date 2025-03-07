<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;

class DashboardController extends Controller
{
    public function index()
    {
        // Danh sách các môn học cần thống kê
        $subjects = ['toan', 'ngu_van', 'ngoai_ngu', 'vat_li', 'hoa_hoc', 'sinh_hoc', 'lich_su', 'dia_li', 'gdcd'];
        
        // Khởi tạo mảng báo cáo cho từng môn học với 4 mức điểm
        $report = [];
        foreach ($subjects as $subject) {
            $report[$subject] = [
                'level1' => 0, // >= 8
                'level2' => 0, // >= 6 và < 8
                'level3' => 0, // >= 4 và < 6
                'level4' => 0, // < 4
            ];
        }
        
        // Lấy tất cả các hồ sơ điểm
        $scores = Score::all();
        
        // Với mỗi hồ sơ, duyệt qua từng môn và phân loại theo mức điểm nếu giá trị không null
        foreach ($scores as $score) {
            foreach ($subjects as $subject) {
                $value = $score->{$subject};
                if (!is_null($value)) {
                    if ($value >= 8) {
                        $report[$subject]['level1']++;
                    } elseif ($value >= 6) {
                        $report[$subject]['level2']++;
                    } elseif ($value >= 4) {
                        $report[$subject]['level3']++;
                    } else {
                        $report[$subject]['level4']++;
                    }
                }
            }
        }
        
        // Truyền dữ liệu báo cáo vào view
        return view('dashboard', compact('report'));
    }

}
