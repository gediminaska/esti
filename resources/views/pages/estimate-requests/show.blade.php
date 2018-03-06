<strong>{{ $estimateRequest->title }}</strong>
<p>{{ $estimateRequest->description }}</p>
<hr>
<strong>Estimate request has {{count($estimateRequest->estimates)}} estimates</strong>
@foreach($estimates as $estimate)
    <p>User: {{ $estimate->user->name }}</p>
    <p>Hours: {{ $estimate->hours }}</p>
    <p>Description: {{ $estimate->description }}</p>
    <hr>
@endforeach

@if(Voyager::can('add_estimates'))
    <strong>Submit estimate</strong>
    <form action="{{ route('estimates.store') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="estimate_request_id" value="{{ $estimateRequest->id }}">
        <label for="description">Description:</label>
        <input type="text" name="description">
        <label for="hours">Hours:</label>
        <input type="number" name="hours">
        <button type="submit">Submit</button>
    </form>
@endif

