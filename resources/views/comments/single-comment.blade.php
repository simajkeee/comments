<li>
    <single-comment>
        <template v-slot:date>
            2 hours ago
        </template>
        <template v-slot:comment>
            {{$comment['body']}}
        </template>
    </single-comment>

    <add-comment v-on:update-page="updatePage"
                 v-bind:post="{{json_encode($post)}}"
                 v-bind:comment="{{json_encode($comment)}}"></add-comment>

@if(isset($treeComments[$comment['id']]))
        @include('comments.comment-list', ['collection' => $treeComments[$comment['id']] ])
@endif
</li>
