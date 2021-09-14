<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\HtmlString;

class NewAdminNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $credentials;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        Log::debug("Email sent to " . $notifiable->name);
        return (new MailMessage)
            ->subject('Cuenta creada para GDLWebcam')
            ->greeting('Querido ' . $notifiable->name . ':')
            ->line('Se ha creado una cuenta de administrador para usted')
            ->action('Panel de administración', url('/login'))
            ->line('Sus credenciales de acceso son las siguientes:')
            ->line(new HtmlString('Email: ' . $this->credentials['email'] . '<br>Password: ' . $this->credentials['password']));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
