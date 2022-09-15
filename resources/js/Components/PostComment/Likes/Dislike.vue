<template>
    <div class="flex items-center">
        <span>
            {{ item.disliked }}
        </span>
        <form @submit.prevent="method">
            <button type="submit" class="focus:outline-none">
                <icon name="dislike" class="w-5 h-5 ml-1 fill-current hover:text-blue-600"></icon>
            </button>
        </form>
    </div>
</template>
<script setup>

</script>
<script>
    export default {
        props: ['item', 'method']
    }
</script>