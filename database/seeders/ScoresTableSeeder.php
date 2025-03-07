<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
    public function run()
    {
        DB::table('scores')->truncate(); // Xóa dữ liệu cũ

        DB::table('scores')->insert([
            ['sbd' => '1000001', 'toan' => 8.4, 'ngu_van' => 6.75, 'ngoai_ngu' => 8, 'vat_li' => 6, 'hoa_hoc' => 5.25, 'sinh_hoc' => 5, 'lich_su' => null, 'dia_li' => null, 'gdcd' => null, 'ma_ngoai_ngu' => 'N1'],
            ['sbd' => '1000002', 'toan' => 8.6, 'ngu_van' => 8.5, 'ngoai_ngu' => 7.2, 'vat_li' => null, 'hoa_hoc' => null, 'sinh_hoc' => null, 'lich_su' => 7.25, 'dia_li' => 6, 'gdcd' => 8, 'ma_ngoai_ngu' => 'N1'],
            ['sbd' => '1000003', 'toan' => 8.2, 'ngu_van' => 8.75, 'ngoai_ngu' => 8.2, 'vat_li' => null, 'hoa_hoc' => null, 'sinh_hoc' => null, 'lich_su' => 7.25, 'dia_li' => 7.25, 'gdcd' => 8.75, 'ma_ngoai_ngu' => 'N1'],
            ['sbd' => '1000004', 'toan' => 4.8, 'ngu_van' => 8.5, 'ngoai_ngu' => 7.4, 'vat_li' => null, 'hoa_hoc' => null, 'sinh_hoc' => null, 'lich_su' => 7, 'dia_li' => 6, 'gdcd' => 7.5, 'ma_ngoai_ngu' => 'N1'],
            ['sbd' => '1000005', 'toan' => 8.6, 'ngu_van' => 9, 'ngoai_ngu' => 7.8, 'vat_li' => null, 'hoa_hoc' => null, 'sinh_hoc' => null, 'lich_su' => 9, 'dia_li' => 8.75, 'gdcd' => 8.5, 'ma_ngoai_ngu' => 'N1'],
            ['sbd' => '1000006', 'toan' => 5.8, 'ngu_van' => 8.75, 'ngoai_ngu' => 7.8, 'vat_li' => null, 'hoa_hoc' => null, 'sinh_hoc' => null, 'lich_su' => 7.75, 'dia_li' => 6.75, 'gdcd' => 7.5, 'ma_ngoai_ngu' => 'N1'],
            ['sbd' => '1000007', 'toan' => 6, 'ngu_van' => 7.5, 'ngoai_ngu' => null, 'vat_li' => null, 'hoa_hoc' => null, 'sinh_hoc' => null, 'lich_su' => 6.75, 'dia_li' => 7, 'gdcd' => 7, 'ma_ngoai_ngu' => null],
        ]);
    }
}
