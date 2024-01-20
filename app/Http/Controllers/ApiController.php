<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateExchangeRateRequest;
use App\Service\CourseCalculation;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    /**
     * @OA\Info(
     *     title="XE.com API",
     *     version="1.0.0",
     *     description="API for XE.com",
     *     @OA\Contact(
     *         email="info@xe.com"
     *     ),
     *     @OA\License(
     *         name="License",
     *         url="http://www.xe.com/license"
     *     )
     * )
     * @OA\Post(
     *     path="/api/v1/course",
     *     summary="POST exchange rate",
     *     tags={"course"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="from", type="string", example="RUB"),
     *             @OA\Property(property="to", type="string", example="EUR"),
     *             @OA\Property(property="amount", type="integer", example="100"),
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="course", type="number", example=1.04027579745366),
     *         )
     *     )
     * )
     */
    public function calculateExchangeRate(CalculateExchangeRateRequest $request): JsonResponse
    {
        // Получение данных из запроса
        $fromCurrency = $request->input('from');
        $toCurrency = $request->input('to');
        $amount = $request->input('amount');
        // Получаем курс
        $course = CourseCalculation::getCourse($fromCurrency, $toCurrency, $amount);

        // Возвращение результата
        return response()->json([
            'course' => $course,
        ]);
    }
}
