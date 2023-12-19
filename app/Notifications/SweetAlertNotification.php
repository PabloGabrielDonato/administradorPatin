<?php
// app/Notifications/SweetAlertNotification.php

use Illuminate\Notifications\Notification;

class SweetAlertNotification extends Notification
{
    public $title;
    public $text;
    public $type;

    public function __construct($title, $text, $type = 'success')
    {
        $this->title = $title;
        $this->text = $text;
        $this->type = $type;
    }

    public function toSweetAlert($notifiable)
    {
        return [
            'title' => $this->title,
            'text' => $this->text,
            'type' => $this->type,
        ];
    }
}
