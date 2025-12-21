<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Mail\SendEmail;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;

class SendEmailTest extends TestCase
{
    /** @test */
    public function konstruktor_menyimpan_data_reservation()
    {
        $reservation = [
            'name' => 'Emir',
            'date' => '2025-12-20'
        ];

        $mail = new SendEmail($reservation);

        $this->assertEquals($reservation, $mail->reservation);
    }

    /** @test */
    public function envelope_memiliki_subject_yang_benar()
    {
        $mail = new SendEmail([]);

        $envelope = $mail->envelope();

        $this->assertInstanceOf(Envelope::class, $envelope);
        $this->assertEquals('Reservation Email', $envelope->subject);
    }

    /** @test */
    public function content_menggunakan_view_yang_benar()
    {
        $mail = new SendEmail([]);

        $content = $mail->content();

        $this->assertInstanceOf(Content::class, $content);
        $this->assertEquals('emails.reservation', $content->view);
    }

}
