<template>
    <pages-layout title="Dashboard">
        <template #title>
            <div
                class="flex flex-col items-center sm:flex-row sm:justify-between"
            >
                <h2
                    class="flex items-end font-semibold text-xl text-gray-800 leading-tight"
                >
                    <Link
                        :href="route('members.index')"
                        class="capitalize underline"
                        >Members</Link
                    >
                </h2>
                <span
                    class="text-gray-800 leading-tight text-lg capitaliza mt-5 sm:mt-0"
                >
                    Visit your
                    <Link href="#" class="underline hover:text-green-500"
                        >Friends</Link
                    >
                </span>
            </div>
        </template>
        <user-block :items="members"></user-block>
    </pages-layout>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>
<script>
import UserBlock from "../../../Components/UserBlock.vue"
import PagesLayout from "../../../Layouts/PagesLayout.vue";
export default {
    props: ["members"],
    components: {
        PagesLayout,
        UserBlock,
    },
};
</script>
