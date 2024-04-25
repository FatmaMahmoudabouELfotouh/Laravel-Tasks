<!-- posts.show.blade.php -->
<h1>{{ $post->title }}</h1>
<p>{{ $post->body }}</p>

@if ($post->image)
    <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }}">
@endif

<h2>Comments</h2>
<ul>
    @foreach ($post->comments as $comment)
        <li>{{ $comment->body }}</li>
    @endforeach
</ul>

<hr>

<form action="{{ route('comments.store', $post->id) }}" method="POST">
    @csrf
    <div>
        <label for="body">Add Comment:</label><br>
        <textarea name="body" id="body" cols="30" rows="5"></textarea>
    </div>
    <br>
    <button type="submit">Add Comment</button>
</form>
