<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            // --- TOP TIER / FEATURED PROJECTS ---
            [
                'slug' => 'hostoo',
                'title' => 'Hostoo',
                'category' => 'Cloud & DevOps',
                'tags' => ['Laravel', 'GCP', 'CyberPanel', 'Billing'],
                'description' => 'Platform penyedia jasa hosting PHP otomatis yang terintegrasi langsung dengan Google Cloud Platform dan CyberPanel.',
                'content' => "## Tentang Hostoo\n\nHostoo adalah platform penyedia jasa hosting PHP otomatis yang terintegrasi langsung dengan Google Cloud Platform dan CyberPanel.\n\n### Fitur Utama\n- Automated PHP hosting provisioning\n- GCP integration\n- CyberPanel management\n- Billing system\n\n### Tech Stack\n- Laravel\n- Google Cloud Platform\n- CyberPanel API",
                'featured' => true,
                'order' => 1,
            ],
            [
                'slug' => 'skyflow',
                'title' => 'SkyFlow',
                'category' => 'Cloud & DevOps',
                'tags' => ['Nuxt.js', 'Go', 'Docker', 'PaaS'],
                'description' => 'Layanan deployment modern berbasis container (mirip Railway/Heroku) untuk berbagai bahasa pemrograman.',
                'content' => "## Tentang SkyFlow\n\nSkyFlow adalah layanan deployment modern berbasis container yang mirip dengan Railway atau Heroku.\n\n### Fitur Utama\n- Multi-language support\n- Docker-based deployment\n- Real-time logs\n- Auto-scaling\n\n### Tech Stack\n- Nuxt.js (Frontend)\n- Go (Backend)\n- Docker",
                'featured' => true,
                'order' => 2,
            ],
            [
                'slug' => 'kumbung-jamur',
                'title' => 'Kumbung Jamur IoT',
                'category' => 'IoT & Systems',
                'tags' => ['Next.js', 'IoT', 'MQTT', 'Real-time'],
                'description' => 'Dashboard monitoring suhu dan kelembaban kumbung jamur tiram, terintegrasi sensor IoT untuk pemantauan kondisi lingkungan budidaya.',
                'content' => "## Tentang Kumbung Jamur IoT\n\nSistem monitoring IoT untuk pemantauan kondisi kumbung jamur tiram secara real-time.\n\n### Fitur Utama\n- Real-time temperature monitoring\n- Humidity tracking\n- MQTT integration\n- Historical data analysis\n\n### Tech Stack\n- Next.js\n- MQTT Protocol\n- IoT Sensors",
                'featured' => true,
                'order' => 3,
            ],
            [
                'slug' => 'posify',
                'title' => 'Posify',
                'category' => 'Mobile App',
                'tags' => ['Flutter', 'Dart', 'API Integration'],
                'description' => 'Aplikasi mobile e-commerce makanan dengan UI/UX modern, mendukung manajemen keranjang dan tracking pesanan.',
                'content' => "## Tentang Posify\n\nAplikasi mobile e-commerce makanan dengan UI/UX yang modern dan intuitif.\n\n### Fitur Utama\n- Product catalog\n- Shopping cart\n- Order tracking\n- Payment integration\n\n### Tech Stack\n- Flutter\n- Dart\n- REST API",
                'featured' => true,
                'order' => 4,
            ],

            // --- SYSTEMS & APPLICATIONS ---
            [
                'slug' => 'besra-geonet',
                'title' => 'BESRA GeoNet',
                'category' => 'Web App',
                'tags' => ['Next.js', 'Django REST', 'Billing'],
                'description' => 'Sistem manajemen pelanggan dan billing untuk penyedia layanan internet (ISP/RT RW Net).',
                'content' => "## Tentang BESRA GeoNet\n\nSistem manajemen pelanggan dan billing untuk ISP/RT RW Net.\n\n### Fitur Utama\n- Customer management\n- Billing automation\n- Network monitoring\n- Invoice generation",
                'featured' => false,
                'order' => 5,
            ],
            [
                'slug' => 'sikatup',
                'title' => 'Sikatup (PLN)',
                'category' => 'IoT & Systems',
                'tags' => ['Laravel', 'Monitoring', 'Enterprise'],
                'description' => 'Sistem monitoring kondisi Trafo untuk PT PLN guna mencegah kerusakan aset vital.',
                'content' => "## Tentang Sikatup\n\nSistem monitoring kondisi Trafo untuk PT PLN.\n\n### Fitur Utama\n- Real-time trafo monitoring\n- Alert system\n- Maintenance scheduling\n- Report generation",
                'featured' => false,
                'order' => 6,
            ],
            [
                'slug' => 'siaga',
                'title' => 'SIAGA',
                'category' => 'Web App',
                'tags' => ['Laravel', 'Emergency Response', 'Real-time'],
                'description' => 'Sistem Informasi dan Penanganan Gawat Darurat untuk koordinasi respons cepat dalam situasi darurat.',
                'content' => "## Tentang SIAGA\n\nSistem Informasi dan Penanganan Gawat Darurat.\n\n### Fitur Utama\n- Emergency reporting\n- Real-time coordination\n- Response tracking\n- Incident management",
                'featured' => false,
                'order' => 7,
            ],
            [
                'slug' => 'swiftyle',
                'title' => 'Swiftyle',
                'category' => 'Mobile App',
                'tags' => ['Laravel', 'Ionic', 'E-commerce'],
                'description' => 'Platform fashion hybrid: Web Admin untuk penjual dan Mobile App (Ionic) untuk pembeli.',
                'content' => "## Tentang Swiftyle\n\nPlatform fashion hybrid dengan Web Admin dan Mobile App.\n\n### Fitur Utama\n- Product management\n- Mobile shopping app\n- Order management\n- Payment gateway",
                'featured' => false,
                'order' => 7,
            ],
            [
                'slug' => 'echolytics',
                'title' => 'Echolytics',
                'category' => 'AI & Data',
                'tags' => ['Django', 'Python', 'NLP', 'Crawling'],
                'description' => 'Tool analisis sentimen otomatis yang melakukan crawling komentar media sosial berdasarkan topik user.',
                'content' => "## Tentang Echolytics\n\nTool analisis sentimen otomatis untuk media sosial.\n\n### Fitur Utama\n- Social media crawling\n- Sentiment analysis\n- Topic modeling\n- Visualization dashboard",
                'featured' => false,
                'order' => 8,
            ],
            [
                'slug' => 'green-cold',
                'title' => 'Green Cold Products',
                'category' => 'Web App',
                'tags' => ['Laravel', 'QR Code', 'Inventory'],
                'description' => 'Manajemen inventaris dengan fitur generasi dan scan QR Code untuk label fisik barang.',
                'content' => "## Tentang Green Cold Products\n\nSistem manajemen inventaris dengan QR Code.\n\n### Fitur Utama\n- QR Code generation\n- Inventory tracking\n- Stock management\n- Barcode scanning",
                'featured' => false,
                'order' => 9,
            ],
            [
                'slug' => 'certisend',
                'title' => 'Certisend',
                'category' => 'Tools',
                'tags' => ['Laravel', 'Automation', 'Mail'],
                'description' => 'Aplikasi pengirim sertifikat massal otomatis berbasis data Excel dan template PDF.',
                'content' => "## Tentang Certisend\n\nAplikasi pengiriman sertifikat massal otomatis.\n\n### Fitur Utama\n- Excel data import\n- PDF template\n- Bulk email sending\n- Email tracking",
                'featured' => false,
                'order' => 10,
            ],
            [
                'slug' => 'aurora',
                'title' => 'Aurora',
                'category' => 'Creative',
                'tags' => ['React.js', 'Canvas', 'Drawing'],
                'description' => 'Aplikasi sketchpad/drawing board berbasis web yang interaktif.',
                'content' => "## Tentang Aurora\n\nAplikasi sketchpad/drawing board web interaktif.\n\n### Fitur Utama\n- Canvas drawing\n- Multiple brushes\n- Color picker\n- Export functionality",
                'featured' => false,
                'order' => 11,
            ],

            // --- INTERNSHIP & COMMUNITY ---
            [
                'slug' => 'cbi-portal-supplier',
                'title' => 'Portal Supplier (CBI)',
                'category' => 'Internship',
                'tags' => ['CodeIgniter 4', 'Enterprise'],
                'description' => 'Sistem manajemen supplier untuk PT Century Batteries Indonesia.',
                'content' => "## Tentang Portal Supplier CBI\n\nSistem manajemen supplier untuk PT Century Batteries Indonesia.\n\n### Fitur Utama\n- Supplier registration\n- Document management\n- Purchase order tracking\n- Reporting",
                'featured' => false,
                'order' => 12,
            ],
            [
                'slug' => 'cbi-audit-vendor',
                'title' => 'Portal Audit Vendor (CBI)',
                'category' => 'Internship',
                'tags' => ['CodeIgniter 4', 'Audit'],
                'description' => 'Digitalisasi proses audit vendor eksternal perusahaan.',
                'content' => "## Tentang Portal Audit Vendor CBI\n\nDigitalisasi proses audit vendor eksternal.\n\n### Fitur Utama\n- Audit scheduling\n- Checklist management\n- Finding tracking\n- Audit reports",
                'featured' => false,
                'order' => 13,
            ],

            [
                'slug' => 'web-desa-mekarjaya',
                'title' => 'Web Desa Mekarjaya',
                'category' => 'Community',
                'tags' => ['Laravel', 'Public Service'],
                'description' => 'Portal informasi desa dan layanan pengajuan surat online untuk warga (KKN 2025).',
                'content' => "## Tentang Web Desa Mekarjaya\n\nPortal informasi desa dan layanan online.\n\n### Fitur Utama\n- Village information\n- Online letter request\n- News & announcements\n- Community directory",
                'featured' => false,
                'order' => 14,
            ],
        ];

        foreach ($projects as $projectData) {
            $project = Project::create($projectData);

            // Auto-seed images from project folder if exists
            $folderPath = public_path('images/projects/' . $projectData['slug']);
            if (is_dir($folderPath)) {
                $files = scandir($folderPath);
                $imageFiles = array_filter($files, function($file) use ($folderPath) {
                    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    return in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']) && is_file($folderPath . '/' . $file);
                });

                sort($imageFiles);
                $order = 1;
                $thumbnailSet = false;

                foreach ($imageFiles as $file) {
                    $imagePath = 'images/projects/' . $projectData['slug'] . '/' . $file;

                    // Set thumbnail from 01.xxx file
                    $filename = pathinfo($file, PATHINFO_FILENAME);
                    if ($filename === '01' && !$thumbnailSet) {
                        $project->update(['thumbnail' => $imagePath]);
                        $thumbnailSet = true;
                    }

                    ProjectImage::create([
                        'project_id' => $project->id,
                        'image_path' => $imagePath,
                        'caption' => $projectData['title'] . ' - Screenshot ' . $order,
                        'order' => $order,
                    ]);
                    $order++;
                }
            }
        }
    }
}
