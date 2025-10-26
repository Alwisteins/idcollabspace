<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'UI UX Designer',
            'Graphic Designer',
            'Frontend Developer',
            'Backend Developer',
            'Fullstack Developer',
            'Mobile Developer',
            'AI / ML Engineer',
            'Cyber Security',
            'DevOps',
            'QA',
            'Content Writter',
            'Growth / Marketer',
            'Sosial Media Manager',
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }
    }
}
