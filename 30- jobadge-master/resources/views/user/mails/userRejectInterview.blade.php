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
        and the time you’ve invested in applying for the  <span class="color-red">{{ $userJob->job->title }}</span>  .
       .
    </p>

    <p>We ended up moving forward with another candidate, but we’d like to thank you for talking to our team and giving us the opportunity to learn about your skills and valued experience.</p>
    <p>We will be advertising more positions in the coming months. We hope you’ll keep us in mind, and we encourage you to apply again</p>
    <p>We wish you good luck with your job search and professional future endeavors</p>
    <p>Best of Luck,</p>
    <p><span class="color-red">{{$userJob->job->company->name}}</span></p>
</body>
</html>