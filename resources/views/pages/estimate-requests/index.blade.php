<h1>{{ Voyager::can('browse_all_estimate_requests') ? 'All' : 'Your'}} estimate requests</h1>
<p>Total: {{count($estimateRequests)}} requests</p>
<a href="{{ route('estimate-requests.create') }}">Create new</a>
@foreach($estimateRequests as $estimateRequest)
    <p><a href="{{ route('estimate-requests.show', $estimateRequest->id) }}"><strong>{{$estimateRequest->title}}</strong></a> {{$estimateRequest->created_at->diffForHumans()}}{{ $estimateRequest->user->id == Auth::user()->id ? '' : ' submitted by ' . $estimateRequest->user->name}}</p>
    <p>has {{count($estimateRequest->estimates)}} estimates submitted</p>
    <hr>
    @endforeach