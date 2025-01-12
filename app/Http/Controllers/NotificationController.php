<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use App\Models\User;
use App\Notifications\MedicationReminder;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function sendReminder()
    {
        $medication = Medication::first(); // Get the first medication record

        // Create a local user instance
        $localUser = User::firstOrCreate(
            ['email' => 'localuser@example.com'],
            ['name' => 'Local User', 'password' => bcrypt('password')]
        );

        // Send the notification
        $localUser->notify(new MedicationReminder($medication));

        return 'Notification sent!';
    }

}

?>