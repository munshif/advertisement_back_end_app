<?php

namespace App\Repositories;

use App\Http\Resources\AdvertisementResource;
use App\Interfaces\AdvertisementInterface;
use App\Models\Advertisement;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Validator;


class AdvertisementRepository implements AdvertisementInterface
{
    // Use api response trait.
    use ApiResponse;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @author mohamedmunshif
     * @description create or update advertisement
     */
    public function createOrUpdateAdvertisement(Request $request, $id = null): \Illuminate\Http\JsonResponse
    {
        try {
            //new advertisement validation
            $validator = Validator::make($request->all(), [
                'product_id' => 'required',
                'title' => 'required',
                'valid_until' => 'required|date',
                'discount_percentage' => 'required',
            ]);

            // if validation fails
            if ($validator->fails()) {
                return $this->errorResponse($validator->errors());
            }

            //create or update advertisement data in db
            $advertisementInstance = $id ? Advertisement::find($id) : new Advertisement;
            $advertisementInstance->product_id = $request->product_id;
            $advertisementInstance->title = $request->title;
            $advertisementInstance->valid_until = $request->valid_until;
            $advertisementInstance->discount_percentage = $request->discount_percentage;

            $state = $id ? 'Updated' : 'Created';

            if ($advertisementInstance->save()) {
                return $this->successResponse("Advertisement ".$state." Successfully!", new AdvertisementResource($advertisementInstance));

            } else {
                return $this->errorResponse($state."Advertisement Failed!");
            }

        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }


    /**
     * @return mixed
     * @author mohamedmunshif
     * @description get all advertisements
     */
    public function getAllAdvertisements(): mixed
    {
        try {
            //Fetch all advertisements
            $advertisements = Advertisement::all();
            return $this->successResponse("All Advertisements", AdvertisementResource::collection($advertisements));

        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * @param $productId
     * @return \Illuminate\Http\JsonResponse
     * @author mohamedmunshif
     * @description get advertisements by product id
     */
    public function getAdvertisementByProduct($productId): \Illuminate\Http\JsonResponse
    {
        try {

            //Fetch all advertisements by product ID
            $advertisementData = Advertisement::where('product_id', $productId)->paginate(5);

            return $this->successResponse('Advertisements By Product', $advertisementData);

        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @author mohamedmunshif
     * @description Fetch advertisements by id
     */
    public function getAdvertisementById($id): \Illuminate\Http\JsonResponse
    {
        try {
            //Fetch advertisements by id
            $advertisementData = Advertisement::find($id);
            return $this->successResponse("Advertisement By Id", new AdvertisementResource($advertisementData));

        } catch (\Exception $e){
            return $this->errorResponse($e->getMessage());
        }
    }


    /**
     * @param Advertisement $advertisement
     * @return mixed
     * @author mohamedmunshif
     * @description Delete Advertisement
     */
    public function deleteAdvertisement($id): mixed
    {
        try {

            //Deleting Advertisement
            $advertisement = Advertisement::find($id);
            $advertisement->delete();
            return $this->successResponse("This Advertisement Deleted Successfully!", []);

        } catch (\Exception $e){
           return $this->errorResponse($e->getMessage());
        }
    }

}
