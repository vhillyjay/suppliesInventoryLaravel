<h1>upload image</h1>
<form action="{{ route('profile.uploadimage') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="profilePhoto" id="profilePhoto">
    <button type="submit">uploadfile</button>
</form>