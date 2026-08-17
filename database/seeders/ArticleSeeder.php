<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Understanding HVAC Energy Efficiency Standards in Indonesia',
                'excerpt' => 'A comprehensive guide to SNI standards and regulations for commercial HVAC systems in Indonesia.',
                'content' => '<p>As Indonesia continues to develop its infrastructure, energy efficiency in HVAC systems has become a critical concern for building owners and engineers alike. This article explores the key standards and best practices that can help reduce energy consumption while maintaining optimal comfort levels.</p><h2>Key Indonesian Standards</h2><p>The National Standardization Agency (BSN) has established several standards relevant to HVAC systems, including SNI for energy efficiency ratings and testing procedures. Building managers should ensure their HVAC installations comply with these regulations.</p><h2>Best Practices</h2><ul><li>Regular maintenance schedules</li><li>Upgrade to inverter-driven equipment</li><li>Implement Building Management Systems (BMS)</li><li>Use high-efficiency filters</li></ul><p>By following these guidelines, buildings can achieve significant energy savings while reducing their environmental footprint.</p>',
                'status' => 'published',
            ],
            [
                'title' => 'Cooling Tower Maintenance: A Technical Guide',
                'excerpt' => 'Essential maintenance procedures for industrial cooling towers to ensure optimal performance and longevity.',
                'content' => '<p>Cooling towers are critical components in many industrial and commercial HVAC systems. Proper maintenance not only extends equipment life but also ensures efficient heat rejection, which directly impacts system performance and energy costs.</p><h2>Scheduled Maintenance Tasks</h2><p>Monthly and quarterly maintenance checklists should include basin cleaning, nozzle inspection, fill media evaluation, and water treatment verification. Annual professional inspections are recommended for larger installations.</p><h2>Water Treatment</h2><p>Proper water treatment is essential to prevent scale, corrosion, and biological growth. Regular testing and chemical dosing will keep the system operating efficiently and prevent costly repairs.</p>',
                'status' => 'published',
            ],
            [
                'title' => 'Data Center Cooling: Challenges and Solutions',
                'excerpt' => 'How modern data centers are addressing thermal management challenges with innovative HVAC solutions.',
                'content' => '<p>Data centers consume massive amounts of energy, with cooling alone accounting for approximately 40% of total facility energy use. As server densities increase, traditional cooling methods are becoming inadequate.</p><h2>Modern Approaches</h2><p>Leading data center operators are implementing hot/cold aisle containment, liquid cooling, and free cooling using outside air. These approaches can reduce cooling energy by 50% or more.</p><h2>Key Considerations</h2><ul><li>Temperature and humidity control</li><li>Redundancy requirements</li><li>Integration with BMS</li><li>Maintenance accessibility</li></ul>',
                'status' => 'published',
            ],
            [
                'title' => 'The Role of Building Automation in HVAC Optimization',
                'excerpt' => 'How Building Management Systems (BMS) are transforming HVAC operations in commercial buildings.',
                'content' => '<p>Building Automation Systems (BAS) or Building Management Systems (BMS) have become indispensable tools for optimizing HVAC performance. These systems provide real-time monitoring and control that was previously impossible with manual operations.</p><h2>Key BMS Functions</h2><p>Modern BMS platforms integrate HVAC, lighting, fire safety, and security systems into a unified control interface. Advanced analytics can identify optimization opportunities and predict equipment failures before they occur.</p><h2>Integration Benefits</h2><p>By integrating all building systems, operators can coordinate responses to occupancy changes, weather conditions, and utility rate structures to minimize operational costs while maintaining comfort.</p>',
                'status' => 'published',
            ],
            [
                'title' => 'Insulation Materials: Comparing NBR and EPDM for HVAC Applications',
                'excerpt' => 'A technical comparison of NBR and EPDM elastomeric insulation for pipes and ducts.',
                'content' => '<p>Choosing the right insulation material is crucial for HVAC system efficiency. Two of the most common elastomeric foam materials used in HVAC applications are NBR (Nitrile Butadiene Rubber) and EPDM (Ethylene Propylene Diene Monomer).</p><h2>NBR Insulation</h2><p>NBR-based insulation, such as Armaflex, offers excellent thermal performance and built-in vapor barrier properties. It is particularly suited for chilled water and refrigeration applications.</p><h2>EPDM Insulation</h2><p>EPDM provides superior UV resistance and broader temperature range capability, making it ideal for outdoor applications where exposure to sunlight is a concern.</p><h2>Selection Criteria</h2><p>Consider temperature range, moisture exposure, UV exposure, and fire safety requirements when selecting insulation materials for your specific application.</p>',
                'status' => 'published',
            ],
            [
                'title' => 'Smart Valves: The Future of HVAC Flow Control',
                'excerpt' => 'Exploring intelligent valve technology and its impact on HVAC system efficiency.',
                'content' => '<p>Intelligent valves represent a significant advancement in HVAC flow control technology. Unlike traditional valves, smart valves incorporate sensors, actuators, and communication capabilities that enable precise, automated control.</p><h2>Pressure Independent Control Valves (PICV)</h2><p>PICVs automatically regulate flow regardless of pressure fluctuations in the system. This ensures consistent hydronic balancing and optimal performance across all terminal units.</p><h2>Benefits of Smart Valves</h2><ul><li>Automatic hydronic balancing</li><li>Real-time flow monitoring</li><li>Remote diagnostics</li><li>Energy savings up to 20%</li></ul>',
                'status' => 'draft',
            ],
        ];

        foreach ($articles as $a) {
            $slug = Str::slug($a['title']);
            Article::create([
                'title' => $a['title'],
                'slug' => $slug,
                'excerpt' => $a['excerpt'],
                'content' => $a['content'],
                'thumbnail' => null,
                'status' => $a['status'],
                'published_at' => $a['status'] === 'published' ? now() : null,
                'meta_title' => $a['title'],
                'meta_description' => $a['excerpt'],
                'meta_keywords' => 'HVAC, ' . implode(', ', array_slice(explode(' ', $a['title']), 0, 4)),
            ]);
        }
    }
}
