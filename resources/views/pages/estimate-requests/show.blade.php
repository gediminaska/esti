<strong>Title: {{ $estimateRequest->title }}</strong>
<p>Description: {{ $estimateRequest->description }}</p>
<h2>Images:</h2>
@foreach($estimateRequest->images as $image)
    <img src="{{ asset(str_replace("public", "storage", asset($image->name))) }}" alt="" height="auto" width="auto" style="display: block">
@endforeach
<hr>
<strong>Estimate request has {{count($estimateRequest->estimates)}} estimates</strong>
@foreach($estimates as $estimate)
    <p>User: {{ $estimate->user->name }}</p>
    <p>Hours: {{ $estimate->hours }}</p>
    <p>Description: {{ $estimate->description }}</p>
    <hr>
    <p>Images:</p>
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

