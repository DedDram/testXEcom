<?php

namespace Tests\Feature;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CalculateExchangeRateRequestTest extends TestCase
{
    public function testValidData()
    {
        $response = $this->post('/api/v1/course', [
            'from' => 'USD',
            'to' => 'EUR',
            'amount' => 100,
        ]);

        $response->assertStatus(200);
        $response->assertJson(function (AssertableJson $json) {
            $json->where('course', fn($value) => is_numeric($value));
        });
    }

    public function testMissingRequiredFields()
    {
        $response = $this->json('POST', '/api/v1/course', []);

        $response->assertStatus(422);
        $response->assertJson([
            'message' => 'Поле "from" обязательно для заполнения. (and 2 more errors)',
            'errors' => [
                'from' => ['Поле "from" обязательно для заполнения.'],
                'to' => ['Поле "to" обязательно для заполнения.'],
                'amount' => ['Поле "amount" обязательно для заполнения.'],
            ],
        ]);
        $response->assertJsonStructure([
            'message',
            'errors' => [
                'from',
                'to',
                'amount',
            ],
        ]);
    }

    public function testInvalidCurrencyTo()
    {
        $response = $this->json('POST', '/api/v1/course', [
            'from' => 'RUB',
            'to' => 'INVALID',
            'amount' => 100,
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['to']);
        $response->assertJson([
            'message' => 'Выбранная валюта "to" не существует.',
            'errors' => [
                'to' => ['Выбранная валюта "to" не существует.'],
            ],
        ]);
    }

    public function testInvalidCurrencyFrom()
    {
        $response = $this->json('POST', '/api/v1/course', [
            'from' => 'INVALID',
            'to' => 'RUB',
            'amount' => 100,
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['from']);
        $response->assertJson([
            'message' => 'Выбранная валюта "from" не существует.',
            'errors' => [
                'from' => ['Выбранная валюта "from" не существует.'],
            ],
        ]);
    }
    public function testInvalidCurrencyAmount()
    {
        $response = $this->json('POST', '/api/v1/course', [
            'from' => 'USD',
            'to' => 'RUB',
            'amount' => 'INVALID',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['amount']);
        $response->assertJson([
            'message' => 'Поле "amount" должно быть числом.',
            'errors' => [
                'amount' => ['Поле "amount" должно быть числом.'],
            ],
        ]);
    }
}
