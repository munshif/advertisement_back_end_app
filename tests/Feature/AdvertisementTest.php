<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\AdvertisementRepository;

use Tests\TestCase;

class AdvertisementTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_return_all_advertiesment()
    {
        $advertisement = (new AdvertisementRepository())->getAllAdvertisements();
        $this->assertInstanceOf(JsonResponse::class, $advertisement);
    }


    public function test_return_advertiesment_by_id()
    {
        $advertisement = (new AdvertisementRepository())->getAdvertisementById(1);
        $this->assertInstanceOf(JsonResponse::class, $advertisement);
    }

    public function test_advertisement_by_product()
    {
        $advertisement = (new AdvertisementRepository())->getAdvertisementByProduct(1);
        $this->assertInstanceOf(JsonResponse::class, $advertisement);
    }


    public function test_store_advertisement()
    {
        $advertisement = (new AdvertisementRepository())->createOrUpdateAdvertisement(['product_id' => '1', 'title' => 'test', 'valid_until'=>'2022-02-01','discount_percentage'=>10]);
        $this->assertInstanceOf(JsonResponse::class, $advertisement);
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
