<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // === 1️⃣ Categories ===
        $categories = [
            ['id' => 1, 'name' => 'E-Commerce'],
            ['id' => 2, 'name' => 'Finance'],
            ['id' => 3, 'name' => 'Community'],
            ['id' => 4, 'name' => 'Customer Service'],
            ['id' => 5, 'name' => 'Hackathon'],
            ['id' => 6, 'name' => 'Fintech'],
        ];

        DB::table('categories')->insert($categories);

        // === 2️⃣ Projects ===
        $projects = [
            [
                'id' => 1,
                'owner_id' => 1, // ganti sesuai ID user yang ada
                'title' => 'E-Commerce Platform',
                'description' => 'Platform belanja online yang memungkinkan pengguna menjelajahi, memesan, dan membayar produk dengan antarmuka cepat dan responsif.',
                'category_id' => 1,
                'status' => 'in progress',
                'start_date' => '2025-01-01',
                'end_date' => '2025-06-01',
                'is_paid' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'owner_id' => 1,
                'title' => 'Trading Platform',
                'description' => 'Aplikasi trading modern yang membantu pengguna memantau harga saham, melakukan transaksi, dan menganalisis performa portofolio real-time.',
                'category_id' => 2,
                'status' => 'open',
                'start_date' => '2025-02-01',
                'end_date' => '2025-07-01',
                'is_paid' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'owner_id' => 1,
                'title' => 'WiseCommunity',
                'description' => 'Platform komunitas berbasis edukasi yang menghubungkan profesional untuk berbagi wawasan dan ide seputar bisnis dan teknologi.',
                'category_id' => 3,
                'status' => 'completed',
                'start_date' => '2024-07-01',
                'end_date' => '2024-12-01',
                'is_paid' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'owner_id' => 1,
                'title' => 'Customer Portal',
                'description' => 'Portal pelanggan untuk mempermudah akses informasi akun, riwayat transaksi, dan dukungan pelanggan secara terpusat.',
                'category_id' => 4,
                'status' => 'completed',
                'start_date' => '2024-09-01',
                'end_date' => '2025-02-01',
                'is_paid' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 5,
                'owner_id' => 1,
                'title' => 'Hackathon Project',
                'description' => 'Proyek kolaboratif hackathon untuk mengembangkan solusi digital inovatif dengan fokus pada performa dan skalabilitas.',
                'category_id' => 5,
                'status' => 'open',
                'start_date' => '2025-03-01',
                'end_date' => '2025-03-10',
                'is_paid' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 6,
                'owner_id' => 1,
                'title' => 'SaveIn: A Savings App',
                'description' => 'Aplikasi tabungan pintar untuk mengelola keuangan pribadi, target menabung, dan memantau progres harian pengguna.',
                'category_id' => 6,
                'status' => 'in progress',
                'start_date' => '2025-04-01',
                'end_date' => '2025-09-01',
                'is_paid' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('projects')->insert($projects);

        // === 3️⃣ Project Roles ===
        $projectRoles = [
            // Project 1 - E-Commerce Platform
            ['project_id' => 1, 'role_id' => 3, 'quantity' => 1, 'created_at' => $now],
            ['project_id' => 1, 'role_id' => 4, 'quantity' => 1, 'created_at' => $now],
            ['project_id' => 1, 'role_id' => 1, 'quantity' => 1, 'created_at' => $now],

            // Project 2 - Trading Platform
            ['project_id' => 2, 'role_id' => 1, 'quantity' => 1, 'created_at' => $now],
            ['project_id' => 2, 'role_id' => 4, 'quantity' => 1, 'created_at' => $now],
            ['project_id' => 2, 'role_id' => 12, 'quantity' => 1, 'created_at' => $now],

            // Project 3 - WiseCommunity
            ['project_id' => 3, 'role_id' => 11, 'quantity' => 1, 'created_at' => $now],
            ['project_id' => 3, 'role_id' => 13, 'quantity' => 1, 'created_at' => $now],
            ['project_id' => 3, 'role_id' => 12, 'quantity' => 1, 'created_at' => $now],

            // Project 4 - Customer Portal
            ['project_id' => 4, 'role_id' => 5, 'quantity' => 1, 'created_at' => $now],
            ['project_id' => 4, 'role_id' => 1, 'quantity' => 1, 'created_at' => $now],
            ['project_id' => 4, 'role_id' => 10, 'quantity' => 1, 'created_at' => $now],

            // Project 5 - Hackathon Project
            ['project_id' => 5, 'role_id' => 4, 'quantity' => 1, 'created_at' => $now],
            ['project_id' => 5, 'role_id' => 9, 'quantity' => 1, 'created_at' => $now],
            ['project_id' => 5, 'role_id' => 11, 'quantity' => 1, 'created_at' => $now],

            // Project 6 - SaveIn
            ['project_id' => 6, 'role_id' => 6, 'quantity' => 1, 'created_at' => $now],
            ['project_id' => 6, 'role_id' => 1, 'quantity' => 1, 'created_at' => $now],
            ['project_id' => 6, 'role_id' => 12, 'quantity' => 1, 'created_at' => $now],
        ];

        DB::table('project_roles')->insert($projectRoles);
    }
}
