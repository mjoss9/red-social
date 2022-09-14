<template>
    <div>
        <div v-for="(post, index) in posts" :key="index">
            <post-item :post="post"></post-item>
        </div>
    </div>
</template>
<script setup>
import PostItem from './PostItem.vue'

</script>
<script>
    export default {
  components: { PostItem },
        props: ['posts']
    }
</script>