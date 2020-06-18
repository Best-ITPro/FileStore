<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendFileMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $file_id;
    protected $email;
    protected $message;
    protected $file_link;
    protected $date_erase;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($file_id, $email, $message, $file_link, $date_erase)
    {
        $this->file_id = $file_id;
        $this->email = $email;
        $this->message = htmlspecialchars($message);
        $this->file_link = substr($file_link, 8, strlen($file_link)); // del uploads

        // Скачивание с логированием
        $this->file_link = 'http://' . $_SERVER['HTTP_HOST'] . '/go/' . $this->file_link;
        $this->date_erase = date('d.m.Y', strtotime($date_erase));
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.sendfile')
            ->with([
                'email' => $this->email,
                'sender_message' => $this->message,
                'file_link' => $this->file_link,
                'date_erase' => $this->date_erase,
            ])
            ->subject('Для Вас есть новый файл!');
    }
}
