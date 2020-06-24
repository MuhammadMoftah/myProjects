<h4>Hello {{$mail_data['company_name']}},</h4>

<p>You have successfully arranged a live interview with Mr/Ms {{$mail_data['user_name']}} </p>

<p>for {{$mail_data['job_title']}} position on {{ Carbon\Carbon::parse($mail_data['from_date'])->format("l F d") }} at {{$mail_data['time']}}  .</p>

<p>Interview will start at:</p>

<p>{{$mail_data['time']}}.</p>

<p>at this link:</p>

<a href='{{$mail_data["interview_link"]}}'>Interview Link</a>

<p>Interview Guidelines : </p>
<ul>
    <li>Be on time.</li>
    <li>Be sure to be connect to internet.</li>
    <li>Make Login before the session time.</li>
    <li>Press on Link of live interview.</li>
    <li>Allow Notification of Microphone and Video.</li>
</ul>


<h5>Kind regards <h5>