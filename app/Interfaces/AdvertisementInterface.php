<?php

namespace App\Interfaces;

use App\Models\Advertisement;
use Illuminate\Http\Request;

interface AdvertisementInterface
{
    /**
     * @param Request $request
     * @return mixed
     * @author mohamedmunshif
     * @description create new advertisement
     */
    public function createOrUpdateAdvertisement(Request $request, $id = null): mixed;

    /**
     * @return mixed
     * @author mohamedmunshif
     * @description
     * @startOn 2022-09-01
     * @endOn 2022-09-01
     */
    public function getAllAdvertisements(): mixed;

    /**
     * @param $productId
     * @return mixed
     * @author mohamedmunshif
     * @description get advertisements by products
     */
    public function getAdvertisementByProduct($productId): mixed;

    /**
     * @param $id
     * @return mixed
     * @author mohamedmunshif
     * @description view advertisement by id
     */
    public function getAdvertisementById($id): mixed;

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     * @author mohamedmunshif
     * @description Update Advertisements
     */
//    public function update(Request $request, $id): mixed;

    /**
     * @param $id
     * @return mixed
     * @author mohamedmunshif
     * @description Delete advertisement
     */
    public function deleteAdvertisement($id): mixed;

}
