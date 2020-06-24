<h4>Hello {{$mail_data['company_name']}},</h4>

<p>You have successfully dleted a live interview with Mr/Ms {{$mail_data['user_name']}} </p>

<p>for {{$mail_data['job_title']}} position on {{ Carbon\Carbon::parse($mail_data['from_date'])->format('l F d')}} .</p>

<p>Interview will start at:</p>

<p>{{$mail_data['time']}}.</p>



<h5>Kind regards,<h5>