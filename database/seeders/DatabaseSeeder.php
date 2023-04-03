<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use App\Models\Blog;
use App\Models\CartItems;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Country;
use App\Models\Newsletter;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductReview;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\State;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::factory()->create([
            'name' => 'For Men',
            'description' => 'This category products belongs to men.',
        ]);
        Category::factory()->create([
            'name' => 'For Women',
            'description' => 'This category products belongs to women.',
        ]);
        Category::factory()->create([
            'name' => 'For Children',
            'description' => 'This category products belongs to children.',
        ]);
        Category::factory()->create([
            'name' => 'For All',
            'description' => 'This category products belongs to all.',
        ]);

        SubCategory::factory(20)->create();

        Product::factory(10)->create();

        User::factory(8)->create();
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 1,
            'email_verified_at' => Carbon::now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);


        Country::factory(10)->create();
        State::factory(10)->create();
        Address::factory(10)->create();

        Size::factory()->create([
            'name' => 'SM',
        ]);
        Size::factory()->create([
            'name' => 'MD',
        ]);
        Size::factory()->create([
            'name' => 'LG',
        ]);
        Size::factory()->create([
            'name' => 'XL',
        ]);
        Size::factory()->create([
            'name' => 'XXL',
        ]);

        ProductSize::factory(20)->create();
        ProductImage::factory(20)->create();
        Newsletter::factory(20)->create();
        Wishlist::factory(20)->create();
        CartItems::factory(20)->create();
        ProductReview::factory(20)->create();
        Blog::factory(20)->create();
        ContactUs::factory(20)->create();







    }
}
