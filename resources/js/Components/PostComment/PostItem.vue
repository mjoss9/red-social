<template>
    <div class="flex border-t border-gray-400 mt-5 py-5 space-x-5">
        <div class="flex-shrink-0">
            <Link :href="route('profiles.show', post.user.username)">
                <img class="h-8 w-8 rounded-full object-cover" :src="post.user.profile_photo_url" :alt="post.user.username">
            </Link>
        </div>
        <div class="flex-1">
            <div>
                <div class="flex justify-between">
                    <h2 class="text-lg font-semibold underline">
                        <Link :href="route('profiles.show', post.user.username)">
                            {{ post.user.username }}
                        </Link>
                    </h2>
                    <div class="relative">
                        <button type="button" class="focus:outline-none" @click="openMenu= !openMenu">
                            <icon name="ellipsis-h" class="w-8 h-8 fill-current"></icon>
                        </button>
                        <div v-if="openMenu" class="bg-gray-300 text-sm absolute w-48 right-0 text-gray-700 shadow-lg rounded-md px-4 py-2 hover:bg-gray-700 hover:text-gray-300 transition duration-150 ease-in-out">
                            <form @submit.prevent="deletePost">
                                <button type="submit" class="flex justify-between items-center w-full focus:outline-none">
                                    Delete Post
                                    <icon name="trash" class="w-8 h-8 fill-current"></icon>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <p class="bg-gray-100 rounded mt-3 px-3 py-2">
                    {{ post.body}}
                </p>
            </div>
            <div class="flex items-end my-3">
                <div>
                    <span class="text-sm italic">{{ formatDate(post.created_at) }}</span>
                </div>

                <div class="flex ml-3">
                    <span>Like</span>
                    <span class="ml-2">Dislike</span>
                </div>
            </div>
        </div>
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
        props: ['post'],
        data() {
            return {
                openMenu: false,
                deleteForm: this.$inertia.form({
                    userPost: this.post
                })
            }
        },
        methods: {
            deletePost() {
                this.openMenu = false
                this.deleteForm.delete(this.route('posts.destroy', this.post),{
                    preserveScroll: true,
                    onError: ()=>{
                        Toast.fire({
                            icon: 'error',
                            title: 'No puedes borrar este post',
                        })
                    },
                    onSuccess: ()=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Tu post ha sido borrado con exito!'
                        })
                    }
                })
            }
        }
    }
</script>