/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.axios = require('axios');
window.Vue = require('vue');
window.EventBus = new Vue();
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('single-comment', require('./components/SingleComment.vue').default);
Vue.component('add-comment', require('./components/AddComment.vue').default);
Vue.component('comments-list', require('./components/CommentsList.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: function (){
        return {
            post: '',
            treeComments: [],
        }
    },
    methods: {
        fetchAppData: function() {
            console.log('/api' + window.location.pathname)
            axios
                .get('/api' + window.location.pathname)
                .then(response => {
                    this.post = response.data.post;
                    this.treeComments = response.data.treeComments;
                })
                .catch(error => console.log(error))
        }
    },
    mounted() {
        window.EventBus.$on('update-page', this.fetchAppData );
        this.fetchAppData();
    }
});
