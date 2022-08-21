@component('mail::message')

<span><h2>Subject:</h2>{{$dataform['subject']}}</span>

<span><h2>Company Name:</h2>{{$dataform['cname']}}</span>

<span><h2>Company Email:</h2>{{$dataform['email']}}</span>

<span><h2>Message:</h2>{{$dataform['message']}}</span>

@component('mail::button', ['url' => $dataform['homeUrl']])
Visit Jobsite
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
