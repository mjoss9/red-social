<template>
    <div class="h-full overflow-y-auto">
        <div v-for="(user,index) in users" :key="index" class="border-b border-gray-300 bg-gray-100 text-gray-700 px-4 py-2 hover:bg-gray-300 transition duration-150 ease-in-out">
            <Link :href="route('profiles.show', user.username)" class="flex items-center">
                <img :src="user.avatar" :alt="user.username" class="w-8 h-8 object-cover rounded-full">
                <span class="ml-3">{{ user.username }}</span>
            </Link>
        </div>
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>
<script>
export default {
    props: ['users'],
}
</script>