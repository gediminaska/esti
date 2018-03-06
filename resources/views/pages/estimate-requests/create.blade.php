<form action="{{route('estimate-requests.store')}}" method="POST">
    {{ csrf_field() }}
    <label for="title">Title</label>
    <input type="text" name="title">
    <label for="description">Description</label>
    <input type="text" name="description">
    <button type="submit">Create</button>
</form>