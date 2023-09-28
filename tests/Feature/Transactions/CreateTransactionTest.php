<?php

namespace Tests\Feature\Transactions;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTransactionTest extends TestCase
{
    public function test_abort_with_invalid_inputs(): void
    {
        $response = $this->json('post', 'api/v1/transactions');

        $response->assertStatus(422);
    }
}
