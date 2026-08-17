<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
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
        ];

        $products = [
            ['brand' => 'siemens', 'name' => 'Volume Damper', 'short_description' => 'HVAC air flow control damper for building management systems.', 'description' => '<p>Siemens Volume Damper is designed for precise air flow control in HVAC systems. Compatible with building automation systems for optimal climate control.</p><ul><li>Precision air volume control</li><li>Easy integration with BMS</li><li>Durable construction</li></ul>', 'image' => 'brand_catalog/FXV_5.png', 'file' => null],
            ['brand' => 'siemens', 'name' => 'Intelligent Valve', 'short_description' => 'Smart control valve with integrated automation capabilities.', 'description' => '<p>Siemens Intelligent Valve combines control and measurement in one device for efficient HVAC operation.</p><ul><li>Integrated flow measurement</li><li>Dynamic balancing</li><li>Remote monitoring</li></ul>', 'image' => 'brand_catalog/950x836_dairymaid_vertex.png', 'file' => 'brand_catalog/A6V11703854_Intelligent-Valve---Control-valve-with-integrated-_en.pdf'],
            ['brand' => 'siemens', 'name' => 'Motorized Valve', 'short_description' => 'Actuator-controlled valve for heating and cooling applications.', 'description' => '<p>Siemens Motorized Valves provide reliable on/off and modulating control for HVAC systems.</p><ul><li>Wide range of actuators</li><li>Quick response time</li><li>Energy efficient</li></ul>', 'image' => 'brand_catalog/Compass-Unit.JPG.png', 'file' => null],
            ['brand' => 'siemens', 'name' => 'PICV Valve', 'short_description' => 'Pressure Independent Control Valve for hydronic balancing.', 'description' => '<p>Siemens PICV provides automatic hydronic balancing with dynamic pressure independence.</p><ul><li>Automatic flow limitation</li><li>Simplified commissioning</li><li>Energy savings</li></ul>', 'image' => 'brand_catalog/950x836_VF1.png', 'file' => 'brand_catalog/A6V14379274_Datasheet-for-PICV-PN16_PN25-with-flanged-connecti_en.pdf'],
            ['brand' => 'siemens', 'name' => 'Room Sensor', 'short_description' => 'Temperature and occupancy sensors for room-level control.', 'description' => '<p>Siemens Room Sensors provide accurate environmental data for optimal room comfort control.</p><ul><li>High accuracy measurement</li><li>Modern design</li><li>Easy installation</li></ul>', 'image' => null, 'file' => null],
            ['brand' => 'siemens', 'name' => 'Flow Meter', 'short_description' => 'Ultrasonic flow measurement for HVAC water circuits.', 'description' => '<p>Siemens Sitrans FM flow meters provide accurate ultrasonic flow measurement for energy monitoring.</p><ul><li>Non-intrusive measurement</li><li>High accuracy</li><li>Energy monitoring ready</li></ul>', 'image' => 'brand_catalog/FlowMeasurement.png', 'file' => 'brand_catalog/FLowMeasurement.pdf'],
            ['brand' => 'siemens', 'name' => 'Butterfly Valve', 'short_description' => 'Large diameter butterfly valve for chilled water systems.', 'description' => '<p>Siemens Butterfly Valves are designed for reliable shut-off in large HVAC piping systems.</p><ul><li>Bidirectional sealing</li><li>Low torque operation</li><li>Long service life</li></ul>', 'image' => null, 'file' => 'brand_catalog/ButterflyValve.pdf'],
            ['brand' => 'siemens', 'name' => 'Room Thermostat', 'short_description' => 'Wall-mounted room thermostat for HVAC zone control.', 'description' => '<p>Siemens Room Thermostats offer precise temperature control for individual zones.</p><ul><li>Touch screen interface</li><li>Schedule programming</li><li>Fan speed control</li></ul>', 'image' => null, 'file' => null],
            ['brand' => 'bac', 'name' => 'Series 3000 Cooling Tower', 'short_description' => 'Cross-flow cooling tower for industrial and commercial HVAC applications.', 'description' => '<p>BAC Series 3000 Cooling Tower delivers efficient heat rejection for large HVAC systems.</p><ul><li>Cross-flow design</li><li>Low drift technology</li><li>Easy maintenance access</li></ul>', 'image' => null, 'file' => 'brand_catalog/MAR117-1-Catalogue-Series-3000-Cooling-Towers-A4-med.pdf'],
            ['brand' => 'bac', 'name' => 'PT2 Cooling Tower', 'short_description' => 'Package cooling tower for smaller capacity requirements.', 'description' => '<p>BAC PT2 is a compact package cooling tower ideal for commercial building applications.</p><ul><li>Compact design</li><li>Quiet operation</li><li>Corrosion resistant</li></ul>', 'image' => null, 'file' => 'brand_catalog/pt2brochure_20170216.pdf'],
            ['brand' => 'tiger', 'name' => 'Tiger Cast Iron Pipe', 'short_description' => 'High-quality cast iron pipe for drainage and waste systems.', 'description' => '<p>Tiger Cast Iron Pipe provides reliable soil and waste drainage solutions.</p><ul><li>Sound damping</li><li>Fire resistant</li><li>Long joint life</li></ul>', 'image' => null, 'file' => 'brand_catalog/Brochure-Tyler-2016-catalog.pdf'],
            ['brand' => 'armaflex', 'name' => 'Armaflex NBR Insulation', 'short_description' => 'Closed-cell NBR foam insulation for HVAC pipes and ducts.', 'description' => '<p>Armaflex is the leading flexible elastomeric foam insulation for HVAC applications, preventing condensation and reducing heat loss.</p><ul><li>Closed-cell structure</li><li>Built-in vapor barrier</li><li>Fire rated</li></ul>', 'image' => 'brand_catalog/armaflex1.jpg', 'file' => 'brand_catalog/Armaflex-Class-1.pdf'],
            ['brand' => 'armaflex', 'name' => 'ArmaChek Silver', 'short_description' => 'High-performance pipe covering with aluminum cladding.', 'description' => '<p>ArmaChek Silver provides superior protection for pipes with an aluminum outer skin and flexible insulation core.</p><ul><li>Aluminum cladding</li><li>UV resistant</li><li>All-in-one solution</li></ul>', 'image' => 'brand_catalog/armacek12.jpg', 'file' => 'brand_catalog/Armachek-Silver.pdf'],
            ['brand' => 'armaflex', 'name' => 'Armaflex Accessories', 'short_description' => 'Complete range of adhesives, sealants, and installation accessories.', 'description' => '<p>Official Armaflex installation accessories for guaranteed system integrity.</p><ul><li>Armaflex adhesive</li><li>Armaflex sealant</li><li>Armaflex tape</li></ul>', 'image' => 'brand_catalog/armafix1.jpg', 'file' => 'brand_catalog/Accessories.pdf'],
            ['brand' => 'hira', 'name' => 'Aeroduct Flexible Duct Connector', 'short_description' => 'Flexible duct connector for vibration and noise isolation.', 'description' => '<p>Aeroduct Flexible Duct Connector isolates vibration and reduces noise transmission in HVAC duct systems.</p><ul><li>Fabric construction</li><li>Temperature resistant</li><li>Easy installation</li></ul>', 'image' => 'brand_catalog/Flexible_Duct_500x360.jpg', 'file' => 'brand_catalog/catalog-aeroduct-flexibleductconnector-uae-22sep22.pdf'],
            ['brand' => 'hira', 'name' => 'Aerofoam Insulation', 'short_description' => 'Closed-cell foam insulation for pipes and equipment.', 'description' => '<p>Aerofoam is a high-performance closed-cell insulation for HVAC and refrigeration applications.</p><ul><li>Closed-cell structure</li><li>High thermal efficiency</li><li>Moisture resistant</li></ul>', 'image' => 'brand_catalog/Aerofoam-Thermal-Insulation-Alupet-Tapes.jpg', 'file' => 'brand_catalog/Aerofoam.pdf'],
            ['brand' => 'hira', 'name' => 'Aluminium Tapes', 'short_description' => 'Premium aluminum foil tape for HVAC duct sealing.', 'description' => '<p>Hira Aluminium Tapes provide reliable sealing and joining for ductwork and insulation systems.</p><ul><li>High adhesion</li><li>Tear resistant</li><li>Temperature resistant</li></ul>', 'image' => null, 'file' => 'brand_catalog/Aluminium-Tapes.pdf'],
            ['brand' => 'vasen', 'name' => 'Weixing PPR Pipe', 'short_description' => 'Polypropylene random pipe for hot and cold water distribution.', 'description' => '<p>Weixing PPR Pipe provides reliable hot and cold water distribution with leak-free fusion welding.</p><ul><li>Heat fusion jointing</li><li>Corrosion resistant</li><li>Long service life</li></ul>', 'image' => null, 'file' => 'brand_catalog/Brochure---Weixing-PPR-2016.pdf'],
        ];

        foreach ($products as $p) {
            if (empty($p['brand']) || !$brands[$p['brand']]) {
                continue;
            }
            Product::create([
                'brand_id' => $brands[$p['brand']]->id,
                'name' => $p['name'],
                'slug' => Str::slug($p['name']),
                'short_description' => $p['short_description'],
                'description' => $p['description'],
                'image' => $p['image'],
                'file' => $p['file'],
                'order' => 0,
                'status' => 'active',
            ]);
        }
    }
}
