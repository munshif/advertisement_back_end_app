<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdvertisementTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_advertisement()
    {
        $response = $this->withHeaders([
            'Bearer' => 'Value',
        ])->get('/advertisements');

        $response->assertStatus(200);
    }

    public function test_get_advertisement_by_id()
    {
        $response = $this->withHeaders([
            'Bearer' => 'Value',
        ])->get('/advertisements/1');

        $response->assertStatus(200);
    }

    public function test_get_advertisement_by_product()
    {
        $response = $this->withHeaders([
            'Bearer' => 'Value',
        ])->get('/advertisements/product/1');

        $response->assertStatus(200);
    }

    public function test_store_advertisement()
    {
        $response = $this->withHeaders([
            'Bearer' => 'Value',
        ])->post('/advertisements', ['product_id' => '1', 'title' => 'test', 'valid_until'=>'2022-02-01','discount_percentage'=>10]);

        $response->assertStatus(200);
    }

    public function test_update_advertisement()
    {
        $response = $this->withHeaders([
            'Bearer' => 'Value',
        ])->put('/advertisements/1', ['product_id' => '1', 'title' => 'test', 'valid_until'=>'2022-02-01','discount_percentage'=>10]);

        $response->assertStatus(200);
    }

    public function test_delete_advertisement()
    {
        $response = $this->withHeaders([
            'Bearer' => 'Value',
        ])->delete('/advertisements/1');

        $response->assertStatus(200);
    }
}
