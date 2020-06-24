<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .color-danger{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h4>Dear {{$mail_data['user_name']}}</h4>

    <p> We appreciate your interest in {{$mail_data['company_name']}} and the time you’ve invested in applying for the {{$mail_data['job_title']}} </p>

    <p> As a result of your application was screened as a shortlisted candidate, I would like to invite you to attend the video interview on 
        <span class="color-danger">{{ Carbon\Carbon::parse($mail_data['from_date'])->format('l F d')}}</span> , at <span class="color-danger">{{$mail_data['time']}} .</span>
    </p>

    <a href='{{$mail_data["interview_link"]}}'>Interview Link</a>
    <p>Interview Guidelines : </p>
    <ul>
        <li>Be on time.</li>
        <li>Be sure to be connect to internet.</li>
        <li>Make Login before the session time.</li>
        <li>Press on Link of live interview.</li>
        <li>Allow Notification of Microphone and Video.</li>
    </ul>
    <h5>Best of Luck</h5>
    <h5 class="color-danger">
        {{$mail_data['company_name']}}
    </p>
</body>
</html>