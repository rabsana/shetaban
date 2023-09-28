<?php

namespace Tests\Unit\App\Http\Controllers\Api\V1\Transactions;



use App\Http\Controllers\Api\V1\Transactions\StoreController;
use App\Http\Requests\Api\V1\Transactions\StoreRequest;
use Tests\TestCase;
use Tests\Tools\AdditionalAssertions;
use Tests\Tools\LaravelMatchers;
use Tests\Tools\WithSut;

class StoreControllerTest extends TestCase
{
    use AdditionalAssertions, WithSut;


    public function sut(): string
    {
        return StoreController::class;
    }


    /** @test */
    public function it_must_be_a_controller(){
        LaravelMatchers::isController($this->sut());
    }

    /** @test */
    public function it_store_method_uses_store_request()
    {
        $this->assertActionUsesFormRequest(
            $this->sut(),
            'store',
            StoreRequest::class
        );
    }
}
