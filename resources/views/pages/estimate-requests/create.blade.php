<form action="{{route('estimate-requests.store')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <label for="title">Title</label>
    <input type="text" name="title">
    <label for="description">Description</label>
    <input type="text" name="description">
    <input type="file" name="photos[]" multiple="multiple" />
    <button type="submit">Create</button>
</form>