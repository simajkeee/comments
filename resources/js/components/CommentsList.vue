<template>
    <ul>
        <li v-for="c in collection" :key="c.id">
            <single-comment :post="post" :comment="c"></single-comment>
            <add-comment :post="post" :comment="c"></add-comment>
            <comments-list
                v-if="treeComments[c.id] !== 'undefined'"
                :post="post"
                :tree-comments="treeComments"
                :collection="treeComments[c.id]"></comments-list>
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['collection', 'post', 'treeComments']
    }
</script>
