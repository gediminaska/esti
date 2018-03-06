<h1>Your estimates</h1>
{{count($estimates)}}
<a href="{{ route('estimates.create') }}">Create new</a>
@foreach($estimates as $estimate)
    <p>{{$estimate->created_at}}</p>
@endforeach