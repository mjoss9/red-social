<template>
    <div class="flex items-center ml-6">
        <span>
            {{ item.disliked }}
        </span>
        <form @submit.prevent="method">
            <button type="submit" class="focus:outline-none rounded-full p-1 bg-red-800 mr-2 text-xs">
                <icon name="dislike" class="w-5 h-5 ml-1 fill-current hover:text-blue-600 text-gray-200"></icon>
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