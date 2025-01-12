<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MedicationReminder extends Notification
{
    use Queueable;

    protected $medication;
    /**
     * Create a new notification instance.
     */
    public function __construct($medication)
    {
        $this->medication = $medication;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toDatabase(object $notifiable): array
    {
        // Format time_of_day to a readable format (keep it as an array)
        return [
            'medication_name' => $this->medication->name,
            'time_of_day' => $this->medication->time_of_day,  // No need to implode, keep it as an array
        ];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        // Format time_of_day to a readable format
        $timeOfDayFormatted = implode(', ', $this->medication->time_of_day);
        return [
            'medication_name' => $this->medication->name,
            'time_of_day' => $timeOfDayFormatted,
        ];
    }
}
