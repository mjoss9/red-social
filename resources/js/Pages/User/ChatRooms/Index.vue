<template>
    <pages-layout>
        <template #title>
            <div class="flex flex-col">
                <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
                    <span class="capitalize underline">Chat Rooms</span>
                </h2>
                <table class="mt-5">
                    <thead>
                        <tr class="border-b border-gray-800">
                            <th class="text-left pl-3">Rooms Name:</th>
                            <th>Active Members</th>
                            <th class="text-right pr-3">Join</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b bg-gray-50 h-10 hover:bg-gray-400 hover:text-blue-800 odd:bg-gray-500 transition ease-in-out duration-150" v-for="(room, index) in rooms" :key="index">
                            <td class="text-left pl-3 py-3">{{ room.name }}</td>
                            <td class="text-center py-3 py-3">{{ room.active }}</td>
                            <td class="text-right pr-3 py-3">
                                <Link :href="route('chat-rooms.show', room.slug)">
                                    <green-button class="text-xs">Join</green-button>
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </template>
    </pages-layout>
</template>
<script setup>
import PagesLayout from '../../../Layouts/PagesLayout.vue';
import GreenButton from '../../../Components/Buttons/GreenButton.vue';
import { Link } from "@inertiajs/inertia-vue3";
</script>
<script>
    export default {
        props: ['rooms'],
    }
</script>