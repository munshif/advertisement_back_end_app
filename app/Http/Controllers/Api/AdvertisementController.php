<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\AdvertisementInterface;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    protected $advertisementInterface;

    /**
     * @param AdvertisementInterface $advertisementInterface
     */
    public function __construct(AdvertisementInterface $advertisementInterface){
        $this->advertisementInterface = $advertisementInterface;
    }

    /**
     * @return mixed
     * @author mohamedmunshif
     * @description get all advertisements
     */
    public function index(): mixed
    {
        return $this->advertisementInterface->getAllAdvertisements();
    }

    /**
     * Display all advertisements  by product.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAdvertisementByProduct($product_id): \Illuminate\Http\JsonResponse
    {
       return $this->advertisementInterface->getAdvertisementByProduct($product_id);
    }

    /**
     * Store a newly created advertisement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
       return $this->advertisementInterface->createOrUpdateAdvertisement($request);
    }

    /**
     * Display the specified advertisement.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
       return $this->advertisementInterface->getAdvertisementById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        return $this->advertisementInterface->createOrUpdateAdvertisement($request, $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        return $this->advertisementInterface->deleteAdvertisement($id);
    }
}
