<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{

  public function validate_send_mails()
  {
    return [
      'file' => 'required|mimes:xlsx|max:4096',
      'subject' => 'required|max:100',
    ];
  }

  public function sendEmail($subject, $email)
  {
    $email = $email;
    $subject = $subject;
    $image = asset('site/images/email.png');
    $headers = "From: info@jobadge.com";

    $body = '<!DOCTYPE html>
        <html lang="en">
          <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="icon" href="https://www.jobadge.com/site/images/logo/logo.png" type="image/x-icon">
            <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
            <title>Jobadge Email</title>
          </head>
          <body style="text-align: center;font-family: &quot;Roboto&quot;, sans-serif;">
            <div class="email-container" style="display: block;position: relative;width: 720px;margin: auto;">
              <img src="' . $image . '" alt="" style="width: 100%;">
              <a href="https://www.jobadge.com/register" target="_blank" class="subscripe" style="position: absolute;left: 0;right: 0;margin: auto;max-width: 600px;top: 660px;color: white;font-weight: bold;text-decoration: none;background-color: #b2af36;padding: 15px 0px;letter-spacing: 2px;font-size: 18px;border-radius: 50px;text-shadow: 1px 1px 6px black;text-align: center;">SUBSCRIPE NOW to JOBBADGE for FREE
            </a></div>
          </body>
        </html>';

    $headers .= " MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    mail($email, $subject, $body, $headers);
  }
}
