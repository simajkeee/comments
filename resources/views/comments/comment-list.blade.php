<ul>
    @foreach ( $collection as $comment)
        @include('comments.single-comment', $comment)
    @endforeach
    <?php unset($comment); ?>
</ul>
