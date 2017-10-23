<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LunasNotification extends Notification {
	use Queueable;

	protected $receiver;
	protected $message;
	protected $url;
	protected $actionText;
	protected $subject;
	/**
	 * Create a new notification instance.
	 *
	 * @return void
	 */
	public function __construct($receiver, $message, $url, $actionText, $subject) {
		$this->receiver = $receiver;
		$this->message = $message;
		$this->url = $url;
		$this->actionText = $actionText;
		$this->subject = $subject;
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @param  mixed  $notifiable
	 * @return array
	 */
	public function via($notifiable) {
		return ['mail'];
	}

	/**
	 * Get the mail representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return \Illuminate\Notifications\Messages\MailMessage
	 */
	public function toMail($notifiable) {
		return (new MailMessage)
			->greeting('Hi ' . $this->receiver . '!')
			->subject($subject)
			->line($this->message)
			->action($this->actionText, $this->url);
		// ->line('Thank you for using our application!');
	}

	/**
	 * Get the array representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return array
	 */
	public function toArray($notifiable) {
		return [
			//
		];
	}
}
