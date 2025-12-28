<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;

class ReservationPathTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Helper: agar data res_date selalu valid
     */
    private function validResDate()
    {
        return Carbon::now()
            ->addDays(2)
            ->setTime(19, 0) 
            ->format('Y-m-d H:i:s');
    }

    /**
     * =========================
     * PATH 1
     * Valid reservation WITHOUT menu
     * =========================
     */
    public function test_path_1_valid_without_menu()
    {
        $data = [
            'first_name'   => 'Budi',
            'last_name'    => 'Pekerti',
            'email'        => 'budi@email.com',
            'tel_number'   => '081234567890',
            'res_date'     => $this->validResDate(),
            'guest_number' => 4,
        ];

        $response = $this->post(route('reservations.store.step.one'), $data);

        $response->assertRedirect(route('reservations.step.two'));
        $this->assertTrue(session()->has('reservation'));
    }

    /**
     * =========================
     * PATH 2
     * Valid reservation WITH menu
     * =========================
     */
    public function test_path_2_valid_with_menu()
    {
        $data = [
            'first_name'   => 'Budi',
            'last_name'    => 'Pekerti',
            'email'        => 'budi@email.com',
            'tel_number'   => '081234567890',
            'res_date'     => $this->validResDate(),
            'guest_number' => 4,
            'wants_menu'   => 'on',
        ];

        $response = $this->post(route('reservations.store.step.one'), $data);

        $response->assertRedirect(route('reservations.menu.order'));
        $this->assertTrue(session()->has('reservation'));
    }

    /**
     * =========================
     * PATH 3
     * Invalid data
     * =========================
     */
    public function test_path_3_all_invalid_data()
    {
        $data = [
            'first_name' => '',
            'last_name'  => '',
            'email'      => 'invalid-email',
            'tel_number' => '',
            'res_date'   => '',
        ];

        $response = $this->post(route('reservations.store.step.one'), $data);

        $response->assertSessionHasErrors([
            'first_name',
            'last_name',
            'email',
            'tel_number',
            'res_date',
        ]);
    }

    /**
     * =========================
     * PATH 4
     * Guest number exceed 
     * =========================
     */
    public function test_path_4_guest_number_exceed_limit()
    {
        $data = [
            'first_name'   => 'Budi',
            'last_name'    => 'Pekerti',
            'email'        => 'budi@email.com',
            'tel_number'   => '081234567890',
            'res_date'     => $this->validResDate(),
            'guest_number' => 15,
        ];

        $response = $this->post(route('reservations.store.step.one'), $data);

        
        $response->assertStatus(302);
    }

    /**
     * =========================
     * PATH 5
     * Invalid email only
     * =========================
     */
    public function test_path_5_invalid_email()
    {
        $data = [
            'first_name'   => 'Budi',
            'last_name'    => 'Pekerti',
            'email'        => 'invalid-email',
            'tel_number'   => '081234567890',
            'res_date'     => $this->validResDate(),
            'guest_number' => 3,
        ];

        $response = $this->post(route('reservations.store.step.one'), $data);

        $response->assertSessionHasErrors('email');
    }
}
