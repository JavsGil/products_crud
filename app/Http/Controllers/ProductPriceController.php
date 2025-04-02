<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductPriceService;
use App\Http\Requests\ProductPriceRequest;

class ProductPriceController extends Controller
{
    protected $productPriceService;

    public function __construct(ProductPriceService $productPriceService)
    {
        $this->productPriceService = $productPriceService;
    }

    /**
     * @OA\Get(
     *     path="/api/products/{id}/prices",
     *     summary="Obtener precios de un producto",
     *     tags={"Precios"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Lista de precios obtenida exitosamente"
     *     ),
     *     @OA\Response(response=404, description="Producto no encontrado")
     * )
     */
    public function index($id)
    {
        try {
            $prices = $this->productPriceService->getPricesByProduct($id);
            return response()->json($prices);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/products/{id}/prices",
     *     summary="Agregar un precio a un producto",
     *     tags={"Precios"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"currency", "price"},
     *             @OA\Property(property="currency", type="string", example="USD"),
     *             @OA\Property(property="price", type="number", format="float", example=1000.50)
     *         )
     *     ),
     *     @OA\Response(response=201, description="Precio agregado exitosamente"),
     *     @OA\Response(response=400, description="Solicitud inválida"),
     *     @OA\Response(response=404, description="Producto no encontrado")
     * )
     */
    public function store(Request $request, $id)
    {
        try {
            // Llamamos al servicio para agregar el precio al producto
            $price = $this->productPriceService->addPriceToProduct($id, $request);
            
            return response()->json($price, 201);  // Retorna el precio agregado con un status 201
        } catch (\Exception $e) {
            // Captura de errores generales
            return response()->json([
                'error' => 'Hubo un problema al agregar el precio al producto. Intenta nuevamente más tarde.'
            ], 500); // Código 500: error interno del servidor
        }
    }
}
