<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::factory()->create([
            'title' => 'github',
            'link' => 'https://github.com/jsvlr',
            'image_url' => 'images/contact/github.png',
        ]);
    }
}
