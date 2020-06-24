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
        We appreciate your interest in <span class="color-red">{{$userJob->job->company->name}}</span>
        and the position of <span class="color-red">{{ $userJob->job->title }}</span>
        for which you applied .
       
    </p>
    <p> This email is to let you know that you are qualified for this position </p>
    <p>Thank you,</p>
    <p><span class="color-red">{{$userJob->job->company->name}}</span></p>
</body>
</html>