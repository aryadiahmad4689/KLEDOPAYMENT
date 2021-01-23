<?php

namespace Tests\Feature;

use App\Models\Payment;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    use DatabaseTransactions;
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
    $countPayment = Payment::count();
    if($countPayment <1){
        $payments = \App\Models\Payment::factory()->create();
        $this->post('/payments',$payments->toArray());
        $this->assertEquals(1,Payment::all()->count());
    }
    $this->assertTrue(true);
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

    public function testDeleteEmptyId()
    {
        $response = $this->delete('/payments');
        $response->assertStatus(302);
    }
}
