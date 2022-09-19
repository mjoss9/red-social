<template>
    <div>
        <div v-for="comment in comments" :key="comment.id">
            <comment-item :comment="comment"></comment-item>
        </div>
    </div>
</template>
<script setup>
import CommentItem from './CommentItem.vue';

</script>
<script>
export default {
    props: ['comments']
}
</script>