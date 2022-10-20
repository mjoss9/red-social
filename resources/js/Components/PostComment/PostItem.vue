<template>
    <div class="mt-5 py-5 space-x-3 bg-white sm:px-8 px-4 rounded-lg">
        <div class="flex justify-between">
            <div class="flex">
                <div class="mr-4 flex-shrink-0 self-center">
                    <Link :href="route('profiles.show', post.user.username)">
                        <img
                            class="h-8 w-8 rounded-full object-cover"
                            :src="post.user.profile_photo_url"
                            :alt="post.user.username"
                        />
                    </Link>
                </div>
                <div>
                    <h4 class="font-bold text-gray-900">
                        <Link
                            :href="route('profiles.show', post.user.username)"
                        >
                            {{ post.user.name }}
                        </Link>
                    </h4>
                    <span class="text-gray-500 text-sm">{{
                        formatDate(post.created_at)
                    }}</span>
                </div>
            </div>
            <div class="relative">
                <button
                    type="button"
                    class="focus:outline-none"
                    @click="openMenu = !openMenu"
                >
                    <icon name="ellipsis-h" class="w-8 h-8 fill-current"></icon>
                </button>
                <div
                    v-if="openMenu"
                    class="bg-gray-300 text-sm absolute w-48 right-0 text-gray-700 shadow-lg rounded-md px-4 py-2 hover:bg-gray-700 hover:text-gray-300 transition duration-150 ease-in-out"
                >
                    <form @submit.prevent="deletePost">
                        <button
                            type="submit"
                            class="flex justify-between items-center w-full focus:outline-none"
                        >
                            Delete Post
                            <icon
                                name="trash"
                                class="w-8 h-8 fill-current"
                            ></icon>
                        </button>
                        <button
                            type="submit"
                            class="flex justify-between items-center w-full focus:outline-none"
                        >
                            Denunciar
                            <icon
                                name="trash"
                                class="w-8 h-8 fill-current"
                            ></icon>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div>
            <div class="my-3 text-gray-700">
                <h2>
                    {{ post.body }}
                </h2>
           </div>
            <div v-if="post.image_path">
                    <img v-if="post.file_type==='jpg'" :src="'http://localhost:8000/storage/'+post.image_path" :alt="post.image_path" >
                    <!-- C:\xampp\htdocs\social-network\storage\app\public\subimpost
                    http://localhost:8000/storage/app/public/
                    -->
                    <iframe v-if="post.file_type==='pdf'" :src="'http://localhost:8000/storage/'+post.image_path" class="flex justify-between items-center w-full" frameborder="1" height="300"></iframe>

                    <iframe v-if="post.file_type==='mp4'" :src="'http://localhost:8000/storage/'+post.image_path" class="flex justify-between items-center w-full" height="400" sandbox></iframe>
                </div>
            <like :item="post" :method="submitLike"></like>
            <div class="flex justify-between border-y border-gray-300 p-3 sm:p-5 my-3">
                <div class="flex ml-3">
                    <button @click="submitLike">
                        <div class="flex text-gray-600">
                            <icon name="like" class="w-7 h-7 sm:w-5 sm:h-5 ml-1 fill-current"></icon>
                            <span class="hidden sm:block">Me gusta</span>
                        </div>
                    </button>
                </div>
                <div class="flex ml-3">
                    <button @click="submitDisLike">
                        <div class="flex text-gray-600">
                            <icon name="dislike" class="w-7 h-7 sm:w-5 sm:h-5 ml-1 fill-current"></icon>
                            <span class="hidden sm:block">No me gusta</span>
                        </div>
                    </button>
                </div>
                <div>
                    <button @click="openComments = !openComments">
                        <div class="flex text-gray-600">
                            <icon name="comment" class="w-7 h-7 sm:w-5 sm:h-5 ml-1 fill-current"></icon>
                            <span class="hidden sm:block">Comentar</span>
                        </div>
                    </button>
                </div>
            </div>
            <div v-show="openComments">
                <combined-comments
                    :comments="post.comments"
                ></combined-comments>
                <post-form
                    :method="submit"
                    :form="form"
                    :text="'Comment'"
                ></post-form>
            </div>
        </div>
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import moment from "moment";
import Like from "./Likes/Like.vue";
import Dislike from "./Likes/Dislike.vue";
import CombinedComments from "./CombinedComments.vue";
import PostForm from "./PostForm.vue";

const formatDate = (date) => {
    return moment(date).fromNow();
};
</script>
<script>
export default {
    components: { CombinedComments, PostForm },
    props: ["post"],
    data() {
        return {
            openMenu: false,
            openComments: false,
            form: this.$inertia.form({
                body: this.body,
                user_id: this.post.user_id,
            }),
            deleteForm: this.$inertia.form({
                userPost: this.post,
            }),
            likeForm: this.$inertia.form({
                userPost: this.post,
            }),
            dislikeForm: this.$inertia.form({
                userPost: this.post,
            }),
        };
    },
    methods: {
        submit() {
            this.form.post(this.route("comments.store", this.post), {
                preserveScroll: true,
                onSuccess: () => {
                    Toast.fire({
                        icon: "success",
                        title: "Tu comentario fue publicado correctamente",
                    });
                    this.form.body = null;
                },
            });
        },
        deletePost() {
            this.openMenu = false;
            this.deleteForm.delete(this.route("posts.destroy", this.post), {
                preserveScroll: true,
                onError: () => {
                    Toast.fire({
                        icon: "error",
                        title: "No puedes borrar este post",
                    });
                },
                onSuccess: () => {
                    Toast.fire({
                        icon: "success",
                        title: "Tu post ha sido borrado con exito!",
                    });
                },
            });
        },
        submitLike() {
            this.likeForm.post(this.route("post-like.store", this.post), {
                preserveScroll: true,
                onSuccess: () => {},
            });
        },
        submitDisLike() {
            this.dislikeForm.delete(
                this.route("post-like.destroy", this.post),
                {
                    preserveScroll: true,
                    onSuccess: () => {},
                }
            );
        },
}
}

</script>
