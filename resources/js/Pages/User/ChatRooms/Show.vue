<template>
    <pages-layout>
        <template #title>
            <div class="flex flex-col">
                <Link
                    :href="route('chat-rooms.index')"
                    class="flex text-gray-800"
                >
                    <icon
                        name="angles-left"
                        class="w-3 h-3 fill-current"
                    ></icon>
                    <span
                        class="font-semibold text-lg capitalize underline ml-2"
                        >Back</span
                    >
                </Link>
                <div class="flex justify-between items-center mt-5">
                    <h3
                        class="font-semibold text-lg text-gray-800 leading-tight"
                    >
                        Bienvenido a: {{ room.name }}
                    </h3>
                    <h4>{{ room.active }} usuarios activos</h4>
                </div>
                <div class="flex space-x-4 mt-5">
                    <div
                        class="flex-shrink-0 rounded-md border border-gray-300 h-128"
                    >
                        <chat-actives :users="users"></chat-actives>
                    </div>
                    <div
                        class="flex-1 rounded-md border border-gray-300 flex flex-col h-128"
                    >
                        <chat-box :messages="messages" id="container"></chat-box>
                        <chat-input
                            :method="submitMessage"
                            :form="form"
                            :item="room"
                        ></chat-input>
                    </div>
                </div>
            </div>
        </template>
    </pages-layout>
</template>
<script setup>
import PagesLayout from "../../../Layouts/PagesLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import ChatBox from "../../../Components/Chat/ChatBox.vue";
import ChatInput from "../../../Components/Chat/ChatInput.vue";
import ChatActives from "../../../Components/Chat/ChatActives.vue";
</script>
<script>
export default {
    components: { ChatActives },
    props: ["room", "messages"],
    mounted() {
        this.getActive();
        this.scrollToBottom();
        this.connect();
    },
    data() {
        return {
            activeCount: 0,
            users: [],
            form: this.$inertia.form({
                body: this.body,
                room: this.room,
            }),
            updateUserForm: this.$inertia.form({
                room: this.room,
                count: 0,
            }),
        };
    },
    methods: {
        submitMessage() {
            this.form.post(this.route("chat-rooms.store", this.room), {
                preserveScroll: true,
                onSuccess: () => {
                    this.scrollToBottom = 
                    this.form.body = null;
                },
            });
        },
        scrollToBottom() {
            let container = document.querySelector('#container');
            container.scrollTo = container.scrollHeight;
        },
        getActive() {
            this.updateUserForm.post(
                this.route("chat-rooms.update", this.room),
                {
                    preserveScroll: true,
                    onSuccess: () => {},
                }
            );
        },
        connect() {
            Echo.join(`chat.${this.room.id}`)
                .here((users) => {
                    this.activeCount = users.length;
                    this.users = users;
                    this.updateUserForm.count = this.activeCount
                    this.getActive()
                })
                .joining((user) => {
                    this.activeCount++;
                    this.users.push(user);
                    this.updateUserForm.count = this.activeCount
                    this.getActive()
                })
                .leaving((user) => {
                    this.activeCount--;
                    this.users.splice(this.users.indexOf(user), 1);
                    this.updateUserForm.count = this.activeCount
                    this.getActive()
                })
                .listen("NewChatmessageEvent", (e) => {
                    let newMessage = {
                        body: e.message.body,
                        user: e.user,
                    };
                    this.messages.push(newMessage);
                    this.scrollToBottom()
                });
        },
        beforeDestroy() {
            if(this.users.length = 1) {
                this.updateUserForm.count = 0
                this.getActive()
            } else {
                this.getActive()
            }
        },
        destroyed() {
            Echo.leave(`chat.${this.room.id}`);
        },
        // watch: {
        //     messages: function() {
        //         this.$nextTick(function(){
        //             this.scrollToBottom();
        //         })
        //     }
        // },
    },
};
</script>
