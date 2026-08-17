<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            'siemens' => Brand::where('slug', 'siemens')->first(),
            'bac' => Brand::where('slug', 'bac')->first(),
            'tiger' => Brand::where('slug', 'tiger')->first(),
            'armaflex' => Brand::where('slug', 'armacell')->first(),
            'hira' => Brand::where('slug', 'hira')->first(),
            'vasen' => Brand::where('slug', 'vasen')->first(),
            'ducting' => Brand::where('slug', 'ducting')->first(),
        ];

        $projects = [
            ['brand' => 'siemens', 'title' => 'Altira Office Tower — Jakarta', 'year' => 2025, 'company' => 'PT. Bona Fide Pratama', 'tag' => 'Office/Commercial', 'remarks' => 'Sensor', 'status' => 'published'],
            ['brand' => 'siemens', 'title' => 'BI Data Centre — Karawang', 'year' => 2025, 'company' => 'PT. Acece Sarana Prima', 'tag' => 'Data Center', 'remarks' => 'Sensor', 'status' => 'published'],
            ['brand' => 'siemens', 'title' => 'GTN 2 Data Center — Cikarang', 'year' => 2024, 'company' => 'PT. Daikin Applied Solutions Indonesia', 'tag' => 'Data Center', 'remarks' => 'Flow Meter', 'status' => 'published'],
            ['brand' => 'siemens', 'title' => 'Indonesia Battery Cell JV — Karawang', 'year' => 2024, 'company' => 'PT. Shinsung Enc Indonesia', 'tag' => 'Industrial/Manufacturing', 'remarks' => 'Valve Actuator', 'status' => 'published'],
            ['brand' => 'siemens', 'title' => 'Novotel — Bogor', 'year' => 2023, 'company' => 'PT. Umrota Karya Utama', 'tag' => 'Hotel', 'remarks' => 'Room Thermostat', 'status' => 'published'],
            ['brand' => 'siemens', 'title' => 'BNI PIK 2 — Jakarta', 'year' => 2024, 'company' => 'PT. Tehnik Bayu Murni', 'tag' => 'Office/Commercial', 'remarks' => 'Valve Actuator', 'status' => 'published'],
            ['brand' => 'siemens', 'title' => 'Thamrin Nine — Jakarta', 'year' => 2023, 'company' => 'PT. Sankara Tata Energi', 'tag' => 'Office/Commercial', 'remarks' => 'PICV', 'status' => 'published'],

            ['brand' => 'bac', 'title' => 'BDX CGK 3 Phase 2 — Jakarta', 'year' => 2025, 'company' => 'PT. Starone Mitra Telekomunikasi', 'tag' => 'Data Center', 'remarks' => 'FXV3-1224-24D-30 x 3 Unit', 'status' => 'published'],
            ['brand' => 'bac', 'title' => 'Indonesia Telkom NeutraDC — Cikarang', 'year' => 2025, 'company' => 'PT. Huawei Tech Investment', 'tag' => 'Data Center', 'remarks' => 'S3E-1424-14S x 4 Unit', 'status' => 'published'],
            ['brand' => 'bac', 'title' => 'ITC Kuningan — Jakarta', 'year' => 2023, 'company' => 'Perhimpunan Penghuni ITC Kuningan', 'tag' => 'Retail/Mall', 'remarks' => 'CPSC-1222-09R x 2 Unit', 'status' => 'published'],
            ['brand' => 'bac', 'title' => 'Air Liquide Site — Merak', 'year' => 2022, 'company' => 'PT. Air Liquide Indonesia', 'tag' => 'Industrial/Manufacturing', 'remarks' => 'FXV 0809B-32D-M x 1 Unit', 'status' => 'published'],
            ['brand' => 'bac', 'title' => 'Frisian Flag — Ciracas', 'year' => 2011, 'company' => 'PT. Frisian Flag', 'tag' => 'Industrial/Manufacturing', 'remarks' => 'CXV 93', 'status' => 'published'],

            ['brand' => 'tiger', 'title' => 'Artotel – Living World Kota Wisata — Bogor', 'year' => 2025, 'company' => 'PT. Jaya Kencana', 'tag' => 'Hotel', 'remarks' => 'Cast Iron Pipe', 'status' => 'published'],
            ['brand' => 'tiger', 'title' => 'Eka Hospital — Cilegon', 'year' => 2025, 'company' => 'PT. Nico Maju Mandiri', 'tag' => 'Hospital', 'remarks' => 'Cast Iron Pipe', 'status' => 'published'],
            ['brand' => 'tiger', 'title' => 'Data Centre K2 — Jakarta', 'year' => 2024, 'company' => 'PT. Pilar Garba Inti', 'tag' => 'Data Center', 'remarks' => 'Cast Iron Pipe', 'status' => 'published'],
            ['brand' => 'tiger', 'title' => 'MRT Phase 2 — Jakarta', 'year' => 2023, 'company' => 'PT. Total Teknik Indonesia', 'tag' => 'Transport/Infrastructure', 'remarks' => 'Cast Iron Pipe', 'status' => 'published'],
            ['brand' => 'tiger', 'title' => 'Nine Residence — Jakarta', 'year' => 2023, 'company' => 'PT. Jaya Abadi Utama', 'tag' => 'Residential', 'remarks' => 'Cast Iron Pipe', 'status' => 'published'],

            ['brand' => 'armaflex', 'title' => 'Badak LNG — Bontang, Kalimantan Timur', 'year' => 2025, 'company' => 'PT. Harsindo Inti Pratama', 'tag' => 'Industrial/Manufacturing', 'remarks' => 'Chilled Water System', 'status' => 'published'],
            ['brand' => 'armaflex', 'title' => 'FX Sudirman — Jakarta', 'year' => 2025, 'company' => 'PT. Fajar Raya Kencana', 'tag' => 'Office/Commercial', 'remarks' => 'Chilled Water System', 'status' => 'published'],
            ['brand' => 'armaflex', 'title' => 'Hotel Le Grandeur — Jakarta', 'year' => 2025, 'company' => 'PT. KIE Putra Sinergy Perkasa', 'tag' => 'Hotel', 'remarks' => 'Chilled Water System', 'status' => 'published'],
            ['brand' => 'armaflex', 'title' => 'Menara Rajawali — Jakarta', 'year' => 2024, 'company' => 'PT. Harsindo Inti Pratama', 'tag' => 'Office/Commercial', 'remarks' => 'Chilled Water System', 'status' => 'published'],
            ['brand' => 'armaflex', 'title' => 'RSUD Berau — Kalimantan Timur', 'year' => 2024, 'company' => 'CV. Bepa Sarana Teknik', 'tag' => 'Hospital', 'remarks' => 'Refrigerant Pipe', 'status' => 'published'],

            ['brand' => 'hira', 'title' => 'BRIN — Jakarta', 'year' => 2025, 'company' => 'PT. Maqna Arzh Cooltech', 'tag' => 'Government', 'remarks' => 'Aerofoam', 'status' => 'published'],
            ['brand' => 'hira', 'title' => 'Plaza Indonesia — Jakarta', 'year' => 2025, 'company' => 'PT. Fajar Raya Kencana', 'tag' => 'Retail/Mall', 'remarks' => 'Aerofoam', 'status' => 'published'],
            ['brand' => 'hira', 'title' => 'DC Ellipse — Cikarang', 'year' => 2024, 'company' => 'PT. Total Teknik Indonesia', 'tag' => 'Data Center', 'remarks' => 'Aeroduct', 'status' => 'published'],
            ['brand' => 'hira', 'title' => 'RS Hermina — Madiun', 'year' => 2024, 'company' => 'PT. Antero Makmur', 'tag' => 'Hospital', 'remarks' => 'Aerofoam', 'status' => 'published'],
            ['brand' => 'hira', 'title' => 'UNJANI Auditorium — Jawa Barat', 'year' => 2024, 'company' => 'PT. Airsindo Multi Selaras', 'tag' => 'Education', 'remarks' => 'Aerofoam', 'status' => 'published'],

            ['brand' => 'vasen', 'title' => 'Chiller Water — Semarang', 'year' => 2025, 'company' => 'PT. Alpha Putera Sinergi', 'tag' => 'Industrial/Manufacturing', 'remarks' => 'PPR Pipe', 'status' => 'published'],
            ['brand' => 'vasen', 'title' => 'PT. Mattel Indonesia — Cikarang', 'year' => 2024, 'company' => 'PT. Teksindo Delta Jaya', 'tag' => 'Industrial/Manufacturing', 'remarks' => 'PPR Pipe', 'status' => 'published'],
            ['brand' => 'vasen', 'title' => 'Royal Tulip Bogor — Bogor', 'year' => 2024, 'company' => 'PT. Tatametrika Nusantara', 'tag' => 'Hotel', 'remarks' => 'PPR Pipe', 'status' => 'published'],
            ['brand' => 'vasen', 'title' => 'The Lana — Alam Sutera', 'year' => 2020, 'company' => 'China Construction Eighth Engineering Division Corp Ltd', 'tag' => 'Residential', 'remarks' => 'PPR Pipe', 'status' => 'published'],

            ['brand' => 'ducting', 'title' => 'Margo City — Jakarta', 'year' => null, 'company' => '—', 'tag' => 'Retail/Mall', 'remarks' => 'Fabrikasi Ducting', 'status' => 'published'],
            ['brand' => 'ducting', 'title' => 'Bank Indonesia Pusat — Jakarta', 'year' => null, 'company' => '—', 'tag' => 'Government', 'remarks' => 'Fabrikasi Ducting', 'status' => 'published'],
            ['brand' => 'ducting', 'title' => 'Toyota Karawang', 'year' => null, 'company' => '—', 'tag' => 'Industrial/Manufacturing', 'remarks' => 'Fabrikasi Ducting', 'status' => 'published'],
            ['brand' => 'ducting', 'title' => 'Eka Hospital', 'year' => null, 'company' => '—', 'tag' => 'Hospital', 'remarks' => 'Fabrikasi Ducting', 'status' => 'published'],
        ];

        foreach ($projects as $p) {
            if (empty($p['brand']) || !$brands[$p['brand']]) {
                continue;
            }
            Project::create([
                'brand_id' => $brands[$p['brand']]->id,
                'title' => $p['title'],
                'slug' => Str::slug($p['title']),
                'brand' => $p['brand'],
                'year' => $p['year'],
                'company' => $p['company'],
                'description' => $p['remarks'],
                'thumbnail' => null,
                'tags' => json_encode([$p['tag']]),
                'status' => $p['status'],
            ]);
        }
    }
}
