<template>
    <pages-layout>
        <template #title>
            <div class="flex flex-col">
                 <Link :href="route('chat-rooms.index')" class="flex text-gray-800">
                    <icon name="angles-left" class="w-3 h-3 fill-current"></icon>
                    <span class="font-semibold text-lg capitalize underline ml-2">Back</span>
                </Link>
                <div class="flex justify-between items-center mt-5">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight">
                        Bienvenido a: {{ room.name }}
                    </h3>
                    <h4>{{ room.active }} usuarios activos</h4>
                </div>
                <div class="flex space-x-4 mt-5">
                    <div class="flex-shrink-0 rounded-md border border-gray-300 h-128">

                    </div>
                    <div class="flex-1 rounded-md border border-gray-300 flex flex-col h-128">
                        <chat-box :messages="messages"></chat-box>
                        <chat-input :method="submitMessage" :form="form" :item="room"></chat-input>
                    </div>
                </div>
            </div>
        </template>
    </pages-layout>
</template>
<script setup>
import PagesLayout from '../../../Layouts/PagesLayout.vue'
import { Link } from "@inertiajs/inertia-vue3";
import ChatBox from "../../../Components/Chat/ChatBox.vue";
import ChatInput from '../../../Components/Chat/ChatInput.vue';
</script>
<script>
export default {
    props: ['room', 'messages'],
    mounted() {
        this.connect()
    },
    data() {
        return {
            form: this.$inertia.form({
                body: this.body,
                room: this.room
            })
        }
    },
    methods: {
        submitMessage() {
            this.form.post(this.route('chat-rooms.store', this.room), {
                preserveScroll: true,
                onSuccess: ()=>{
                    this.form.body = null
                }
            })
        },
        connect() {
            Echo.private(`chat.${this.room.id}`)
                .listen('NewChatmessageEvent',(e) =>{
                    let newMessage = {
                        body: e.message.body,
                        user: e.user
                    }
                    this.messages.push(newMessage)
                })
        }
    }
}
</script>