<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class LandingPage extends Component
{
    public $projects = [
        [
            'name' => 'E-Commerce Platform',
            'status' => 'In Progress',
            'roles' => ['Frontend Dev', 'Backend Dev', 'UI Designer'],
            'color' => 'blue',
            'description' =>
            'Platform belanja online yang memungkinkan pengguna menjelajahi, memesan, dan membayar produk dengan pengalaman antarmuka yang cepat dan responsif.',
        ],
        [
            'name' => 'Trading Platform',
            'status' => 'Open',
            'roles' => ['UI Designer', 'Backend Dev', 'Marketing'],
            'color' => 'purple',
            'description' =>
            'Aplikasi trading modern yang membantu pengguna memantau harga saham, melakukan transaksi, dan menganalisis performa portofolio secara real-time.',
        ],
        [
            'name' => 'WiseCommunity',
            'status' => 'Completed',
            'roles' => ['Content Writer', 'Social Media', 'Copywriter'],
            'color' => 'green',
            'description' =>
            'Platform komunitas berbasis edukasi yang menghubungkan para profesional untuk berbagi wawasan, pengalaman, dan ide-ide seputar dunia bisnis dan teknologi.',
        ],
        [
            'name' => 'Customer Portal',
            'status' => 'Completed',
            'roles' => ['Full Stack Dev', 'UX Designer', 'QA Tester'],
            'color' => 'orange',
            'description' =>
            'Portal pelanggan yang dirancang untuk mempermudah akses pengguna terhadap informasi akun, riwayat transaksi, dan dukungan pelanggan secara terpusat.',
        ],
        [
            'name' => 'Hackathon Project',
            'status' => 'Open',
            'roles' => ['Backend Dev', 'DevOps', 'Technical Writer'],
            'color' => 'yellow',
            'description' =>
            'Proyek kolaboratif dalam ajang hackathon untuk mengembangkan solusi digital inovatif dalam waktu terbatas dengan fokus pada performa dan skalabilitas.',
        ],
        [
            'name' => 'SaveIn: A Savings App',
            'status' => 'In Progress',
            'roles' => ['Mobile Dev', 'UI Designer', 'Product Manager'],
            'color' => 'green',
            'description' =>
            'Aplikasi tabungan pintar yang membantu pengguna mengelola keuangan pribadi, menetapkan target menabung, dan memantau progres keuangan harian mereka.',
        ],
    ];

    public $contributors = [
        [
            'name' => 'Alwi Wahyu',
            'role' => 'Frontend Developer',
            'projects' => 24,
            'avatar' => 'images/avatar/male-1.png',
        ],
        [
            'name' => 'Michael Chen',
            'role' => 'Backend Developer',
            'projects' => 18,
            'avatar' => 'images/avatar/male-2.png',
        ],
        [
            'name' => 'Emily Rodriguez',
            'role' => 'Sosial Media Manager',
            'projects' => 12,
            'avatar' => 'images/avatar/female-1.png',
        ],
        [
            'name' => 'David Kim',
            'role' => 'UX Designer',
            'projects' => 6,
            'avatar' => 'images/avatar/male-3.png',
        ],
    ];

    public $categories = [
        [
            'name' => 'Development',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
            </svg>',
            'count' => 45,
            'color' => 'purple',
        ],
        [
            'name' => 'Design',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12m-19.5 0l8.954 
                    8.955c.44.439 1.152.439 1.591 0L21.75 12m-19.5 0h19.5" />
            </svg>',
            'count' => 32,
            'color' => 'yellow',
        ],
        [
            'name' => 'Marketing',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M12 18.75V5.25m0 0l-7.5 7.5M12 5.25l7.5 7.5" />
            </svg>',
            'count' => 28,
            'color' => 'orange',
        ],
        [
            'name' => 'Sales',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M3 3v18h18V3H3zm3 3h12v12H6V6z" />
            </svg>',
            'count' => 21,
            'color' => 'orange',
        ],
        [
            'name' => 'Support',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-white">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M18.364 5.636a9 9 0 11-12.728 0m12.728 0A9 9 0 005.636 18.364m12.728 0A9 
                    9 0 0112 3v9l3.5 3.5" />
            </svg>',
            'count' => 38,
            'color' => 'blue',
        ],
        [
            'name' => 'Operations',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M12 8.25v7.5m3.75-3.75h-7.5M12 3.75a8.25 8.25 0 100 16.5 8.25 
                    8.25 0 000-16.5z" />
            </svg>',
            'count' => 19,
            'color' => 'green',
        ],
    ];

    public function getStatusColor($status)
    {
        return match (strtolower($status)) {
            'open' => 'bg-green-100 text-green-700',
            'in progress' => 'bg-yellow-100 text-yellow-700',
            'completed' => 'bg-red-100 text-red-700',
            default => 'bg-gray-100 text-gray-700',
        };
    }

    public function render()
    {
        return view('livewire.landing-page');
    }
}
