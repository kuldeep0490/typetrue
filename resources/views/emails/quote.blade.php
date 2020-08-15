@component('mail::message')
# Hello,

@if($lead->rating <= 75 && $lead->rating > 0)
### Here are a few quotes based on the information provided:

@component('mail::panel')
For ${{ number_format($lead->faceAmount, 2) }} of coverage over a 10 year term: ${{ number_format($lead->monthlyPremium, 2) }}/month<br>
For ${{ number_format($lead->faceAmount2, 2) }} of coverage over a 20 year term: ${{ number_format($lead->monthlyPremium2, 2) }}/month<br>
@endcomponent

*Based on your profile you should be able to get life insurance rates that are comparable to rates of a non-diabetic. Over time it may also be possible to lower your cost by improving your condition.*
@endif

@if($lead->rating > 75)
### Here are a few quotes based on the information provided:

@component('mail::panel')
For ${{ number_format($lead->faceAmount, 2) }} of coverage over a 10 year term: ${{ number_format($lead->monthlyPremium, 2) }}/month<br>
For ${{ number_format($lead->faceAmount2, 2) }} of coverage over a 20 year term: ${{ number_format($lead->monthlyPremium2, 2) }}/month<br>
@endcomponent

*You are likely a good candidate for no-medical-exam life insurance or guaranteed issue life insurance. Over time it may also be possible to lower your cost by improving your condition.*
@endif

@if($lead->rating === 0 || $lead->rating == '')
### Here are a few quotes based on the information provided:

@component('mail::panel')
For ${{ number_format($lead->faceAmount, 2) }} of coverage over a 10 year term: ${{ number_format($lead->monthlyPremium, 2) }}/month<br>
For ${{ number_format($lead->faceAmount2, 2) }} of coverage over a 20 year term: ${{ number_format($lead->monthlyPremium2, 2) }}/month<br>
@endcomponent

*Based on your profile, you likely qualify for the lowest cost life insurance. We recommend applying for life insurance with a medical exam. This will allow you to get the lowest cost life insurance for type 2 diabetics. We’ll be glad to help you do that.*
@endif

*If you have any questions or would like more information on how to obtain the best price on life insurance for type 2 diabetics, contact us at:*

1-877-TYPE-TRU<br>
1-877-897-3878<br>
info@typetrue.com

Thanks,<br>
{{ config('app.name') }}

@component('mail::subcopy')
These quotes are based on information you entered. Your actual price will be based on the information in your application.” 
@endcomponent

@endcomponent
