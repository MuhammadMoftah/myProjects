<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .color-red{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h4>Dear {{$mail_data['user_name']}}</h4>

    <p> 
         We would like to inform you that we reschedule a video interview for the <span class="color-red">{{$mail_data['job_title']}} </span>
         position will be held on {{ Carbon\Carbon::parse($mail_data['from_date'])->format('l F d')}} at {{$mail_data['time']}}
    </p>


    <p style="text-align: center">
        <a href='{{$mail_data["interview_link"]}}'>Interview Link</a>
    </p>
    

    <p>Looking forward to meeting you soon </p>

    
    <p>Interview Guidelines : </p>
    <ul>
        <li>Be on time.</li>
        <li>Be sure to be connect to internet.</li>
        <li>Make Login before the session time.</li>
        <li>Press on Link of live interview.</li>
        <li>Allow Notification of Microphone and Video.</li>
    </ul>
    
    <p>Thank you,</p>

    <p class="color-red">{{$mail_data['company_name']}}</p>

    
</body>
</html>