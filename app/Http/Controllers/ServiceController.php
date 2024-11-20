<?php

namespace App\Http\Controllers;

use App\Enums\ServicesEnum;
use App\Exceptions\BadRequestException;
use App\Http\Requests\CardRequest;
use App\Http\Requests\IdImageRequest;
use App\Http\Requests\IdInformationRequest;
use App\Http\Requests\MatchCardIdRequest;
use App\Http\Requests\ShahkarRequest;
use App\Http\Resources\CardResource;
use App\Http\Resources\IdImageResource;
use App\Http\Resources\IdInformationResource;
use App\Http\Resources\MatchCardIdResource;
use App\Http\Resources\ShahkarResource;
use App\Traits\ResponderTrait;
use App\Vendors\VendorManager;
use Exception;

class ServiceController extends Controller
{
    use ResponderTrait;

    public function __construct(private readonly VendorManager $vendorManager)
    {
    }

    public function card(CardRequest $request)
    {
        try {
            $response = $this->vendorManager->callService(ServicesEnum::CARD, $request->validated());
            return $this->response(CardResource::make($response));
        } catch (Exception $e) {
            dd($e);
            return $this->responseFailure($e->getMessage(), 500);
        }
    }

    public function shahkar(ShahkarRequest $request)
    {
        try {
            $response = $this->vendorManager->callService(ServicesEnum::SHAHKAR, $request->validated());
            return $this->response(ShahkarResource::make($response));
        } catch (Exception $e) {
            return $this->responseFailure($e->getMessage(), 500);
        }
    }

    public function idImage(IdImageRequest $request)
    {
        try {
            $response = $this->vendorManager->callService(ServicesEnum::IDIMAGE, $request->validated());
            return $this->response(IdImageResource::make($response));
        } catch (Exception $e) {
            return $this->responseFailure($e->getMessage(), 500);
        }
    }

    public function idInformation(IdInformationRequest $request)
    {
        try {
            $response = $this->vendorManager->callService(ServicesEnum::IDINFORMATION, $request->validated());
            return $this->response(IdInformationResource::make($response));
        } catch (Exception $e) {
            return $this->responseFailure($e->getMessage(), 500);
        }
    }

    public function matchCardId(MatchCardIdRequest $request)
    {
        try {
            $response = $this->vendorManager->callService(ServicesEnum::MATCHCARDID, $request->validated());
            return $this->response(MatchCardIdResource::make($response));
        } catch (BadRequestException $exception) {
            return $this->responseValidationError($exception->getMessage());
        }
    }
}
