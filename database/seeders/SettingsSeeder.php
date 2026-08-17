<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'company_name',    'group' => 'general', 'type' => 'text',     'value' => 'PT SUPRANUSA NIAGAJAYA'],
            ['key' => 'tagline',          'group' => 'general', 'type' => 'text',     'value' => 'Energy-Efficient Technology For The Entire Building'],
            ['key' => 'hero_title',       'group' => 'general', 'type' => 'text',     'value' => 'Energy-Efficient Technology For The Entire Building'],
            ['key' => 'hero_subtitle',    'group' => 'general', 'type' => 'text',     'value' => 'WE PROVIDE YOU THE BEST SERVICE'],

            // SEO
            ['key' => 'meta_description', 'group' => 'seo',     'type' => 'text',     'value' => 'HVAC distributor: Siemens BMS & controls, BAC cooling towers, TIGER cast iron, VASEN PPR, HIRA Aerofoam flexible duct, Armaflex pipe insulation, PrudentAire dampers, DJLS ducting fabrication.'],
            ['key' => 'theme_color',      'group' => 'seo',     'type' => 'text',     'value' => '#9d1f20'],

            // About
            ['key' => 'about_content',    'group' => 'about',   'type' => 'textarea', 'value' => "SUPRANUSA NIAGAJAYA was established in May 1990 as an electrical contractor specializing in generator sets. Following Indonesia's rapid construction growth, in January 1992 we expanded into mechanical works as a supplier and service provider.\n\nToday, we are a trusted distributor for selected Mechanical, Electrical & Electronic products, supported by dedicated and experienced teams committed to customer satisfaction.\n\nWe are glad to serve you wherever you are.\n\n— Management of PT. SUPRANUSA NIAGAJAYA"],
            ['key' => 'about_year_established',   'group' => 'about', 'type' => 'text', 'value' => '1990'],
            ['key' => 'about_expansion_year',     'group' => 'about', 'type' => 'text', 'value' => '1992'],
            ['key' => 'about_values',  'group' => 'about', 'type' => 'textarea', 'value' => "Professionalism — Reliable, detail-oriented, accountable.\nPassion — Driven to serve and improve.\nExcellence — High standards in every delivery."],

            // Contact
            ['key' => 'contact_address',  'group' => 'contact', 'type' => 'textarea', 'value' => "Kirana Boutique Office, Blok B2/9\nJl. Boulevard Raya No.1, Kelapa Gading\nNorth Jakarta — 14240"],
            ['key' => 'contact_phone',     'group' => 'contact', 'type' => 'text',     'value' => '+62 21 224 50 109'],
            ['key' => 'contact_fax',      'group' => 'contact', 'type' => 'text',     'value' => '+62 21 224 50 120'],
            ['key' => 'contact_email',    'group' => 'contact', 'type' => 'text',     'value' => 'mkt@snj.co.id'],
            ['key' => 'contact_website',  'group' => 'contact', 'type' => 'text',     'value' => 'www.snj.co.id'],

            // Product descriptions (homepage rail)
            ['key' => 'product_bac',      'group' => 'products', 'type' => 'textarea', 'value' => "The world's cooling partner. Baltimore Aircoil Company delivers sustainable solutions for comfort/process cooling and refrigeration.\n\nInnovation & leadership. Advancing evaporative cooling since 1938 with a focus on water and energy efficiency.\n\nSustainability. Solutions that enhance health, safety, and productivity while reducing environmental impact.\n\nIndustry role. Global expertise that supports resilient operations and economic growth."],
            ['key' => 'product_armacell', 'group' => 'products', 'type' => 'textarea', 'value' => "Flexible elastomeric foam insulation for HVAC/R and industrial equipment; engineered foams for performance and comfort.\n\nApplications include chilled water, refrigerant lines, and condensation control."],
            ['key' => 'product_siemens',  'group' => 'products', 'type' => 'textarea', 'value' => "Electrification, automation, and digitalization for buildings.\n\nHVAC controls (controllers, sensors, actuators) and Desigo BMS for reliable, energy-efficient operations."],
            ['key' => 'product_pipes',    'group' => 'products', 'type' => 'textarea', 'value' => "TIGER cast-iron: Durable soil/drain/vent systems and hubless fittings for commercial buildings.\n\nVASEN PPR: Hot & cold water piping, food-grade, heat-fusion joints with long service life."],
            ['key' => 'product_hira',     'group' => 'products', 'type' => 'textarea', 'value' => "Aerofoam flexible ducts, insulation and accessories for quick installation and lightweight air distribution.\n\nSuitable for commercial fit-outs, retail, and retrofit projects."],
            ['key' => 'product_ducting', 'group' => 'products', 'type' => 'textarea', 'value' => "Custom ductwork and accessories (hangers, flanges, elbows, transitions) with in-house quality control.\n\nFabricated to project specifications and site logistics."],
        ];

        foreach ($settings as $s) {
            Setting::updateOrCreate(
                ['key' => $s['key']],
                ['group' => $s['group'], 'type' => $s['type'], 'value' => $s['value']]
            );
        }
    }
}
