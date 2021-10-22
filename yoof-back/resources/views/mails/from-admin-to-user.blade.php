Hello <i>{{ $data->receiver }}</i>,
<p>This is a demo email for testing purposes! Also, it's the HTML version.</p>

<p><u>Demo object values:</u></p>

<div>
    {{ $data->message }}
</div>

<p><u>Values passed by With method:</u></p>


Thank You,
<br/>
<i>{{ $data->sender }}</i>
