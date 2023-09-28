<?php

namespace Tests\Unit\App\Http\Requests\Api\V1\Transactions;

use App\Http\Requests\Api\V1\Transactions\StoreRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;
use Tests\Tools\LaravelMatchers;
use Tests\Tools\WithSut;

class StoreRequestTest extends TestCase
{
    use WithSut;

    public function sut(): string
    {
        return StoreRequest::class;
    }


    /** @test */
    public function it_is_a_form_request(){
        LaravelMatchers::isFormRequest($this->sut());
    }

    /** @test
     * @dataProvider provideInvalidAmount
     */
    public function it_fails_with_invalid_amount(array $data){
        $sutObj = new ($this->sut());

        $validator = Validator::make($data, $sutObj->rules());

        $jsonData = json_encode($data);
        $this->assertFalse($validator->passes(), "failed for provided data: {$jsonData}");
    }

    /** @test
     * @dataProvider provideValidAmount
     */
    public function it_passes_with_valid_amount(array $data){
        $sutObj = new ($this->sut());

        $validator = Validator::make($data, $sutObj->rules());

        $jsonData = json_encode($data);
        $this->assertTrue($validator->passes(), "failed for provided data: {$jsonData}");
    }

    public static function provideInvalidAmount(): array
    {
        return [
            [[]],
            [[
                'amount' => 0,
            ]],
            [[
                'amount' => -1,
            ]],
            [[
                'amount' => 0.1,
            ]],
            [[
                'amount' => 'foo',
            ]],
            [[
                'amount' => null
            ]],
            [[
                'amount' => true,
            ]],
            [[
                'amount' => false,
            ]],
            [[
                'amount' => 999,
            ]],
            [[
                'amount' => 100000001,
            ]],
            [[
                'amount' => [5000]
            ]]
        ];
    }

    public static function provideValidAmount(): array
    {
        return [
            [[
                'amount' => '5000',
            ]],
            [[
                'amount' => '10000',
            ]],
            [[
                'amount' => '49999999',
            ]],
            [[
                'amount' => '50000000'
            ]],
        ];
    }
}
