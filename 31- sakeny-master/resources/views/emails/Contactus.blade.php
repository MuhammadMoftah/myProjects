@component('mail::message')
Message : <br>
{{ $contactUs['message'] }}
 

<br>

Thanks,<br>
Phone : {{ $contactUs['phone'] }}
<br>
name : {{ $contactUs['name'] }}
<br>
name : {{ $contactUs['email'] }}

@endcomponent
{{-- okkkokokkok --}}