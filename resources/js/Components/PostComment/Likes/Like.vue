<template>
    <div class="flex items-center" v-show="item.liked !== 0">
        <form @submit.prevent="method">
            <button
                type="submit"
                class="focus:outline-none rounded-full p-1 bg-red-800 mr-2"
            >
                <icon
                    name="like"
                    class="w-4 h-4 ml-1 fill-current text-gray-200"
                ></icon>
            </button>
        </form>
        <span>
            {{ item.liked }}
        </span>
    </div>
</template>
<script setup>
</script>
<script>
export default {
    props: ["item", "method"],
};
</script>
