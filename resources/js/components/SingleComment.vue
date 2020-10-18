<template>
    <div class="single-comment__wrapper hide-form" ref="singleComment">
        <div class="single-comment__img-wrapper">
            <div class="single-comment__img-mock"></div>
        </div>
        <div class="single-comment__comment-wrapper">
            <div class="single-comment__panel panel">
                <div class="single-comment__data">
                    <div class="panel__user-name">Test name</div>
                    <div class="panel__comment-date">
                        {{comment.date}}
                    </div>
                    <div class="panel__response" v-on:click="hideForm">Reply</div>
                </div>
                <div class="single-comment__likes likes">
                    <div class="likes__like">
                        like
                    </div>
                    <div class="likes__dislike" v-on:click="setDislike">
                        dislike
                    </div>
                    <div class="likes__number">
                        {{likes}}
                    </div>
                </div>
            </div>
            <div class="single-comment__text-wrapper">
                {{comment.body}}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['comment', 'post'],
    methods: {
        hideForm: function(event) {
            this.$refs.singleComment.classList.toggle("hide-form");
        },
        setDislike: function(event) {
            axios({
                method: 'post',
                url: '/api/dislike/' + this.post.id,
            })
            .then(response => {
                window.EventBus.$emit('update-page');
            })
            .catch(error => console.log(error));
        }
    },
    computed: {
        likes: function() {
            return this.comment.likes - this.comment.dislikes;
        }
    },
    // mounted() {
    //     console.log(this.comment)
    // }
}
</script>
