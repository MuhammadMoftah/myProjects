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
    <p>Dear <span class="color-red">{{$userJob->user->first_name}}</span></p>
    <p> 
        Thanks for taking the time to apply for <span class="color-red">{{ $userJob->job->title }}</span> position. We appreciate your interest 
        in <span class="color-red">{{$userJob->job->company->name}}</span>
    </p>
    <p>We're currently in the process of taking applications for this position. If you are selected to continue to the interview process, our human resources department will be in contact with you. </p>
    <p>Thank you,</p>
    <p><span class="color-red">{{$userJob->job->company->name}}</span></p>
</body>
</html>