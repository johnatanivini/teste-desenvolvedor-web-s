<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\Product as ResourcesProduct;
use App\Models\Product as ModelsProduct;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class Product extends BaseController
{

    public function index():JsonResponse
    {
        $products = ModelsProduct::all();

        /**
         * @todo Filtrar produtos
         */

        return $this->sendResponse(ResourcesProduct::collection($products),'Produtos recuperados com sucesso!');
    }
}
