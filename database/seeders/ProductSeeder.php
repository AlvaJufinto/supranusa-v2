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
			[
				'brand' => 'siemens',
				'bac_category' => null,
				'name' => 'Chiller Sequencing Siemens',
				'short_description' => 'Siemens Chiller Sequencing is a control solution that coordinates the operation of multiple chillers based on cooling demand and equipment operating conditions, helping optimize chilled water plant performance and energy efficiency.',
				'description' => '<p><strong>Siemens Chiller Sequencing</strong> is a control function designed to coordinate the operation of multiple chillers within a chilled water plant. The sequencing strategy determines which chillers should operate and when additional chillers should be enabled based on the cooling demand and operating conditions of the system.</p><p>For plants with multiple chillers, coordinated sequencing helps match available cooling capacity with the actual load while considering the operating characteristics of individual chillers.</p><h3>Key Features</h3><ul><li><strong>Load-Based Sequencing</strong> — Adjusts number and combination of operating chillers according to cooling demand.</li><li><strong>Equipment Prioritization</strong> — Supports operating priorities based on characteristics and efficiency of individual chillers.</li><li><strong>Lead/Lag Operation</strong> — Coordinates sequence in which chillers are started and stopped.</li><li><strong>Run-Time Consideration</strong> — Operating hours considered when determining chiller sequencing and rotation.</li></ul>',
				'image' => null,
				'file'  => 'https://assets.snj.co.id/assets/pdf/f1885eecf9164f4a8f96cb79de7cc847.pdf',
			],

			// ===== BAC (brand_id=2) =====
			// ===== BAC =====

			[
				'brand' => 'bac',
				'bac_category' => 'open_cooling_tower',
				'name' => 'Series 3000 Cooling Tower',
				'slug' => 'series-3000-cooling-tower',
				'short_description' => 'High-efficiency crossflow cooling tower designed for reliable heat rejection, easy maintenance, and large commercial and industrial applications.',
				'description' => '<p>The BAC Series 3000 Cooling Tower is a high-efficiency open-circuit cooling tower designed for reliable heat rejection in commercial HVAC, industrial process cooling, and other large-scale applications. Its crossflow configuration uses axial fans and induced draft operation to move air through the tower while warm condenser or process water flows over the heat-transfer fill.</p><p>The Series 3000 is designed with an open interior that provides easy access to major components, simplifying inspection, cleaning, and routine maintenance. The optional ENDURADRIVE fan system is designed to reduce maintenance requirements, while Extreme Efficiency (XE) models are available for applications where lower energy and operating costs are priorities.</p><ul><li>Thermal capacity: 171–1,446 tons</li><li>Flow rate: up to 4,500 USGPM</li><li>Crossflow configuration</li><li>Axial fan with induced draft</li><li>Open interior for easier maintenance access</li><li>Optional ENDURADRIVE fan system</li><li>XE models available for improved energy efficiency</li></ul>',
				'image' => 'https://assets.snj.co.id/assets/img/e392153a8e54aa00d1446fdc5bd2c2ec.png',
				'file' => 'https://assets.snj.co.id/assets/pdf/6948d1ccf4468add4210bcffd722adac.pdf',
				'order' => 0,
				'status' => 1,
			],

			[
				'brand' => 'bac',
				'bac_category' => 'open_cooling_tower',
				'name' => 'Series 1500 Cooling Tower',
				'slug' => 'series-1500-cooling-tower',
				'short_description' => 'Flexible crossflow cooling tower with a single-side air inlet for tight spaces, low maintenance, and efficient operation.',
				'description' => '<p>The BAC Series 1500 Cooling Tower is an open-circuit crossflow cooling tower designed for applications where installation flexibility, low maintenance, and efficient operation are important. Its single-side air inlet allows the tower to be positioned in tighter spaces and provides greater flexibility when planning equipment layouts.</p><p>The interior of the unit provides access to major components for inspection and maintenance. The Series 1500 is suitable for commercial HVAC systems and industrial process cooling applications where space constraints and lifecycle operating costs need to be considered during equipment selection.</p><ul><li>Thermal capacity: 92–747 tons</li><li>Flow rate: up to 3,150 USGPM</li><li>Crossflow configuration</li><li>Axial fan with induced draft</li><li>Single-side air inlet</li><li>Designed for tight and space-constrained installations</li><li>Easy access to major components</li><li>XE models available for reduced energy and operating costs</li></ul>',
				'image' => 'https://assets.snj.co.id/assets/img/8e4da5900987f4be6a97e5ddf9f5cc82.png',
				'file' => null,
				'order' => 0,
				'status' => 1,
			],

			[
				'brand' => 'bac',
				'bac_category' => 'open_cooling_tower',
				'name' => 'Compass Series Cooling Tower',
				'slug' => 'compass-series-cooling-tower',
				'short_description' => 'Open-circuit crossflow cooling tower focused on efficient heat rejection, fast installation, and simplified maintenance.',
				'description' => '<p>The BAC Compass Series is an open-circuit crossflow cooling tower designed for condenser-water loops and industrial process cooling. The tower uses an axial fan and induced-draft configuration, with gravity water distribution across the heat-transfer fill.</p><p>The Compass Series is designed around installation and maintenance accessibility. Its open-plenum configuration provides access to internal components for inspection and servicing, while the construction and available configurations support projects ranging from commercial HVAC systems to industrial facilities and data center applications.</p><p>The Compass Series is also positioned for projects where installation time, maintenance access, operational efficiency, and long-term reliability are important selection criteria.</p><ul><li>Open-circuit cooling tower</li><li>Crossflow configuration</li><li>Axial fan with induced draft</li><li>Gravity water distribution</li><li>Designed for condenser-water and process cooling</li><li>Thermal capacity reported at approximately 753–6,370 kW</li><li>Flow rate up to approximately 285 L/s</li><li>Designed for easier inspection and maintenance access</li></ul>',
				'image' => null,
				'file' => null,
				'order' => 0,
				'status' => 1,
			],

			[
				'brand' => 'bac',
				'bac_category' => 'open_cooling_tower',
				'name' => 'Smart Series Cooling Tower',
				'slug' => 'smart-series-cooling-tower',
				'short_description' => 'Compact crossflow cooling tower designed for small to medium projects with practical installation, maintenance, and operating requirements.',
				'description' => '<p>The BAC Smart Series Cooling Tower is an open-circuit crossflow cooling tower designed primarily for small to medium-scale cooling projects. Hot condenser or process water flows downward through the fill while air moves horizontally through the fill, providing evaporative heat rejection.</p><p>The Smart Series focuses on practical project requirements such as relatively straightforward installation, accessible maintenance, and efficient operation. It is suited to commercial buildings, industrial facilities, HVAC systems, and projects where a compact and economical cooling tower solution is required.</p><p>The product is also available with project-specific engineering and selection support, allowing the final configuration to be matched to local weather conditions, cooling duty, water flow, and operating requirements.</p><ul><li>Open-circuit cooling tower</li><li>Crossflow configuration</li><li>Axial fan</li><li>Designed for small to medium projects</li><li>Practical installation and maintenance approach</li><li>Suitable for HVAC and industrial applications</li><li>Project-specific selection based on cooling requirements and local conditions</li></ul>',
				'image' => null,
				'file' => null,
				'order' => 0,
				'status' => 1,
			],

			[
				'brand' => 'bac',
				'bac_category' => 'open_cooling_tower',
				'name' => 'PT2 Cooling Tower',
				'slug' => 'pt2-cooling-tower',
				'short_description' => 'Compact counterflow cooling tower designed to deliver high cooling capacity where installation space is limited.',
				'description' => '<p>The BAC PT2 Cooling Tower is a compact open-circuit counterflow cooling tower designed to provide a high amount of cooling capacity within a relatively small footprint. It is particularly suited to projects where available equipment space is limited and maximizing cooling output per unit of footprint is important.</p><p>The PT2 uses an axial fan and induced-draft configuration. Its compact layout makes it useful for retrofit applications and installations where surrounding structures, walls, or other equipment restrict the available space around the cooling tower.</p><p>The design also provides practical access and replacement considerations, making the PT2 suitable for both new installations and replacement projects.</p><ul><li>Thermal capacity: 103–827 tons</li><li>Flow rate: up to 3,100 USGPM</li><li>Counterflow configuration</li><li>Axial fan with induced draft</li><li>Compact footprint</li><li>Designed for space-constrained applications</li><li>Suitable for retrofit and replacement projects</li></ul>',
				'image' => 'https://assets.snj.co.id/assets/img/9317a148eb5df4cce1cc149ca4e39519.png',
				'file' => 'https://assets.snj.co.id/assets/pdf/cdcba8918a868e3cc8ec348be42391ef.pdf',
				'order' => 0,
				'status' => 1,
			],

			[
				'brand' => 'bac',
				'bac_category' => 'open_cooling_tower',
				'name' => 'VT0 / VT1 Cooling Tower',
				'slug' => 'vt0-vt1-cooling-tower',
				'short_description' => 'BAC Series V cooling tower models using counterflow, centrifugal-fan, forced-draft technology for flexible commercial and industrial applications.',
				'description' => '<p>The BAC VT0 and VT1 are model families within the BAC Series V open cooling tower line. They use the Series V counterflow configuration with centrifugal fans and forced-draft airflow, making them suitable for applications where installation flexibility, external static pressure, sound characteristics, or equipment layout are important considerations.</p><p>The centrifugal fan configuration allows the tower to overcome static pressure from external ductwork, which can make Series V equipment suitable for indoor or ducted installations. The product family also includes a wide range of VT0 and VT1 model configurations for different thermal and airflow requirements.</p><p>BAC technical parts documentation continues to identify both VT0 and VT1 model numbers within the Series V Cooling Tower product family.</p><ul><li>Series V open cooling tower family</li><li>Counterflow configuration</li><li>Centrifugal fan</li><li>Forced-draft operation</li><li>Suitable for ducted and indoor applications</li><li>Designed to handle external static pressure</li><li>Wide range of VT0 and VT1 configurations</li></ul>',
				'image' => null,
				'file' => null,
				'order' => 0,
				'status' => 1,
			],

			[
				'brand' => 'bac',
				'bac_category' => 'open_cooling_tower',
				'name' => 'VTL Cooling Tower',
				'slug' => 'vtl-cooling-tower',
				'short_description' => 'Low-profile Series V cooling tower configuration designed for height-restricted installations and flexible indoor or ducted applications.',
				'description' => '<p>The BAC VTL Cooling Tower is a low-profile configuration within the Series V cooling tower family. It is designed for applications where overall equipment height is restricted, such as installations with limited rooftop clearance, indoor mechanical rooms, or projects where architectural constraints limit the available vertical space.</p><p>The Series V configuration uses counterflow heat transfer with centrifugal fans and forced-draft airflow. The centrifugal fans can overcome external static pressure from ductwork, providing additional installation flexibility for indoor and ducted applications.</p><p>VTL configurations are particularly useful when a conventional high-profile cooling tower cannot meet the available installation height or airflow arrangement.</p><ul><li>Low-profile Series V configuration</li><li>Counterflow design</li><li>Centrifugal fan</li><li>Forced-draft operation</li><li>Suitable for height-restricted installations</li><li>Can accommodate external ductwork and static pressure</li><li>Suitable for indoor and sound-sensitive applications</li></ul>',
				'image' => null,
				'file' => null,
				'order' => 0,
				'status' => 1,
			],

			[
				'brand' => 'bac',
				'bac_category' => 'closed_circuit_open_cooling_tower',
				'name' => 'FXV Closed Circuit Cooling Tower',
				'slug' => 'fxv-closed-circuit-cooling-tower',
				'short_description' => 'Closed-loop cooling tower designed to reduce energy, maintenance, and installation costs across a broad range of applications.',
				'description' => '<p>The BAC FXV Closed Circuit Cooling Tower is a closed-loop heat rejection system designed for applications where the process fluid needs to remain isolated from the evaporative water circuit. This configuration helps maintain the cleanliness and quality of the process fluid while still providing evaporative heat rejection.</p><p>The FXV uses a combined crossflow configuration with axial fans and induced-draft airflow. The product line is designed to provide an efficient balance between thermal performance, footprint, installation requirements, and lifecycle operating costs.</p><p>The FXV is suitable for HVAC, industrial process cooling, data center cooling, and other closed-loop applications where dependable heat rejection and reduced maintenance are important.</p><ul><li>Thermal capacity: 29–424 tons</li><li>Flow rate: up to 3,600 USGPM</li><li>Closed-loop heat rejection</li><li>Combined crossflow configuration</li><li>Axial fan with induced draft</li><li>Designed to reduce energy, maintenance, and installation costs</li><li>Suitable for HVAC and industrial applications</li></ul>',
				'image' => 'https://assets.snj.co.id/assets/img/3447ea8d8517de065506e325287371fc.png',
				'file' => 'https://assets.snj.co.id/assets/pdf/94e6a62254005c9371ad6cdacbdbfb4e.pdf',
				'order' => 0,
				'status' => 1,
			],

			[
				'brand' => 'bac',
				'bac_category' => 'closed_circuit_open_cooling_tower',
				'name' => 'HXV Hybrid Cooler',
				'slug' => 'hxv-hybrid-cooler',
				'short_description' => 'Hybrid fluid cooler combining evaporative and dry cooling to balance water consumption, energy efficiency, and system performance.',
				'description' => '<p>The BAC HXV Hybrid Cooler combines evaporative and dry cooling technologies in a single heat rejection system. The hybrid configuration allows the equipment to adapt its operating strategy to application conditions, helping balance water consumption and energy use while maintaining system performance.</p><p>The HXV is particularly suited to applications where water availability, water cost, uptime, or visible plume are important considerations. It provides a solution for projects that need the benefits of evaporative cooling while also requiring periods of dry operation.</p><p>The HXV uses a crossflow configuration with axial fans and induced-draft airflow. BAC lists the HXV with thermal capacity up to 396 tons and flow rates up to 1,260 USGPM.</p><ul><li>Hybrid evaporative and dry cooling</li><li>Thermal capacity up to 396 tons</li><li>Flow rate up to 1,260 USGPM</li><li>Crossflow configuration</li><li>Axial fan with induced draft</li><li>Designed to reduce water consumption</li><li>Useful where water availability or cost is a concern</li><li>Suitable for applications where plume management is important</li></ul>',
				'image' => null,
				'file' => null,
				'order' => 0,
				'status' => 1,
			],

			[
				'brand' => 'bac',
				'bac_category' => 'closed_circuit_open_cooling_tower',
				'name' => 'VF1 Closed Circuit Cooling Tower',
				'slug' => 'vf1-closed-circuit-cooling-tower',
				'short_description' => 'Series V closed circuit cooling tower configuration designed for reliable closed-loop heat rejection with centrifugal forced-draft airflow.',
				'description' => '<p>The BAC VF1 Closed Circuit Cooling Tower is a configuration within the Series V closed circuit cooling tower family. It is designed for closed-loop applications where the process fluid is circulated through a heat-transfer coil while evaporative water is used externally to reject heat to the atmosphere.</p><p>The Series V closed circuit design uses counterflow heat transfer with centrifugal fans and forced-draft airflow. The centrifugal fan arrangement provides the ability to overcome external static pressure, supporting indoor, ducted, and sound-sensitive installations.</p><p>The VF1 configuration is also associated with discharge-hood configurations for applications where airflow routing and sound control need to be considered.</p><ul><li>Closed-loop heat rejection</li><li>Series V closed circuit platform</li><li>Counterflow configuration</li><li>Centrifugal fan</li><li>Forced-draft operation</li><li>Suitable for indoor and ducted applications</li><li>Suitable for sound-sensitive installations</li></ul>',
				'image' => null,
				'file' => null,
				'order' => 0,
				'status' => 1,
			],

			[
				'brand' => 'bac',
				'bac_category' => 'closed_circuit_open_cooling_tower',
				'name' => 'FXV3 Closed Circuit Cooling Tower',
				'slug' => 'fxv3-closed-circuit-cooling-tower',
				'short_description' => 'High-capacity closed circuit cooling tower designed for large projects requiring high thermal performance, reliability, and space efficiency.',
				'description' => '<p>The BAC FXV3 Closed Circuit Cooling Tower is a high-capacity closed-loop heat rejection system designed specifically for large cooling projects. It extends the FXV platform to higher thermal loads while maintaining the advantages of closed-loop cooling and evaporative heat rejection.</p><p>The FXV3 uses a combined crossflow configuration with axial fans and induced-draft airflow. BAC positions the FXV3 for projects where system efficiency and available installation space are major design considerations, including large commercial, industrial, and mission-critical facilities.</p><p>The FXV3 is designed to provide a high amount of cooling capacity per cell, helping reduce the number of cells and associated installation requirements for large systems.</p><ul><li>Thermal capacity: 278–765 tons</li><li>Flow rate: up to 7,110 USGPM</li><li>Closed-loop heat rejection</li><li>Combined crossflow configuration</li><li>Axial fan with induced draft</li><li>High capacity per cell</li><li>Designed for large-scale cooling projects</li><li>Focus on system efficiency and space savings</li></ul>',
				'image' => 'https://assets.snj.co.id/assets/img/d1b93e486bbbaf4c859fe2f4b3ff9797.png',
				'file' => 'https://assets.snj.co.id/assets/pdf/36095d7de85d679a522595b692dcc0a3.pdf',
				'order' => 0,
				'status' => 1,
			],

			[
				'brand' => 'bac',
				'bac_category' => 'evaporative_condenser',
				'name' => 'CXVB Evaporative Condenser',
				'slug' => 'cxvb-evaporative-condenser',
				'short_description' => 'High-efficiency evaporative condenser designed to maximize system performance while minimizing maintenance and refrigerant charge.',
				'description' => '<p>The BAC CXVB Evaporative Condenser is designed for industrial refrigeration and other applications requiring efficient refrigerant condensation. Evaporative condenser technology allows refrigerant vapor to reject heat through a coil that is continuously sprayed with water while fans move air through the unit.</p><p>The CXVB uses a combined crossflow configuration with axial fans and induced-draft airflow. BAC positions the CXVB around high system efficiency, reduced maintenance requirements, and low refrigerant charge, making it suitable for large refrigeration installations where lifecycle performance is important.</p><p>The CXVB is available across a wide range of thermal capacities and can be selected for both commercial and industrial refrigeration applications.</p><ul><li>Thermal capacity: 75–1,287 tons</li><li>Combined crossflow configuration</li><li>Axial fan with induced draft</li><li>High system efficiency</li><li>Low refrigerant charge</li><li>Reduced maintenance requirements</li><li>Suitable for industrial refrigeration</li></ul>',
				'image' => 'https://assets.snj.co.id/assets/img/d79fe248ca60eec77d64e52967e195d0.png',
				'file' => 'https://assets.snj.co.id/assets/pdf/e15922717139dbd6af7fe0eabd3f75ea.pdf',
				'order' => 0,
				'status' => 1,
			],

			[
				'brand' => 'bac',
				'bac_category' => 'evaporative_condenser',
				'name' => 'VC1 Evaporative Condenser',
				'slug' => 'vc1-evaporative-condenser',
				'short_description' => 'Series V evaporative condenser using centrifugal fans for indoor, ducted, high-static, and sound-sensitive refrigeration applications.',
				'description' => '<p>The BAC VC1 Evaporative Condenser is part of the Series V Evaporative Condenser family and is designed for refrigeration applications where installation flexibility and airflow control are important. The centrifugal fan configuration allows the equipment to handle external static pressure from ductwork and supports indoor installations.</p><p>The Series V evaporative condenser platform is designed for applications requiring reliable heat rejection with relatively low sound characteristics. This makes VC1 configurations suitable for facilities where equipment location, sound, or duct routing can restrict the use of conventional axial-fan equipment.</p><p>BAC technical documentation identifies a wide range of VC1 and VC1-C model configurations within the Series V evaporative condenser family.</p><ul><li>Series V evaporative condenser</li><li>Counterflow configuration</li><li>Centrifugal fan</li><li>Forced-draft operation</li><li>Suitable for indoor installations</li><li>Suitable for ducted applications</li><li>Designed for high external static pressure</li><li>Suitable for sound-sensitive installations</li></ul>',
				'image' => null,
				'file' => null,
				'order' => 0,
				'status' => 1,
			],

			[
				'brand' => 'bac',
				'bac_category' => 'evaporative_condenser',
				'name' => 'Vertex® Evaporative Condenser',
				'slug' => 'vertex-evaporative-condenser',
				'short_description' => 'High-performance evaporative condenser focused on maximum uptime, accessibility, and low total cost of ownership.',
				'description' => '<p>The BAC Vertex® Evaporative Condenser is designed for industrial refrigeration applications where uptime, accessibility, and lifecycle cost are critical. The unit is designed to provide efficient refrigerant condensation while simplifying access for inspection, maintenance, and service.</p><p>The Vertex uses a counterflow configuration with either an EC fan system with controls or an axial fan configuration, depending on the selected model. Its design focuses on reducing installation, maintenance, and operating costs over the life of the equipment.</p><p>The Vertex is suitable for demanding refrigeration systems where dependable operation and service accessibility are important selection criteria.</p><ul><li>Thermal capacity: 188–1,434 tons</li><li>Counterflow configuration</li><li>EC fan system with controls or axial fan options</li><li>Forced-draft operation</li><li>High uptime focus</li><li>Easy and safe accessibility</li><li>Designed for low installation and maintenance costs</li><li>Designed for low operating cost</li></ul>',
				'image' => 'https://assets.snj.co.id/assets/img/721623fad9d0193698667512c1f449b4.png',
				'file' => 'https://assets.snj.co.id/assets/pdf/55f2e9c8acf61df2164959f02377d31c.pdf',
				'order' => 0,
				'status' => 1,
			],

			[
				'brand' => 'bac',
				'bac_category' => 'evaporative_condenser',
				'name' => 'CXVT Evaporative Condenser',
				'slug' => 'cxvt-evaporative-condenser',
				'short_description' => 'Large-capacity evaporative condenser optimized for large refrigeration systems, space efficiency, and low total cost of ownership.',
				'description' => '<p>The BAC CXVT Evaporative Condenser is designed for large industrial refrigeration applications where high thermal capacity, efficient heat rejection, and efficient use of installation space are important. The unit uses a combined crossflow configuration with axial fans and induced-draft airflow.</p><p>The CXVT is designed to provide a favorable balance between equipment footprint, installation cost, operating cost, and long-term system performance. BAC also offers Extreme Efficiency (XE) models for applications where reducing energy consumption and operating costs is a major priority.</p><p>Its large capacity range makes the CXVT particularly suited to large refrigeration plants and other applications with substantial heat rejection requirements.</p><ul><li>Thermal capacity: 540–2,114 tons</li><li>Combined crossflow configuration</li><li>Axial fan with induced draft</li><li>Designed for large refrigeration applications</li><li>Space-efficient layout</li><li>Low installation cost focus</li><li>Low total cost of ownership</li><li>XE models available for improved efficiency</li></ul>',
				'image' => 'https://assets.snj.co.id/assets/img/6b82c5fb16d77ee08e45647a6c9e2ec3.png',
				'file' => 'https://assets.snj.co.id/assets/pdf/5a1b64043e7e3ec7e67760445537a1b7.pdf',
				'order' => 0,
				'status' => 1,
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
				'image' => 'https://assets.snj.co.id/assets/img/cd2a6a98dbb886205a012ef9178e242d.webp',
				'file'  => 'https://assets.snj.co.id/assets/pdf/57cd4dd81a4ee260376dea7f8b8cc8ab.pdf',
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
					'short_description' => $p['short_description'],
					'description'      => $p['description'],
					'image'            => $p['image'] ?? null,
					'file'             => $p['file'] ?? null,
					'order'           => 0,
					'status'           => 'active',
				]
			);
		}

		// Soft-delete products that should not appear (per SQL: motorized-valve and armachek-silver are soft-deleted)
		$softDeleteSlugs = [
			'motorized-valve',
			'armachek-silver',
			'aeroduct-flexible-duct-connector',
			'aerofoam-insulation',
			'armaflex-accessories',
			'bac-evaporative-cooling',
			'smart-vent',
			'chiller-sequencing-siemens',
		];
		foreach ($softDeleteSlugs as $slug) {
			$product = Product::where('slug', $slug)->first();
			if ($product && !$product->trashed()) {
				$product->delete();
			}
		}
	}
}