<h3>You received a new contact submission</h3>

@foreach($contact->getAttributes() as $attribute => $value)
    <p>
        <strong>{{ str_replace('_', ' ', \Illuminate\Support\Str::title($attribute)) }}:</strong>
        {{ $value }}
    </p>

@endforeach

@if($ip = request()->getClientIp())
    <p>
        <strong>IP address:</strong> {{ $ip }}
    </p>
@endif

<p>
    <a href="{{ url('admin/contacts/1/edit') }}">Go to backend</a>
</p>
