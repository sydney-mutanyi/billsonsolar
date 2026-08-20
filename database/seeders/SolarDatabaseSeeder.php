<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Solution;
use App\Models\Blog;

class SolarDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed Categories
        $categoriesData = [
            ['name' => 'Solar Panels', 'slug' => 'panels', 'icon' => 'sun'],
            ['name' => 'Solar Batteries', 'slug' => 'batteries', 'icon' => 'battery'],
            ['name' => 'Solar Inverters', 'slug' => 'inverters', 'icon' => 'zap'],
            ['name' => 'Charge Controllers', 'slug' => 'controllers', 'icon' => 'sliders'],
            ['name' => 'Solar Lights', 'slug' => 'lights', 'icon' => 'lamp'],
        ];

        $categories = [];
        foreach ($categoriesData as $c) {
            $categories[$c['slug']] = Category::updateOrCreate(['slug' => $c['slug']], $c);
        }

        // 2. Seed Brands
        $brandsData = [
            ['name' => 'Deye Solar', 'slug' => 'deye'],
            ['name' => 'Victron Energy', 'slug' => 'victron'],
            ['name' => 'Growatt', 'slug' => 'growatt'],
            ['name' => 'BYD / Vestwoods', 'slug' => 'byd'],
            ['name' => 'GoodWe', 'slug' => 'goodwe'],
            ['name' => 'Felicity Solar', 'slug' => 'felicity'],
        ];

        $brands = [];
        foreach ($brandsData as $b) {
            $brands[$b['slug']] = Brand::updateOrCreate(['slug' => $b['slug']], $b);
        }

        // 3. Seed Products
        $productsData = [
            [
                'title' => '550W Monocrystalline Solar Panel — High Efficiency Grade A',
                'slug' => '550w-monocrystalline-solar-panel',
                'category_id' => $categories['panels']->id,
                'brand_id' => $brands['deye']->id,
                'price' => 18500,
                'rating' => 4.9,
                'reviews' => 124,
                'badge' => 'Best Seller',
                'image' => 'images/product_solar_panel.png',
                'is_featured' => true,
                'specs' => [
                    'Max Power (Pmax)' => '550W',
                    'Efficiency' => '21.5%',
                    'Cell Type' => 'N-Type Monocrystalline Half-Cell',
                    'Dimensions' => '2278 x 1134 x 35 mm',
                    'Warranty' => '12 Years Product, 25 Years Performance'
                ]
            ],
            [
                'title' => '5.12kWh LiFePO4 Lithium Battery — 100Ah 51.2V Rack Mount',
                'slug' => '5-12kwh-lifepo4-lithium-battery',
                'category_id' => $categories['batteries']->id,
                'brand_id' => $brands['byd']->id,
                'price' => 95000,
                'rating' => 4.8,
                'reviews' => 89,
                'badge' => 'New Arrival',
                'image' => 'images/product_lithium_battery.png',
                'is_featured' => true,
                'specs' => [
                    'Nominal Capacity' => '5.12 kWh (100Ah / 51.2V)',
                    'Chemistry' => 'Grade A LiFePO4 Chemistry',
                    'Cycle Life' => '> 6,000 Cycles @ 80% DOD',
                    'Communication' => 'CANbus / RS485 (Deye, Victron, Growatt)',
                    'Warranty' => '10 Years Full Warranty'
                ]
            ],
            [
                'title' => '5kW Hybrid Solar Inverter — Dual MPPT, Wi-Fi Monitoring 48V',
                'slug' => '5kw-hybrid-solar-inverter',
                'category_id' => $categories['inverters']->id,
                'brand_id' => $brands['deye']->id,
                'price' => 72000,
                'rating' => 5.0,
                'reviews' => 203,
                'badge' => 'Top Rated',
                'image' => 'images/product_hybrid_inverter.png',
                'is_featured' => true,
                'specs' => [
                    'Rated AC Output' => '5,000W Pure Sine Wave',
                    'Max PV Input' => '6,500W Dual MPPT',
                    'Battery Voltage' => '48V Low Voltage',
                    'Transfer Time' => '< 10ms UPS Backup',
                    'Warranty' => '5 Years Standard Warranty'
                ]
            ],
            [
                'title' => 'Victron SmartSolar MPPT 100/50 Charge Controller',
                'slug' => 'victron-smartsolar-mppt-100-50',
                'category_id' => $categories['controllers']->id,
                'brand_id' => $brands['victron']->id,
                'price' => 24800,
                'rating' => 4.9,
                'reviews' => 67,
                'badge' => 'Premium Grade',
                'image' => 'images/product_mppt_controller.png',
                'is_featured' => true,
                'specs' => [
                    'Max Charge Current' => '50A',
                    'Max PV Voltage' => '100V',
                    'Battery System' => '12/24/48V Auto Select',
                    'Bluetooth Built-In' => 'VictronConnect App',
                    'Warranty' => '5 Years Warranty'
                ]
            ],
            [
                'title' => 'Growatt 10kW Three-Phase Hybrid Solar Inverter',
                'slug' => 'growatt-10kw-three-phase-inverter',
                'category_id' => $categories['inverters']->id,
                'brand_id' => $brands['growatt']->id,
                'price' => 145000,
                'rating' => 4.9,
                'reviews' => 42,
                'badge' => 'Commercial',
                'is_featured' => false,
                'image' => 'images/product_hybrid_inverter.png',
                'specs' => [
                    'AC Output' => '10,000W 3-Phase 400V',
                    'MPPT Trackers' => '2 Independent Trackers',
                    'Max Efficiency' => '98.2%',
                    'Warranty' => '5 Years'
                ]
            ],
            [
                'title' => '10.24kWh High-Voltage Lithium Battery Stack',
                'slug' => '10-24kwh-high-voltage-lithium-stack',
                'category_id' => $categories['batteries']->id,
                'brand_id' => $brands['felicity']->id,
                'price' => 180000,
                'rating' => 4.8,
                'reviews' => 31,
                'badge' => 'High Capacity',
                'is_featured' => false,
                'image' => 'images/product_lithium_battery.png',
                'specs' => [
                    'Capacity' => '10.24 kWh Stackable',
                    'Nominal Voltage' => '102.4V',
                    'Cycle Life' => '6,000+ Cycles',
                    'Warranty' => '10 Years'
                ]
            ]
        ];

        foreach ($productsData as $p) {
            Product::updateOrCreate(['slug' => $p['slug']], $p);
        }

        // 4. Seed Solutions
        $solutionsData = [
            [
                'solution_key' => 'residential',
                'title' => 'Residential Solar Systems',
                'badge' => 'Home & Villa',
                'tagline' => 'Zero Blackouts & Save Up to 90% on KPLC Bills',
                'desc' => 'Custom hybrid and off-grid solar packages engineered for 3 to 6-bedroom Kenyan residences. Clean quiet backup energy during outages.',
                'capacity' => '3kW – 10kW Hybrid',
                'battery' => '5.12kWh – 15kWh LiFePO4',
                'savings' => 'KES 12,000 – 45,000 / month',
                'price' => 'KES 380,000',
                'features' => [
                    'Grade A Tier-1 Monocrystalline Panels',
                    'Smart Hybrid Inverter (Wi-Fi Monitoring)',
                    '10-Year Lithium Battery Warranty',
                    'Turnkey Professional Installation',
                    'Full Surge Protection & AC/DC DB Box'
                ]
            ],
            [
                'solution_key' => 'commercial',
                'title' => 'Commercial Solar Systems',
                'badge' => 'Business & Office',
                'tagline' => 'Turn Energy Overhead Into Long-Term Capital Savings',
                'desc' => 'High-yield solar installations for office buildings, retail centers, hotels, and schools across Kenya.',
                'capacity' => '15kW – 100kW+',
                'battery' => '14.3kWh High-Voltage Rack',
                'savings' => 'KES 75,000 – 350,000 / month',
                'price' => 'KES 1,250,000',
                'features' => [
                    'EPRA Compliant Grid-Tie / Hybrid Setup',
                    'Industrial Grade Inverters (Deye / Huawei)',
                    'Net Metering Ready Grid Interconnection',
                    '2.5-Year Average Payback Period',
                    'Free Quarterly Performance Audit'
                ]
            ],
            [
                'solution_key' => 'agricultural',
                'title' => 'Agricultural & Water Pumping',
                'badge' => 'Farm & Off-Grid',
                'tagline' => 'Reliable Solar Water Pumping for Irrigation & Livestock',
                'desc' => 'Heavy-duty solar pumping kits and off-grid power arrays designed for Kenyan farms, greenhouses, and borehole water projects.',
                'capacity' => '1.5HP – 15HP Submersible',
                'battery' => 'Direct Solar Drive / Optional Storage',
                'savings' => 'Zero Diesel Generator Fuel Costs',
                'price' => 'KES 290,000',
                'features' => [
                    'Stainless Steel DC Submersible Pump',
                    'Automatic MPPT Pump Controller',
                    'Dry-Run Protection & Water Level Sensors',
                    'Heavy Duty Galvanized Steel Ground Mount',
                    '2-Year Full On-Site Warranty'
                ]
            ]
        ];

        foreach ($solutionsData as $s) {
            Solution::updateOrCreate(['solution_key' => $s['solution_key']], $s);
        }

        // 5. Seed Blog Posts
        $blogsData = [
            [
                'title' => 'How to Choose the Right Solar System Size for Your Kenya Home',
                'slug' => 'how-to-choose-right-solar-system-size-kenya-home',
                'category' => 'Solar Guides',
                'author' => 'Bills On Solar Engineering Team',
                'cover_image' => 'images/product_solar_panel.png',
                'excerpt' => 'Sizing your solar system correctly is the single most important decision you\'ll make. Too small and you\'ll still face blackouts. Too large and you overspend. Here\'s how to get it exactly right.',
                'body' => '<h2>Understanding Your Energy Consumption</h2><p>The first step to sizing a solar system for your Kenyan home is calculating your daily energy consumption in kilowatt-hours (kWh). Start by listing every electrical appliance you use, its wattage, and how many hours per day you use it.</p><p>A typical 3-bedroom Nairobi home uses between 8–15 kWh per day. A 4–5 bedroom villa with air conditioning and a water pump may consume 20–30 kWh per day.</p><h2>The Simple Sizing Formula</h2><p>Once you know your daily usage, the formula is straightforward:</p><ul><li><strong>Solar Panel Array</strong> = Daily kWh ÷ 4 peak sun hours (Kenya average) × 1.25 system loss factor</li><li><strong>Battery Storage</strong> = Daily kWh × Days of autonomy × 1.2 (depth of discharge factor)</li><li><strong>Inverter Size</strong> = Sum of all appliances that run simultaneously</li></ul><h2>Kenya-Specific Considerations</h2><p>Kenya enjoys excellent solar irradiance averaging 4.5–5.5 peak sun hours per day depending on your county. Nairobi, Nakuru, and Central Kenya regions average 4.5 hours, while the Coast and Rift Valley enjoy up to 5.5 hours — meaning smaller panel arrays can produce the same energy output.</p><h2>Battery Chemistry: LiFePO4 vs AGM</h2><p>We strongly recommend LiFePO4 (Lithium Iron Phosphate) batteries for all new solar installations in Kenya. They last 6,000+ cycles compared to 500–1,000 cycles for lead-acid AGM, have no maintenance requirements, and tolerate Kenya\'s heat better. The higher upfront cost delivers 8–10x better lifetime value.</p><p>Contact our engineering team for a free, no-obligation system sizing consultation for your property.</p>',
                'read_time' => 7,
                'is_published' => true,
                'is_featured' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Why LiFePO4 Lithium Batteries Are the Future of Solar Storage in Kenya',
                'slug' => 'lifepo4-lithium-batteries-future-solar-storage-kenya',
                'category' => 'Battery Technology',
                'author' => 'Bills On Solar Engineering Team',
                'cover_image' => 'images/product_lithium_battery.png',
                'excerpt' => 'Lithium Iron Phosphate (LiFePO4) batteries are rapidly replacing lead-acid across Kenya\'s solar market — and for very good reason. Here\'s everything you need to know.',
                'body' => '<h2>The Problem with Lead-Acid in Kenya</h2><p>For decades, lead-acid (AGM and flooded) batteries dominated Kenya\'s solar market. Cheap upfront, but expensive over time. A typical 200Ah lead-acid battery bank lasts 2–3 years in Kenya\'s hot climate before capacity drops below 60% — requiring costly replacement.</p><h2>Why LiFePO4 Changes Everything</h2><p>LiFePO4 batteries operate on a fundamentally different electrochemistry that delivers exceptional advantages for Kenya\'s solar conditions:</p><ul><li><strong>6,000+ Charge Cycles</strong> vs 500–800 for lead-acid — that\'s 15–20 years of service life</li><li><strong>Zero Maintenance</strong> — no water topping, no equalization charges, no venting</li><li><strong>Flat Discharge Curve</strong> — delivers consistent voltage until fully depleted, meaning appliances run at full power longer</li><li><strong>80% Depth of Discharge</strong> vs 50% for lead-acid — meaning a 100Ah LiFePO4 gives you 80Ah usable vs only 50Ah from lead-acid</li><li><strong>Thermal Stability</strong> — safe at Kenya\'s ambient temperatures without risk of thermal runaway</li></ul><h2>Real Cost Comparison</h2><p>A 200Ah lead-acid battery bank costs ~KES 45,000 and lasts 3 years = KES 15,000/year. A 200Ah LiFePO4 battery costs ~KES 95,000 and lasts 15 years = KES 6,300/year. The lithium battery is 58% cheaper per year of service.</p><h2>Compatible Inverters in Kenya</h2><p>Our LiFePO4 batteries communicate via CANbus or RS485 with all major hybrid inverters available in Kenya: Deye, Growatt, GoodWe, Victron, and Huawei. This enables intelligent charging, State of Charge (SoC) monitoring, and cell balancing from the inverter display.</p>',
                'read_time' => 6,
                'is_published' => true,
                'is_featured' => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'EPRA Solar Regulations in Kenya: What You Need to Know Before Installing',
                'slug' => 'epra-solar-regulations-kenya-what-you-need-to-know',
                'category' => 'Regulations & Compliance',
                'author' => 'Bills On Solar Engineering Team',
                'cover_image' => 'images/product_hybrid_inverter.png',
                'excerpt' => 'The Energy and Petroleum Regulatory Authority (EPRA) governs all solar installations in Kenya. Non-compliance risks fines, insurance voidance, and disconnection. Here\'s what every solar buyer must know.',
                'body' => '<h2>Who is EPRA?</h2><p>The Energy and Petroleum Regulatory Authority (EPRA) is Kenya\'s energy sector regulator under the Energy Act 2019. All solar PV systems above 1kW installed on the public grid or requiring grid interconnection must comply with EPRA standards and obtain relevant permits.</p><h2>When Do You Need EPRA Approval?</h2><ul><li><strong>Grid-Tie Systems</strong>: Any solar system that exports power back to KPLC requires EPRA grid interconnection approval and a net metering agreement with Kenya Power.</li><li><strong>Large Off-Grid Systems</strong>: Commercial systems above 50kW require EPRA licensing of the solar contractor.</li><li><strong>Off-Grid/Hybrid Below 50kW</strong>: Residential hybrid systems typically fall under self-supply regulations with simplified requirements.</li></ul><h2>EPRA-Certified Solar Contractors</h2><p>EPRA requires that solar PV installations above 1kW be designed and supervised by a registered electrical engineer or EPRA-licensed solar contractor. Bills On Solar works with EPRA-certified electrical engineers for all commercial and grid-tie projects, ensuring full compliance and valid documentation for your insurance and property records.</p><h2>Net Metering: Sell Excess Solar to KPLC</h2><p>Kenya Power\'s net metering scheme allows residential and commercial solar system owners to export unused solar electricity back to the KPLC grid and receive credit on their monthly electricity bill. Contact us to find out if net metering is viable for your property and consumption pattern.</p>',
                'read_time' => 5,
                'is_published' => true,
                'is_featured' => false,
                'published_at' => now()->subDays(20),
            ],
        ];

        foreach ($blogsData as $b) {
            Blog::updateOrCreate(['slug' => $b['slug']], $b);
        }
    }
}
