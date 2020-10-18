<template>
    <div class="single-comment__form-wrapper">
        <form v-on:submit.prevent="onSubmit" ref="formData">
            <input type="hidden" name="parent_id" v-if="this.comment" :value="this.comment.id">
            <div><textarea name="body" required></textarea></div>
            <div><input class="btn btn-primary" type="submit"></div>
        </form>
    </div>
</template>

<script>
export default {
    props: ['comment', 'post'],
    methods: {
        onSubmit: function(event) {
            let form = new FormData(this.$refs.formData);
            axios({
                method: 'post',
                url: '/post/' + this.post.id,
                data: form,
                headers: {'Content-Type': 'multipart/form-data' }
            })
            .then(response => {
                window.EventBus.$emit('update-page');
            })
            .catch(error => console.log(error));
        }
    }
}
</script>
