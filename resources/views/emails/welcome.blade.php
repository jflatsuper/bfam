@component('mail::message')
<h2 style="text-align: center">Welcome to BFAM Club! 🎉🙏</h2>

<p><b>Hi, {{ $user->first_name  }}</b></p>

<p>We are honoured that you would choose to study the Bible with BFAM Bible club.</p>
<p>To get started, please login to your portal and start taking a course now. </p>


@component('mail::button', ['url' => route('login')])
        Login now
@endcomponent

<p>We look forward to getting to know you better. Thank you again for studying the Bible with us.</p>

<small>Please do respond to this email. If you are having technical difficulties.</small>

Thanks,<br>
{{ 'BFAM Bible Club' }}
@endcomponent
