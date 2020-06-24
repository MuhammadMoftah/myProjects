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
        and the time you’ve invested in applying for the <span class="color-red">{{ $userJob->job->title }}</span>
       .
    </p>
    <p>Refusing does not mean you are not good, you are not rejected without reasons, you are rejected compared to current requirements .</p>
    <p>Rejecting may be just a correction of your situation where you belong, and lets you focus on the best you can do.</p>
    <p>Recharge your energy again and be accomplished.</p>
    <p>Thanks, Valued Jobseeker</p>
</body>
</html>