<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class SendEmailTest extends TestCase
{
    /** @test */
    public function mailable_dapat_dibuat()
    {
        $reservation = [
            'name' => 'Emir',
            'date' => '2025-12-20'
        ];

        $mail = new SendEmail($reservation);

        $this->assertInstanceOf(SendEmail::class, $mail);
        $this->assertEquals($reservation, $mail->reservation);
    }

    /** @test */
    public function email_memiliki_subject_yang_benar()
    {
        $mail = new SendEmail([]);

        $this->assertEquals(
            'Reservation Email',
            $mail->envelope()->subject
        );
    }

    /** @test */
    public function email_menggunakan_view_yang_benar()
    {
        $mail = new SendEmail([]);

        $this->assertEquals(
            'emails.reservation',
            $mail->content()->view
        );
    }

    /** @test */
    public function email_dapat_dikirim()
    {
        Mail::fake();

        $reservation = [
            'name' => 'Emir',
            'date' => '2025-12-20'
        ];

        Mail::to('test@example.com')
            ->send(new SendEmail($reservation));

        Mail::assertSent(SendEmail::class, function ($mail) use ($reservation) {
            return $mail->reservation === $reservation;
        });
    }
}
