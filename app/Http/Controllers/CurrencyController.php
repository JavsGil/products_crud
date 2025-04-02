<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CurrencyService;
use App\Http\Requests\StoreCurrencyRequest;
class CurrencyController extends Controller
{

    protected $currencyService;

    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }
    /**
 * @OA\Post(
 *     path="/api/currencies",
 *     summary="Crear una nueva moneda",
 *     tags={"Monedas"},
 *     security={{"bearerAuth": {}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "symbol", "exchange_rate"},
 *             @OA\Property(property="name", type="string", example="Dólar estadounidense"),
 *             @OA\Property(property="symbol", type="string", example="USD"),
 *             @OA\Property(property="exchange_rate", type="number", format="float", example=1.00)
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Moneda creada exitosamente"
 *     )
 * )
 */
    public function store(Request $request)
    {
       
        try {
            $currency = $this->currencyService->createCurrency($request->all());
    
            return response()->json($currency, 201);  // Retorna la moneda creada con un status 201
        } catch (\Exception $e) {
            // Captura de errores generales
            return response()->json([
                'error' => 'Hubo un problema al crear la moneda. Intenta nuevamente más tarde.'
            ], 500); // Código 500: error interno del servidor
        }
        
    }


}
