<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    users: Number,
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome"></Head>
    <div class="flex justify-around items-center bg-gray-100 min-h-screen">
        <div>
            <img class="w-96" src="/storage/app/public/images/logo.jpg" alt="socialNet">
        </div>
        <div class="text-center">
            <h1 class="text-4x1 font-semibold">
                Social Network
            </h1>
            <div v-if="canLogin" class="flex justify-center space-x-6 mt-5">
                <Link v-if="$page.props.user" :href="route('dashboard')" class="text-lg text-gray-700 underline">Dashboard</Link>
                <template v-else>
                    <Link :href="route('login')" class="text-white bg-gray-800 rounded px-3 py-1 hover:bg-gray-500">Log in</Link>
                    <Link v-if="canRegister" :href="route('register')" class="text-white bg-gray-800 rounded px-3 py-1 hover:bg-gray-500">Register</Link>
                </template>
            </div>
            <p class="mt-10">
                {{ users }} active members
            </p>
        </div>
    </div>
</template>
