<template>
    <div>
        <template v-if="unread">
            <Link :href="unread.data.info.link" class="flex leading-5" @click="markOneAsRead(unread.id)">
                <img :src="unread.data.info.avatar" class="h-8 w-8 rounded-full object-cover">
                <div class="flex flex-col items-start text-left">
                    <span class="text-sm mx-2">{{ unread.data.info.message }}</span>
                    <span class="text-xs mx-2">{{ formatDate(unread.data.info.sent) }}</span>
                </div>
            </Link>
            <Link href="#" class="p-2 rounded-md text-gray-500 hover:bg-gray-500 hover:text-gray-300" @click="markForDelete(unread.id)">
                <icon name="trash" class="w-4 h-4 fill-current"></icon>
            </Link>
        </template>
        
        <template v-if="read">
            <Link :href="read.data.info.link" class="flex leading-5" @click="markOneAsRead(read.id)">
                <img :src="read.data.info.avatar" class="h-8 w-8 rounded-full object-cover">
                <div class="flex flex-col items-start text-left">
                    <span class="text-sm mx-2">{{ read.data.info.message }}</span>
                    <span class="text-xs mx-2">{{ formatDate(read.data.info.sent) }}</span>
                </div>
            </Link>
            <Link href="#" class="p-2 rounded-md text-gray-500 hover:bg-gray-500 hover:text-gray-300" @click="markForDelete(read.id)">
                <icon name="trash" class="w-4 h-4 fill-current"></icon>
            </Link>
        </template>
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import moment from 'moment';

const formatDate = (date) => {
    return moment(date).fromNow()
};

</script>
<script>
export default {
    props: ['read', 'unread'],
    methods: {
        markOneAsRead(id) {
            axios.post(this.route('notifications.store', id))
        },
        markForDelete(id) {
            axios.get(this.route('notifications.destroy', id))
                .then(()=>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Tu notificacion ha sido borrada con exito!'
                    })
                })
        }
    }
}
</script>