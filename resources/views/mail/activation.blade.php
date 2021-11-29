@component('mail::message')
# Introduction

<p>
	You account was created successfully.
</p>

<p>
	Click on the link below to activate you account
</p>

@component('mail::button', ['url' => $url])
 Activate Email
@endcomponent

@endcomponent
