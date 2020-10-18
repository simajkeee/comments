<form method="POST" action="/post/{{$post->id}}">
    @csrf
    @if( isset($comment) )
        {{$comment['id']}}
        <input type="hidden" name="parent_id" value="{{$comment['id']}}">
    @endif
    <div><textarea id="comment" name="body" required></textarea></div>
    <div><input class="btn btn-primary" type="submit"></div>
</form>
