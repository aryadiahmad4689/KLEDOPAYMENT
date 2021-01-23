<?php

namespace Tests\Feature;

use App\Http\Controllers\PaymentController;
use App\Models\Payment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/payments');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $this->assertDatabaseHas('payments',[
            'payment_name' => 'BNI'
        ]);

        $response = $this->post('/payments');
        $response->assertStatus(200);

    }

    public function testDelete()
    {
        $response = $this->delete('/payments');
        $response->assertStatus(200);
    }
}
