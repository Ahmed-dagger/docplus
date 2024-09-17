<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;
use NotificationChannels\Fcm\Resources\Notification as FcmNotification;


class PushFireBaseNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $data)
    {
        //dd($data);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
    */
    public function via(object $notifiable): array
    {
        //$this->store($notifiable);
        //dd($notifiable);
        return [FcmChannel::class ];
    }

    public function toFcm($notifiable): FcmMessage
    {
       //dd($notifiable);

            return  (new FcmMessage(
                // notification: new FcmNotification(
                // title: $this->data['title'],
                // body: $this->data['body'],
                // )
                ))->data([
                'title' => $this->data['title'] ?? null,
                'body' => $this->data['body'] ?? null,
                'type' => $this->data['type'] ?? null,
                'user_id' => $this->data['user_id'] ?? null,
                'user_type' => $this->data['user_type'] ?? null,
                'date' => $this->data['date'] ?? null,
                'name' => $this->data['name'] ?? null,
                'doctor' =>  array_key_exists('doctor', $this->data) ? json_encode($this->data['doctor']) : json_encode([]), 
                'foreign_id' => $this->data['foreign_id'] ?? null,
            ]);
            //dd($test);
            // ->custom([
            //     'android' => [
            //         'notification' => [
            //             'color' => '#0A0A0A',
            //         ],
            //         'fcm_options' => [
            //             'analytics_label' => 'analytics',
            //         ],
            //     ],
            //     'apns' => [
            //         'fcm_options' => [
            //             'analytics_label' => 'analytics',
            //         ],
            //     ],
            // ]);
    }

    public function toDatabase($notifiable)
    {
        $data = [];
        $data['title']   = $this->data['title'] ;
        $data['body'] = $this->data['body'];
        return $data;
    }

    public function store($notifiable)
    {
        //
    }

}
