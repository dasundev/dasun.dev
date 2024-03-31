@component('mail::message')
# {{ $post->title }}

{{ $post->excerpt }}

@component('mail::button', ['url' => route('show-post', $post)])
Read More
@endcomponent

Thanks,<br>
Dasun Tharanga
@endcomponent
