<template>
    <form @submit.prevent="method">
        <button
            type="submit"
            class="rounded-md py-2 px-4 flex justify-between items-center w-full focus:outline-none hover:bg-gray-700 hover:text-gray-300 transition duration-150"
        >
            Denunciar
            <icon
                name="report"
                class="w-5 h-5 fill-current text-yellow-600"
            ></icon>
        </button>
    </form>
</template>
<script setup></script>
<script>
export default {
    props: ["item", "method"],
};
</script>
