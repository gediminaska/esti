<form action="{{route('estimates.store')}}" method="POST">
    {{ csrf_field() }}
    <select name="estimate_request_id">
        @foreach($estimateRequests as $estimateRequest)
            <option value="{{$estimateRequest->id}}">{{$estimateRequest->id}}</option>
        @endforeach
    </select>
    <button type="submit">Create</button>
</form>