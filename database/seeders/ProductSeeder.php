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
            'siemens'  => Brand::where('slug', 'siemens')->first(),
            'bac'      => Brand::where('slug', 'bac')->first(),
            'tiger'    => Brand::where('slug', 'tiger')->first(),
            'armacell' => Brand::where('slug', 'armacell')->first(),
            'hira'     => Brand::where('slug', 'hira')->first(),
            'vasen'    => Brand::where('slug', 'vasen')->first(),
            'ducting'  => Brand::where('slug', 'ducting')->first(),
        ];

        // Product data taken directly from docs/supranusa_final.sql INSERT statements.
        // Each entry: [brand_slug, bac_category, name, short_description, description, image, file]
        $products = [
            // ===== SIEMENS (brand_id=1) =====
            [
                'brand' => 'siemens',
                'bac_category' => null,
                'name' => 'Volume Damper',
                'short_description' => 'Siemens damper actuators for precise HVAC air flow control.',
                'description' => '<p>Siemens damper actuators provide precise air flow control for HVAC applications. Designed for building automation systems, they ensure reliable ventilation control with low-consumption motors and accurate positioning.</p><ul><li>Precise positioning for optimal air flow</li><li>Low energy consumption</li><li>Compatible with BMS integration</li><li>Suitable for comfort ventilation and VAV applications</li></ul>',
                'image' => 'https://assets.snj.co.id/assets/img/3ff49e0dd425b809b6ac85b5391e8838.jpg',
                'file'  => 'https://assets.snj.co.id/assets/pdf/ebbc83980f0c40ca485133b43d94a1c7.pdf',
            ],
            [
                'brand' => 'siemens',
                'bac_category' => null,
                'name' => 'Intelligent Valve',
                'short_description' => 'Siemens control valve with integrated energy data acquisition for HVAC systems.',
                'description' => '<p>Siemens Intelligent Valve combines control and measurement functions in one device for efficient HVAC water system operation. It provides dynamic balancing with integrated flow measurement for energy monitoring and optimal system performance.</p><ul><li>Integrated flow measurement</li><li>Dynamic balancing capability</li><li>Energy data acquisition</li><li>Remote monitoring ready</li><li>Ideal for heating and cooling circuits</li></ul>',
                'image' => 'https://assets.snj.co.id/assets/img/8e057be79bc44e2d1b9e14a7f2744b0f.jpg',
                'file'  => 'https://assets.snj.co.id/assets/pdf/7ef14e8f3851e2ea77170749aff0bd38.pdf',
            ],
            [
                'brand' => 'siemens',
                'bac_category' => null,
                'name' => 'Motorized Valve',
                'short_description' => 'Actuator-controlled valve for heating and cooling applications.',
                'description' => '<p>Siemens Motorized Valves provide reliable on/off and modulating control for HVAC systems.</p><ul><li>Wide range of actuators</li><li>Quick response time</li><li>Energy efficient</li></ul>',
                'image' => null,
                'file'  => 'https://assets.snj.co.id/assets/pdf/f60afcc8ac8a18a68c3ddd526c32f344.pdf',
            ],
            [
                'brand' => 'siemens',
                'bac_category' => null,
                'name' => 'PICV Valve',
                'short_description' => 'Siemens Pressure Independent Control Valve (PICV) for automatic hydronic balancing.',
                'description' => '<p>Siemens PICV (Pressure Independent Control Valve) provides automatic hydraulic balancing with dynamic pressure independence for HVAC water systems. The ACVATIX™ family includes VVP46.. and VPI46.. series combi valves PN25 for precise flow control in heating and cooling applications.</p><ul><li>Automatic flow limitation independent of pressure</li><li>Simplified commissioning</li><li>Energy savings through optimal hydronic balance</li><li>Pressure independent control</li><li>DN10-DN50 available</li></ul>',
                'image' => 'https://assets.snj.co.id/assets/img/e64803476a808dc41cf7eb6684de881d.png',
                'file'  => 'https://assets.snj.co.id/assets/pdf/8c783d3c69c61c42756170b681a05fc9.pdf',
            ],
            [
                'brand' => 'siemens',
                'bac_category' => null,
                'name' => 'Room Sensors',
                'short_description' => 'Siemens room sensors for temperature, humidity, and air quality monitoring.',
                'description' => '<p>Siemens room sensors provide accurate environmental data for optimal room comfort control. The QMX and QAA series includes temperature sensors, humidity sensors, and combined units with LCD displays for HVAC control. Compatible with Siemens DXR controllers and Desigo building management systems.</p><ul><li>Temperature and humidity measurement</li><li>LCD display options for room feedback</li><li>Compatible with Siemens DXR and KNX systems</li><li>Modern design for any interior</li><li>Easy installation on standard electrical boxes</li></ul>',
                'image' => 'https://assets.snj.co.id/assets/img/d28cd10593e9441787f637d86f10907f.jpg',
                'file'  => 'https://assets.snj.co.id/assets/pdf/27c14d55bb9a117cf9b25cd6fc2101c7.pdf',
            ],
            [
                'brand' => 'siemens',
                'bac_category' => null,
                'name' => 'Flow Meter',
                'short_description' => 'Siemens Sitrans FM ultrasonic flow meters for HVAC energy monitoring.',
                'description' => '<p>Siemens Sitrans FM flow meters provide accurate ultrasonic flow measurement for HVAC water circuits and energy monitoring. Non-intrusive measurement technology enables installation without system downtime. Ideal for energy consumption tracking and system optimization.</p><ul><li>Non-intrusive ultrasonic measurement</li><li>High accuracy for energy monitoring</li><li>HVAC water circuit compatible</li><li>Energy monitoring ready</li><li>No moving parts for reliable operation</li></ul>',
                'image' => 'https://assets.snj.co.id/assets/img/565151c79d6c2e8f90f65df3cb1ce2e3.jpg',
                'file'  => 'https://assets.snj.co.id/assets/pdf/d54e09c1e82a509c72e6bb2a68c0df81.pdf',
            ],
            [
                'brand' => 'siemens',
                'bac_category' => null,
                'name' => 'Butterfly Valve',
                'short_description' => 'Siemens butterfly valves PN16 for flanged connections with tight shutoff.',
                'description' => '<p>Siemens butterfly valves (VKF42.. series) PN16 for flanged connections, with tight shutoff. Used as motorized or shut-off valves in heating, ventilation and air conditioning systems. Suitable for open and closed circuits. For 2-position (SPDT) or DC 0-10V control signals.</p><ul><li>Bidirectional sealing for tight shutoff</li><li>Low torque operation</li><li>Long service life</li><li>PN16 pressure rating</li><li>DN15-DN600 sizes available</li></ul>',
                'image' => 'https://assets.snj.co.id/assets/img/a1c020a223c57c1ed86e603afef1d2eb.png',
                'file'  => 'https://assets.snj.co.id/assets/pdf/b9c492063f6f54103c3371b3eab865ed.pdf',
            ],
            [
                'brand' => 'siemens',
                'bac_category' => null,
                'name' => 'Room Thermostat',
                'short_description' => 'Siemens room thermostats for precise temperature control in HVAC zones.',
                'description' => '<p>Siemens room thermostats offer precise temperature control for individual HVAC zones. The QMX series includes programmable room units with LCD displays, touch controls, and integration with Siemens DXR controllers and KNX systems. Provides schedule programming and fan speed control for optimal comfort.</p><ul><li>Precise temperature control</li><li>LCD display options</li><li>Schedule programming capability</li><li>Fan speed control</li><li>Compatible with Siemens DXR and KNX</li></ul>',
                'image' => 'https://assets.snj.co.id/assets/img/5ec2cd7fb284e62511e9c4ebe7d66976.jpg',
                'file'  => 'https://assets.snj.co.id/assets/pdf/da8e2f1ce68ab1a6748672d9c33db2ec.pdf',
            ],
            [
                'brand' => 'siemens',
                'bac_category' => null,
                'name' => 'Siemens BMS',
                'short_description' => 'Siemens Desigo CC building management system for integrated building control.',
                'description' => '<p>Siemens Desigo CC is an advanced building management system platform that provides centralized control and monitoring of HVAC, lighting, fire safety, and security systems. It offers scalable architecture for buildings of all sizes with open communication standards and energy optimization capabilities.</p><ul><li>Centralized monitoring and control of all building systems</li><li>Energy optimization through integrated management</li><li>Scalable from single buildings to portfolios</li><li>Open standards (BACnet, etc.) for integration</li><li>Supports up to 2,000,000 data points</li></ul>',
                'image' => 'https://assets.snj.co.id/assets/img/105af9842a864bc5b1047e1614042b93.jpg',
                'file'  => null,
            ],
            [
                'brand' => 'siemens',
                'bac_category' => null,
                'name' => 'Chiller Sequencing',
                'short_description' => 'Siemens chiller sequencing control for energy-efficient cooling plant operation.',
                'description' => '<p>Siemens chiller sequencing optimizes the operation of multiple chillers to reduce energy consumption while maintaining required cooling capacity. Advanced lead/lag control and load-based sequencing algorithms ensure chillers operate at optimal efficiency across varying load conditions.</p><ul><li>Automatic lead/lag control for multiple chillers</li><li>Load-based sequencing for optimal efficiency</li><li>Energy savings through smart chiller management</li><li>Integration with building management systems</li><li>Reduced mechanical stress through smooth sequencing</li></ul>',
                'image' => null,
                'file'  => 'https://assets.snj.co.id/assets/pdf/f1885eecf9164f4a8f96cb79de7cc847.pdf',
            ],
            [
                'brand' => 'siemens',
                'bac_category' => null,
                'name' => 'Smart Vent',
                'short_description' => 'Siemens smart ventilation solutions for optimal indoor air quality and energy efficiency.',
                'description' => '<p>Siemens smart ventilation products provide intelligent airflow control for modern buildings. These solutions optimize indoor air quality while minimizing energy consumption through automated ventilation management and integration with building automation systems.</p><ul><li>Intelligent ventilation control</li><li>Energy-efficient operation</li><li>Integration with building management systems</li><li>Improved indoor air quality</li><li>Automated airflow optimization</li></ul>',
                'image' => 'https://assets.snj.co.id/assets/img/47ff36f93a3a771dc6386a73da9862b6.jpg',
                'file'  => null,
            ],

            // ===== BAC (brand_id=2) =====
            [
                'brand' => 'bac',
                'bac_category' => 'cooling_tower',
                'name' => 'Series 3000 Cooling Tower',
                'short_description' => 'Cross-flow closed cooling tower for industrial and commercial HVAC applications.',
                'description' => '<p>BAC Series 3000 Cooling Tower delivers efficient heat rejection for large HVAC systems.</p><ul><li>Closed cooling circuit</li><li>Low drift technology</li><li>Easy maintenance access</li></ul>',
                'image' => 'https://assets.snj.co.id/assets/img/e392153a8e54aa00d1446fdc5bd2c2ec.png',
                'file'  => 'https://assets.snj.co.id/assets/pdf/6948d1ccf4468add4210bcffd722adac.pdf',
            ],
            [
                'brand' => 'bac',
                'bac_category' => 'cooling_tower',
                'name' => 'PT2 Cooling Tower',
                'short_description' => 'Package open cooling tower for smaller capacity requirements.',
                'description' => '<p>BAC PT2 is a compact package cooling tower ideal for commercial building applications.</p><ul><li>Compact design</li><li>Quiet operation</li><li>Corrosion resistant</li></ul>',
                'image' => 'https://assets.snj.co.id/assets/img/9317a148eb5df4cce1cc149ca4e39519.png',
                'file'  => 'https://assets.snj.co.id/assets/pdf/cdcba8918a868e3cc8ec348be42391ef.pdf',
            ],
            [
                'brand' => 'bac',
                'bac_category' => 'closed_circuit_cooling_tower',
                'name' => 'FXV Closed Circuit Cooling Tower',
                'short_description' => 'Minimize your system energy, maintenance, and installation costs with the FXV closed circuit cooling tower, the industry standard for closed-loop systems.',
                'description' => '<p>Minimize your system energy, maintenance, and installation costs with the FXV closed circuit cooling tower, the industry standard for closed-loop systems.</p><p><strong>Thermal Capacity</strong>: 29 - 424 tons<br><strong>Flow Rate</strong>: Up to 3,600 USGPM<br>Combined Crossflow // Axial Fan // Induced Draft</p>',
                'image' => 'https://assets.snj.co.id/assets/img/3447ea8d8517de065506e325287371fc.png',
                'file'  => 'https://assets.snj.co.id/assets/pdf/94e6a62254005c9371ad6cdacbdbfb4e.pdf',
            ],
            [
                'brand' => 'bac',
                'bac_category' => 'closed_circuit_cooling_tower',
                'name' => 'FXV3 Closed Circuit Cooling Tower',
                'short_description' => 'The FXV3 Closed Circuit Cooling Tower is perfect for applications to maximize system efficiency and space savings for large projects.',
                'description' => '<p>The FXV3 Closed Circuit Cooling Tower is perfect for applications to maximize system efficiency and space savings for large projects. The FXV3 has the largest capacity in a single cell of any closed-loop system and provides the added value of reduced operating costs, improved reliability, and a cost-effective solution to both the owner and the installing contractor for large projects.</p><p><strong>Thermal Capacity</strong>: 278 - 765 tons<br><strong>Flow Rate</strong>: Up to 7,110 USGPM<br>Combined Crossflow // Axial Fan // Induced Draft</p>',
                'image' => 'https://assets.snj.co.id/assets/img/d1b93e486bbbaf4c859fe2f4b3ff9797.png',
                'file'  => 'https://assets.snj.co.id/assets/pdf/36095d7de85d679a522595b692dcc0a3.pdf',
            ],
            [
                'brand' => 'bac',
                'bac_category' => 'closed_circuit_cooling_tower',
                'name' => 'PFi Closed Circuit Cooling Tower',
                'short_description' => 'The highly efficient PFi Closed Circuit Cooling Tower is an ideal replacement unit that delivers a higher system efficiency than conventional counterflow solutions and has the lowest total cost of ownership.',
                'description' => '<p>The highly efficient PFi Closed Circuit Cooling Tower is an ideal replacement unit that delivers a higher system efficiency than conventional counterflow solutions and has the lowest total cost of ownership. The patented OptiCoil™ System increases thermal capacity by up to 30% compared to conventional counterflow fluid cooler equipment.</p><p><strong>Thermal Capacity</strong>: 18 - 360 tons<br><strong>Flow Rate</strong>: Up to 5,709 USGPM<br>Counterflow // Axial Fan // Induced Draft</p>',
                'image' => 'https://assets.snj.co.id/assets/img/80bd75f9c84ba565cd526511a3f26b37.png',
                'file'  => 'https://assets.snj.co.id/assets/pdf/b1f7dbf7330d39c6635a91afb975f5b8.pdf',
            ],
            [
                'brand' => 'bac',
                'bac_category' => 'closed_circuit_cooling_tower',
                'name' => 'Series V Closed Circuit Cooling Tower',
                'short_description' => 'The Series V Closed Circuit Cooling Tower is an ideal like-for-like replacement unit with the lowest replacement cost and no structural, electrical or piping modifications. High static and low sound capabilities.',
                'description' => '<p>The Series V Closed Circuit Cooling Tower is an ideal like-for-like replacement unit for many existing applications, offering the lowest replacement cost with no structural, electrical or piping modifications. Its high static and low sound capabilities makes it a great fit for indoor applications, ducted, and sound sensitive needs.</p><p><strong>Thermal Capacity</strong>: 3.9 - 614 tons<br><strong>Flow Rate</strong>: Up to 4,470 USGPM<br>Counterflow // Centrifugal Fan // Forced Draft</p>',
                'image' => 'https://assets.snj.co.id/assets/img/5b9c1117aa9a53794f692195a7948531.png',
                'file'  => 'https://assets.snj.co.id/assets/pdf/83df32f341aae5d5db6b15a9e9b5afd8.pdf',
            ],
            [
                'brand' => 'bac',
                'bac_category' => 'cooling_tower',
                'name' => 'Series 1500 Cooling Tower',
                'short_description' => 'The Series 1500 cooling tower is the best solution for applications requiring low maintenance and layout flexibility, as the single side air inlet design allows it to fit into tight spaces.',
                'description' => '<p>The Series 1500 cooling tower is the best solution for applications requiring low maintenance and layout flexibility, as the single side air inlet design allows it to fit into tight spaces. It also has the lowest energy and maintenance costs. You can easily access all major components from the interior of the unit. Extreme Efficiency (XE) models further reduce the unit\'s energy and operating costs.</p><p><strong>Thermal Capacity</strong>: 92 - 747 tons<br><strong>Flow Rate</strong>: Up to 3,150 USGPM<br>Crossflow // Axial Fan // Induced Draft</p>',
                'image' => 'https://assets.snj.co.id/assets/img/8e4da5900987f4be6a97e5ddf9f5cc82.png',
                'file'  => null,
            ],
            [
                'brand' => 'bac',
                'bac_category' => 'cooling_tower',
                'name' => 'Series 5000 Industrial Grade Modular Cooling Tower',
                'short_description' => 'The Series 5000 industrial grade modular cooling tower provides superior performance with maximum uptime for dirty water applications.',
                'description' => '<p>The Series 5000 industrial grade modular cooling tower provides superior performance with maximum uptime for dirty water applications. The Series 5000 has state-of-the-art technology for superior cleanability, the best corrosion-resistance, and the most reliable direct-drive fan system.</p>',
                'image' => 'https://assets.snj.co.id/assets/img/e03d80d7eaf28ad3306c49bc14bc3afe.png',
                'file'  => 'https://assets.snj.co.id/assets/pdf/ffafab2c40c1052f5307959c2d5fb42d.pdf',
            ],
            [
                'brand' => 'bac',
                'bac_category' => 'cooling_tower',
                'name' => 'Series V Cooling Tower',
                'short_description' => 'The Series V cooling tower is an ideal like-for-like replacement unit offering the lowest replacement cost with no structural, electrical or piping modifications. Can overcome high external static pressure.',
                'description' => '<p>The Series V cooling tower is an ideal like-for-like replacement unit for many existing applications, offering the lowest replacement cost with no structural, electrical or piping modifications. It can overcome high external static pressure and has low sound capabilities which makes it a great fit for indoor applications and for ducted and sound sensitive locations.</p><p><strong>Thermal Capacity</strong>: 12 - 1,335 tons<br><strong>Flow Rate</strong>: Up to 6,750 USGPM<br>Counterflow // Centrifugal Fan // Forced Draft</p>',
                'image' => 'https://assets.snj.co.id/assets/img/cf4070836482059cc3c05b7ea68495c5.png',
                'file'  => 'https://assets.snj.co.id/assets/pdf/0d6319646f73938cb7118aefd444ea1d.pdf',
            ],
            [
                'brand' => 'bac',
                'bac_category' => 'cooling_tower',
                'name' => 'FXT Cooling Tower',
                'short_description' => 'The FXT cooling tower delivers efficient performance and has the lowest operating costs for small scale projects. Standard design features satisfy today\'s environmental concerns.',
                'description' => '<p>The FXT cooling tower delivers efficient performance and has the lowest operating costs for small scale projects. Standard design features satisfy today\'s environmental concerns, minimize installation costs, maximize operating reliability, and simplify maintenance requirements.</p><p><strong>Thermal Capacity</strong>: 46 - 257 tons<br><strong>Flow Rate</strong>: Up to 1,155 USGPM<br>Crossflow // Axial Fan // Forced Draft</p>',
                'image' => 'https://assets.snj.co.id/assets/img/219475b3b80a7de3c55c18786c4832e5.png',
                'file'  => 'https://assets.snj.co.id/assets/pdf/254db0da35866ba91618211a72821ea1.pdf',
            ],
            [
                'brand' => 'bac',
                'bac_category' => 'evaporative_condenser',
                'name' => 'Vertex® Evaporative Condenser',
                'short_description' => 'The Vertex® Evaporative Condenser offers maximum uptime with easy and safe accessibility. It also has the lowest total cost of ownership with the lowest installation, maintenance, and operating costs.',
                'description' => '<p>The Vertex® Evaporative Condenser offers maximum uptime with easy and safe accessibility. It also has the lowest total cost of ownership with the lowest installation, maintenance, and operating costs.</p><p><strong>Thermal Capacity</strong>: 188 - 1,434 tons<br>Counterflow // EC Fan System with Controls (or Axial Fan) // Forced Draft</p>',
                'image' => 'https://assets.snj.co.id/assets/img/721623fad9d0193698667512c1f449b4.png',
                'file'  => 'https://assets.snj.co.id/assets/pdf/55f2e9c8acf61df2164959f02377d31c.pdf',
            ],
            [
                'brand' => 'bac',
                'bac_category' => 'evaporative_condenser',
                'name' => 'CXVT Evaporative Condenser',
                'short_description' => 'The CXVT Evaporative Condenser is perfect for large applications and has the lowest total cost of ownership, the lowest installation costs, and the best layout to maximize space.',
                'description' => '<p>The CXVT Evaporative Condenser is perfect for large applications and has the lowest total cost of ownership, the lowest installation costs, and the best layout to maximize space. The CXVT is available with XE (Extreme Efficiency) models to further reduce operating costs.</p><p><strong>Thermal Capacity</strong>: 540 - 2,114 tons<br>Combined Crossflow // Axial Fan // Induced Draft</p>',
                'image' => 'https://assets.snj.co.id/assets/img/6b82c5fb16d77ee08e45647a6c9e2ec3.png',
                'file'  => 'https://assets.snj.co.id/assets/pdf/5a1b64043e7e3ec7e67760445537a1b7.pdf',
            ],
            [
                'brand' => 'bac',
                'bac_category' => 'evaporative_condenser',
                'name' => 'CXVB Evaporative Condenser',
                'short_description' => 'The CXVB Evaporative Condenser delivers the highest system efficiency, minimizes maintenance and provides the lowest refrigerant charge in the industry.',
                'description' => '<p>The CXVB Evaporative Condenser delivers the highest system efficiency, minimizes maintenance and provides the lowest refrigerant charge in the industry.</p><p><strong>Thermal Capacity</strong>: 75 - 1,287 tons<br>Combined Crossflow // Axial Fan // Induced Draft</p>',
                'image' => 'https://assets.snj.co.id/assets/img/d79fe248ca60eec77d64e52967e195d0.png',
                'file'  => 'https://assets.snj.co.id/assets/pdf/e15922717139dbd6af7fe0eabd3f75ea.pdf',
            ],
            [
                'brand' => 'bac',
                'bac_category' => 'evaporative_condenser',
                'name' => 'PCC Evaporative Condenser',
                'short_description' => 'The PCC Evaporative Condenser is an ideal replacement unit that delivers higher performance than conventional counterflow solutions and lowers installation costs by reducing rigging time.',
                'description' => '<p>The PCC Evaporative Condenser is an ideal replacement unit that delivers higher performance than conventional counterflow solutions and lowers installation costs by reducing rigging time.</p><p><strong>Thermal Capacity</strong>: 46 - 2,734 tons<br>Counterflow // Axial Fan // Induced Draft</p>',
                'image' => 'https://assets.snj.co.id/assets/img/af56b73a01e5d5dd2819a5cd7e928d9f.png',
                'file'  => 'https://assets.snj.co.id/assets/pdf/7f1f2b941b3b0c7c74dca3b402b1bf0d.pdf',
            ],
            [
                'brand' => 'bac',
                'bac_category' => 'evaporative_condenser',
                'name' => 'Series V Evaporative Condenser',
                'short_description' => 'The Series V Evaporative Condenser is an ideal like-for-like replacement unit offering the lowest replacement cost with no structural, electrical or piping modifications. High static, low sound.',
                'description' => '<p>The Series V Evaporative Condenser is an ideal like-for-like replacement unit for many existing applications, offering the lowest replacement cost with no structural, electrical or piping modifications. Its high static and low sound capabilities makes it a great fit for indoor applications, ducted, and sound sensitive needs.</p><p><strong>Thermal Capacity</strong>: 7 - 1,140 tons<br>Counterflow // Centrifugal Fan // Forced Draft</p>',
                'image' => 'https://assets.snj.co.id/assets/img/fec88d701814dda07b62234eaa1b0f13.png',
                'file'  => 'https://assets.snj.co.id/assets/pdf/8c83cbf8c90337052990c98eb9ac776a.pdf',
            ],
            [
                'brand' => 'bac',
                'bac_category' => 'evaporative_condenser',
                'name' => 'VCA Evaporative Condenser',
                'short_description' => 'When your application calls for a workhorse, turn to the VCA Evaporative Condenser. From BAC\'s InterLok™ System to align the coil casing and basin to the pre-assembled platform packages.',
                'description' => '<p>When your application calls for a workhorse, turn to the VCA Evaporative Condenser. From BAC\'s InterLok™ System to align the coil casing and basin to the pre-assembled platform packages and unrestricted access to the motors, bearings, and fan, the VCA incorporates features which benefit the installer, operator, end-user, and owner.</p><p><strong>Thermal Capacity</strong>: 87 - 1,443 tons<br>Counterflow // Axial Fan // Forced Draft</p>',
                'image' => 'https://assets.snj.co.id/assets/img/2475278edeed504e959f780f791dcead.png',
                'file'  => 'https://assets.snj.co.id/assets/pdf/8cdb84545776706caca424971a5e0061.pdf',
            ],
            [
                'brand' => 'bac',
                'bac_category' => null,
                'name' => 'BAC Evaporative Cooling',
                'short_description' => 'Evaporative cooling solutions for sustainable comfort cooling.',
                'description' => '<p>BAC evaporative cooling products provide sustainable comfort cooling solutions using the natural evaporation principle.</p><ul><li>Water-efficient evaporative technology</li><li>Low energy consumption</li><li>Suitable for open and closed circuits</li></ul>',
                'image' => 'https://assets.snj.co.id/assets/img/7c909f8bfc428cd06e10d4c06c5feedb.png',
                'file'  => null,
            ],

            // ===== TIGER (brand_id=3) =====
            [
                'brand' => 'tiger',
                'bac_category' => null,
                'name' => 'Tiger Cast Iron Pipe',
                'short_description' => 'High-quality cast iron pipe for drainage and waste systems.',
                'description' => '<p>Tiger Cast Iron Pipe provides reliable soil and waste drainage solutions.</p><ul><li>Sound damping</li><li>Fire resistant</li><li>Long joint life</li></ul>',
                'image' => 'https://assets.snj.co.id/assets/img/e08309350b58b6bd84419d49989875fd.jpg',
                'file'  => 'https://assets.snj.co.id/assets/pdf/71b532d48e1179306cfde27c63ffc9cc.pdf',
            ],

            // ===== ARMACELL (brand_id=4) =====
            [
                'brand' => 'armacell',
                'bac_category' => null,
                'name' => 'Armaflex NBR Insulation',
                'short_description' => 'Closed-cell NBR foam insulation for HVAC pipes and ducts.',
                'description' => '<p>Armaflex is the leading flexible elastomeric foam insulation for HVAC applications, preventing condensation and reducing heat loss.</p><ul><li>Closed-cell structure</li><li>Built-in vapor barrier</li><li>Fire rated</li></ul>',
                'image' => 'https://assets.snj.co.id/assets/img/a85c5755422cb6164025e10376a768b0.jpg',
                'file'  => 'https://assets.snj.co.id/assets/pdf/a992ac17b9af7d60a773d86f35ac7838.pdf',
            ],
            [
                'brand' => 'armacell',
                'bac_category' => null,
                'name' => 'ArmaChek Silver',
                'short_description' => 'High-performance pipe covering with aluminum cladding.',
                'description' => '<p>ArmaChek Silver provides superior protection for pipes with an aluminum outer skin and flexible insulation core.</p><ul><li>Aluminum cladding</li><li>UV resistant</li><li>All-in-one solution</li></ul>',
                'image' => null,
                'file'  => 'https://assets.snj.co.id/assets/pdf/aaf900a9c3c2e9d556c712360598f867.pdf',
            ],
            [
                'brand' => 'armacell',
                'bac_category' => null,
                'name' => 'Armaflex Accessories',
                'short_description' => 'Complete range of adhesives, sealants, and installation accessories.',
                'description' => '<p>Official Armaflex installation accessories for guaranteed system integrity.</p><ul><li>Armaflex adhesive</li><li>Armaflex sealant</li><li>Armaflex tape</li></ul>',
                'image' => null,
                'file'  => 'https://assets.snj.co.id/assets/pdf/1059131f84a2dba8e0f9d6393b7afafe.pdf',
            ],
            [
                'brand' => 'armacell',
                'bac_category' => null,
                'name' => 'ArmaFlex 520 Adhesive',
                'short_description' => 'Quick drying contact adhesive for seamless ArmaFlex insulation installation.',
                'description' => '<p>ArmaFlex 520 adhesive is a quick drying contact adhesive specially formulated for uniform and safe seam bonding for ArmaFlex insulation materials (except ArmaFlex Ultima and HT/ArmaFlex). It is low viscosity for ease of use. When applied to clean surfaces and fully cured, it maintains high resistance to water vapour ingress.</p><p><strong>Applications:</strong> Acoustic insulation, Commercial, Energy, Industrial, Residential, Transportation</p>',
                'image' => 'https://assets.snj.co.id/assets/img/5dcb4db0a122d11afea3aaa1f4a0151e.jpg',
                'file'  => 'https://assets.snj.co.id/assets/pdf/89c68941deb73e5e5436484401f99733.pdf',
            ],
            [
                'brand' => 'armacell',
                'bac_category' => null,
                'name' => 'AP/ArmaFlex Insulation Tape',
                'short_description' => 'Mold-resistant, elastomeric pressure sensitive insulation tape for pipes and fittings.',
                'description' => '<p>AP/ArmaFlex Insulation Tape is a black, closed-cell, mold-resistant, elastomeric thermal insulation tape for insulating pipes and fittings. Provides a fast, easy method of insulating pipes and fittings.</p><p><strong>Applications:</strong> Thermal, Commercial building, Residential</p>',
                'image' => 'https://assets.snj.co.id/assets/img/119fc681f9c63fcd496c659dbbef77f6.jpg',
                'file'  => null,
            ],

            // ===== HIRA (brand_id=5) =====
            [
                'brand' => 'hira',
                'bac_category' => null,
                'name' => 'Aeroduct Flexible Duct Connector',
                'short_description' => 'Flexible duct connector for vibration and noise isolation.',
                'description' => '<p>Aeroduct Flexible Duct Connector isolates vibration and reduces noise transmission in HVAC duct systems.</p><ul><li>Fabric construction</li><li>Temperature resistant</li><li>Easy installation</li></ul>',
                'image' => null,
                'file'  => 'https://assets.snj.co.id/assets/pdf/bdbc60b1f7e5391be6965e7b3f1322ab.pdf',
            ],
            [
                'brand' => 'hira',
                'bac_category' => null,
                'name' => 'Aerofoam Insulation',
                'short_description' => 'Closed-cell foam insulation for pipes and equipment.',
                'description' => '<p>Aerofoam is a high-performance closed-cell insulation for HVAC and refrigeration applications.</p><ul><li>Closed-cell structure</li><li>High thermal efficiency</li><li>Moisture resistant</li></ul>',
                'image' => null,
                'file'  => 'https://assets.snj.co.id/assets/pdf/0bcd9ced9ccb03574446cfb218a6610f.pdf',
            ],
            [
                'brand' => 'hira',
                'bac_category' => null,
                'name' => 'Alupet Tape',
                'short_description' => 'Diamond/Aerofoam aluminum foil tape reinforced with PET film backing.',
                'description' => '<p>Diamond/Aerofoam Alupet Tape is a special aluminum foil tape reinforced with PET film backing combined with strong solvent acrylic adhesives and easy-release paper.</p><ul><li>Diamond/Aerofoam XLPE insulation closing</li><li>Air-conditioning duct lamination</li><li>Roofing flashing joint sealing</li><li>Refrigeration duct vapor sealing</li></ul><p><strong>Variants:</strong></p><ul><li>Solvent based</li><li>Rubber based</li></ul>',
                'image' => 'https://assets.snj.co.id/assets/img/51663a4a17c4e740d445d4932f27638b.jpg',
                'file'  => 'https://assets.snj.co.id/assets/pdf/d937c7557ed0a90448110904827c6f20.pdf',
            ],
            [
                'brand' => 'hira',
                'bac_category' => null,
                'name' => 'ADI1M — Insulated Flexible Duct',
                'short_description' => 'Insulated flexible duct for medium pressure HVAC systems.',
                'description' => '<p>ADI1M Insulated Flexible Duct by Aeroduct. Double laminated polyester inner core for good strength and flexibility, steel wire helix for durability and shape retention, strong vapour barrier outer jacket for moisture protection. Lightweight and easy to install with good thermal insulation performance. Fire rated as per BS standards. Suitable for medium pressure HVAC systems.</p><ul><li>Double laminated polyester inner core</li><li>Steel wire helix for durability</li><li>Strong vapour barrier outer jacket</li><li>Fire rated BS 476 Part 6 & 7</li><li>Suitable for medium pressure HVAC</li></ul><p><strong>Certifications:</strong> BS 476 Part 6 & 7 — Fire propagation and surface spread of flame</p><p><strong>Applications:</strong></p><ul><li>HVAC air distribution systems</li><li>Residential and commercial air conditioning</li><li>Ventilation systems in offices and buildings</li><li>Suitable for medium pressure air flow</li><li>Used in false ceiling ducting and insulated air systems</li></ul><p>Brand: Aeroduct | SKU: aero-adi1m-insulated-flexible-duct</p>',
                'image' => 'https://assets.snj.co.id/assets/img/b15fde9c429103cc968fe690a1554212.jpg',
                'file'  => null,
            ],
            [
                'brand' => 'hira',
                'bac_category' => null,
                'name' => 'ADUI3 — Uninsulated Flexible Duct',
                'short_description' => 'Uninsulated flexible duct for medium pressure and high velocity airflow.',
                'description' => '<p>ADUI3 Uninsulated Flexible Duct by Aeroduct. Triple laminated aluminium foil polyester inner core for strength and flexibility, corrosion-resistant steel wire helix for durability. Lightweight and easy to install. Suitable for uninsulated air flow. Fire rated as per BS 476 standards. Can handle medium pressure and high velocity airflow.</p><ul><li>Triple laminated aluminium foil polyester inner core</li><li>Corrosion-resistant steel wire helix</li><li>Lightweight and easy to install</li><li>Suitable for uninsulated air flow</li><li>Fire rated BS 476 Part 6 & 7</li><li>Handles medium pressure and high velocity</li></ul><p><strong>Certifications:</strong> BS 476 Part 6 & 7 — Fire propagation and surface spread of flame</p><p><strong>Applications:</strong></p><ul><li>HVAC air distribution in commercial, industrial, and residential buildings</li><li>Exhaust and ventilation systems</li><li>Areas where uninsulated flexible ducts are sufficient</li><li>Suitable for medium pressure air flow</li></ul><p>Brand: Aeroduct</p>',
                'image' => 'https://assets.snj.co.id/assets/img/4a40d9a3199a5bf2b790bd10fd597b84.jpg',
                'file'  => 'https://assets.snj.co.id/assets/pdf/test.pdf',
            ],

            // ===== VASEN (brand_id=6) =====
            [
                'brand' => 'vasen',
                'bac_category' => null,
                'name' => 'Weixing PPR Pipe',
                'short_description' => 'Polypropylene random pipe for hot and cold water distribution.',
                'description' => '<p>Weixing PPR Pipe provides reliable hot and cold water distribution with leak-free fusion welding.</p><ul><li>Heat fusion jointing</li><li>Corrosion resistant</li><li>Long service life</li></ul>',
                'image' => 'https://assets.snj.co.id/assets/img/cbe5019bc08e870bcb418882a7ff602b.jpg',
                'file'  => 'https://assets.snj.co.id/assets/pdf/3ad77071bc1155560e0ed054e48d4abf.pdf',
            ],
        ];

        foreach ($products as $p) {
            if (empty($p['brand']) || !$brands[$p['brand']]) {
                continue;
            }

            $slug = Str::slug($p['name']);

            Product::updateOrCreate(
                ['slug' => $slug],
                [
                    'brand_id'         => $brands[$p['brand']]->id,
                    'bac_category'     => $p['bac_category'],
                    'name'             => $p['name'],
                    'slug'             => $slug,
                    'short_description'=> $p['short_description'],
                    'description'      => $p['description'],
                    'image'            => $p['image'] ?? null,
                    'file'             => $p['file'] ?? null,
                    'order'           => 0,
                    'status'           => 'active',
                ]
            );
        }

        // Soft-delete products that should not appear (per SQL: motorized-valve and armachek-silver are soft-deleted)
        $softDeleteSlugs = ['motorized-valve', 'armachek-silver'];
        foreach ($softDeleteSlugs as $slug) {
            $product = Product::where('slug', $slug)->first();
            if ($product && !$product->trashed()) {
                $product->delete();
            }
        }
    }
}
