<?php

namespace Tests\Feature;

use App\Models\Advertisement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\AdvertisementRepository;
use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;





use Tests\TestCase;

class AdvertisementTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_store_advertisement()
    {
        $user = User::factory()->create();

        $this->actingAs($user)->json('POST', route('advertisements.store'), [
            'product_id' => '1',
            'title' => 'test',
            'valid_until' => '2022-01-01',
            'discount_percentage' => '10'
        ]);

        $this->assertDatabaseHas('advertisements', [
            'product_id' => '1',
            'title' => 'test',
            'valid_until' => '2022-01-01',
            'discount_percentage' => '10'
        ]);
    }

    public function test_update_advertisement()
    {
        $user = User::factory()->create();
        $ad =  Advertisement::factory()->create();

        $this->actingAs($user)->json('PUT', route('advertisements.update',  ['id' => $ad]), [
            'product_id' => '1',
            'title' => 'test',
            'valid_until' => '2022-01-01',
            'discount_percentage' => '10'
        ]);

        $this->assertDatabaseHas('advertisements', [
            'product_id' => '1',
            'title' => 'test',
            'valid_until' => '2022-01-01',
            'discount_percentage' => '10'
        ]);
    }

    public function test_return_all_advertiesment()
    {
        $user = User::factory()->create();
        Advertisement::factory()->create();

        $resp = $this->actingAs($user)
            ->json('GET', route('advertisements.index'));

        $resp
            ->assertStatus(200);

    }

    public function test_return_advertiesment_by_id()
    {
        $user = User::factory()->create();
        $ad =  Advertisement::factory()->create();

        $resp = $this->actingAs($user)
            ->json('GET', route('advertisements.show',  ['id' => $ad]));
        $resp->assertStatus(200);

    }

    public function test_advertisement_by_product()
    {
        $user = User::factory()->create();
        $ad =  Advertisement::factory()->create();

        $this->actingAs($user)->json('GET', route('advertisements.product', ['product_id' => 1]))
            ->assertStatus(200);
    }

    public function test_delete_advertisement()
    {
        $user = User::factory()->create();
        $ad =  Advertisement::factory()->create();

        $this->actingAs($user)->json('DELETE', route('advertisements.delete', ['id' =>  $ad]))
            ->assertStatus(200);
    }
}
