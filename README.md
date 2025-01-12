# Get Your Meds

**Get Your Meds** is a Laravel-based web application designed to help users manage their health by setting reminders for medications. This project currently supports medication management and a basic notification system for a local user.

## Features

- **Medication Management:** Add medications with specific times of day and food requirements.
- **Notification System:** Sends notifications to remind users about their medication schedules.
- **Local User Setup:** Currently designed for a single local user; multi-user support to be added later.

## Setup Instructions

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/iqshoshi/get-your-meds.git
   cd get-your-meds
   ```

2. **Install Dependencies:**
   ```bash
   composer install
   npm install
   ```

3. **Set Up the Environment File:**
   Copy `.env.example` to `.env` and update your database credentials.
   ```bash
   cp .env.example .env
   ```

4. **Run Migrations:**
   Create the necessary database tables using Laravel migrations.
   ```bash
   php artisan migrate
   ```

5. **Run the Development Server:**
   Start the Laravel development server.
   ```bash
   php artisan serve
   ```

## Database Schema

- **medications** Table:
  - `id`: Primary key
  - `name`: Name of the medication
  - `time_of_day`: JSON array of times (e.g., `["morning", "afternoon"]`)
  - `food_requirement`: Enum value for food requirements (`with-food` or `without-food`)
  - `created_at`: Timestamp when the record was created
  - `updated_at`: Timestamp when the record was updated

- **notifications** Table:
  - `id`: Primary key
  - `type`: Type of the notification (e.g., `App\Notifications\MedicationReminder`)
  - `notifiable_type`: Model type (e.g., `App\Models\User`)
  - `notifiable_id`: ID of the notifiable model
  - `data`: JSON payload with notification details
  - `read_at`: Nullable timestamp for when the notification was read
  - `created_at`: Timestamp when the record was created
  - `updated_at`: Timestamp when the record was updated

## Notification System (Not *Yet* Ready In This Commit)

### Medication Reminder Notification

- **Notification Class:** `MedicationReminder`
- **Delivery Channel:** Database
- **Data Structure:** 
  ```json
  {
      "medication_name": "Paracetamol",
      "time_of_day": ["morning", "afternoon"]
  }
  ```

### Sending Notifications

Notifications are sent using the `Notification` facade:
```php
$medication = Medication::first();
Notification::route('database', 'local_user')->notify(new MedicationReminder($medication));
```

### Viewing Notifications

Notifications are stored in the `notifications` table, containing information about the medication and the times of the day they are scheduled.


---
*Developed by [iqshoshi](https://github.com/iqshoshi)*
