@component('mail::message')
# Hello,

@component('mail::panel')
Face Amount: $ {{ number_format($lead->faceAmount, 2) }}<br>
Monthly Premium: $ {{ number_format($lead->monthlyPremium, 2) }}<br>
Product: {{ strtoupper($lead->product) }}<br>
@endcomponent

@if($lead->rating <= 75 && $lead->rating > 0)
### Pretty Good. You can get reasonably low, just not the lowest cost possible life insurance rates.

*Based on your information, you are likely to get the best value from medical exam life insurance possibly combined with some no-medical-exam life insurance. Over time it may well be possible to lower your cost by improving your type two control or lifestyle. We’re glad to help you with your life insurance now and in the future.*
@endif

@if($lead->rating > 75)
### Bad news first. Your life insurance cost will definitely be significantly higher than a typical T2.

*You are likely a good candidate for no-medical-exam life insurance or guaranteed issue life insurance. Medical exam insurance would be useful only if you need life insurance in excess of $500,000. Good news is that it is possible to lower your cost by improving your type two control or lifestyle. We’re glad to help you with your life insurance now and in the future.*
@endif

@if($lead->rating === 0 || $lead->rating == '')
### Yes! You are likely to qualify for the lowest cost life insurance.

*Based on your information, you definitely should apply for life insurance with a medical exam. This will allow you to get the lowest cost life insurance for people with type two. We’ll be glad to help you do that.*
@endif

Thanks,<br>
{{ config('app.name') }}

@component('mail::subcopy')
These quotes are based on information you entered. Your actual price will be based on the information in your application.” 
@endcomponent

@endcomponent
