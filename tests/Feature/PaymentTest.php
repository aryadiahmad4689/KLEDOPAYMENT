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
    public function testRouteIndex()
    {
        $response = $this->get('/payments');
        $response->assertStatus(200);
    }


    public function testStoreOneField()
    {
    $payments = \App\Models\Payment::factory()->create();
    $this->post('/payments',$payments->toArray());
    $this->assertEquals(9,Payment::all()->count());
    }

    public function testfieldData()
    {
        $paymentName = 'BNI';

        $payment = new Payment();
        $payment->payment_name = $paymentName;
        $payment->save();

        // Melihat data BNI ada tidak di database
        $this->assertDatabaseHas('payments', [
            'payment_Name' => 'BNI'
         ]);
    }

    public function testDelete()
    {
        $response = $this->delete('/payments');
        $response->assertStatus(302);
    }
}
