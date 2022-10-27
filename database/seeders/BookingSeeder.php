<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Jonny',
            'last_name' => 'Walker',
            'email' => 'jonny@test.com',
            'mobile_number' => 987654321
        ]);

        $booking = $user->bookings()->create([
            'paid_amount' => 30,
            'discount_amount' => 7,
            'total_amount' => 23
        ]);

        $booking->createBookingProduct($this->createFirstProduct());
        $booking->createBookingProduct($this->createSecondProduct());
        $booking->createBookingProduct($this->createThirdProduct());
        $booking->createBookingProduct($this->createFourthProduct());
        $booking->createBookingProduct($this->createFifthProduct());
    }

    private function createFirstProduct()
    {
        return Product::create([
            'product_name' => 'Product 1',
            'price' => 10,
            'discount' => 2
        ]);
    }

    private function createSecondProduct()
    {
        return Product::create([
            'product_name' => 'Product 2',
            'price' => 20,
            'discount' => 5
        ]);
    }

    private function createThirdProduct()
    {
        return Product::create([
            'product_name' => '',
            'price' => null,
            'discount' => null
        ]);
    }

    private function createFourthProduct()
    {
        return Product::create([
            'product_name' => '',
            'price' => null,
            'discount' => null
        ]);
    }

    private function createFifthProduct()
    {
        return Product::create([
            'product_name' => '',
            'price' => null,
            'discount' => null
        ]);
    }
}
