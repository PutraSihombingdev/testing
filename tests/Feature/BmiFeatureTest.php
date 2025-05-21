<?php

namespace Tests\Feature;

use Tests\TestCase;

class BmiFeatureTest extends TestCase
{
    /** @test */
    public function bmi_form_page_can_be_accessed()
    {
        $response = $this->get(route('bmi.form'));

        $response->assertStatus(200);
        $response->assertSee('Hitung BMI');
        $response->assertSee('Berat Badan');
        $response->assertSee('Tinggi Badan');
    }

    /** @test */
   public function bmi_calculation_works_correctly()
{
    $data = [
        'weight' => 70,
        'height' => 170,
    ];

    $response = $this->post(route('bmi.calculate'), $data);

    $response->assertStatus(200);
    $response->assertSeeText('Hasil BMI');
    $response->assertSeeText('BMI Anda: 24.2');
    $response->assertSeeText('Kategori: Normal');
}


    /** @test */
    public function bmi_calculation_fails_with_invalid_input()
    {
        $data = [
            'weight' => 0,     // berat tidak valid
            'height' => -5,    // tinggi tidak valid
        ];

        $response = $this->post(route('bmi.calculate'), $data);

        $response->assertSessionHasErrors(['weight', 'height']);
    }
}
