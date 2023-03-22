@component('mail::message')

<h1>Subject: {{$data['inquiry_subject']}}</h1>
<br>
<h3>Sender: {{$data['inquiry_name']}}, {{$data['inquiry_email']}}</h3>
<br>
{{$data['inquiry_message']}}
@endcomponent
