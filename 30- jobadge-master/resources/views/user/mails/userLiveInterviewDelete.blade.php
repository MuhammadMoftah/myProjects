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

    <p> This email to inform you that a video interview appointment for {{ Carbon\Carbon::parse($mail_data['from_date'])->format('l F d')}} at {{$mail_data['time']}}
        was canceled. 
    </p>


    <p> We appreciate your consideration .</p>

    <p> Thank you,</p>

    <p class="color-red">{{$mail_data['company_name']}}</p>
</body>
</html>