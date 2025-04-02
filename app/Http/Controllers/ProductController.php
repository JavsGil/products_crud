<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @OA\Get(
     *     path="/api/products",
     *     summary="Obtener todos los productos",
     *     tags={"Productos"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de productos obtenida exitosamente"
     *     )
     * )
     */
    public function index()
    {
        return response()->json($this->productService->getAllProducts());
    }

    /**
     * @OA\Get(
     *     path="/api/products/{id}",
     *     summary="Obtener un producto por ID",
     *     tags={"Productos"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Producto obtenido exitosamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Producto no encontrado"
     *     )
     * )
     */
    public function show($id)
    {
        return response()->json($this->productService->getProductById($id));
    }

    /**
     * @OA\Post(
     *     path="/api/cproducts",
     *     summary="Crear un nuevo producto",
     *     tags={"Productos"},
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "description", "price", "tax_cost", "manufacturing_cost"},
     *             @OA\Property(property="name", type="string", example="Laptop"),
     *             @OA\Property(property="description", type="string", example="Laptop de última generación"),
     *             @OA\Property(property="price", type="number", format="float", example=1200.50),
     *             @OA\Property(property="tax_cost", type="number", format="float", example=15.00),
     *             @OA\Property(property="manufacturing_cost", type="number", format="float", example=800.00)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Producto creado exitosamente"
     *     )
     * )
     */
    public function store(Request $request)
    {
       
        try {
            $product = $this->productService->createProduct($request->all());
            return response()->json($product, 201);
        } catch (\Illuminate\Database\QueryException $e) {
            if (strpos($e->getMessage(), 'currency_id') !== false) {
                return response()->json([
                    'error' => 'El campo "currency_id" es obligatorio y debe ser un valor válido.'
                ], 422);
            }
    
            return response()->json([
                'error' => 'Hubo un error al crear el producto. Intenta nuevamente más tarde.'
            ], 500);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/products/{id}",
     *     summary="Actualizar un producto",
     *     tags={"Productos"},
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
     *             required={"name", "description", "price", "tax", "manufacturing_cost"},
     *             @OA\Property(property="name", type="string", example="Laptop actualizada"),
     *             @OA\Property(property="description", type="string", example="Laptop de última generación con mejoras"),
     *             @OA\Property(property="price", type="number", format="float", example=1300.50),
     *             @OA\Property(property="tax", type="number", format="float", example=16.00),
     *             @OA\Property(property="manufacturing_cost", type="number", format="float", example=850.00)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Producto actualizado exitosamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Producto no encontrado"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        return response()->json($this->productService->updateProduct($id, $request->all()));
    }

    /**
     * @OA\Delete(
     *     path="/api/products/{id}",
     *     summary="Eliminar un producto",
     *     tags={"Productos"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Producto eliminado exitosamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Producto no encontrado"
     *     )
     * )
     */
    public function destroy($id)
    {
        return response()->json($this->productService->deleteProduct($id));
    }
}
