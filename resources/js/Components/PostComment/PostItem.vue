<template>
    <div class="mt-5 py-5 space-x-3 bg-white sm:px-8 px-4 rounded-lg" v-show="post.reported < 5">
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
                <icon
                    name="report"
                    class="w-8 h-8 fill-current text-yellow-500"
                    v-show="post.reported > 0"
                    @mouseover="informationHover = true"
                    @mouseleave="informationHover = false"
                ></icon>
                <div
                    v-show="informationHover"
                    class=" text-sm absolute w-40 right-10 top-0 text-gray-700 rounded-md p-0 ease-in-out"
                >
                    El post ha sido reportado
                </div>
                <button
                    type="button"
                    class="focus:outline-none"
                    @click="openMenu = !openMenu"
                >
                    <icon name="ellipsis-h" class="w-8 h-8 fill-current"></icon>
                </button>
                <div
                    v-if="openMenu"
                    class="bg-gray-50 text-sm absolute w-48 right-0 text-gray-700 shadow-lg rounded-md p-0 ease-in-out"
                >
                    <form @submit.prevent="deletePost">
                        <button
                            type="submit"
                            class="rounded-md py-2 px-4 flex justify-between items-center w-full focus:outline-none hover:bg-gray-700 hover:text-gray-300 transition duration-150"
                        >
                            Eliminar post
                            <icon
                                name="trash"
                                class="w-5 h-5 fill-current"
                            ></icon>
                        </button>
                    </form>
                    <Report :item="post" :method="submitReport"></Report>
                </div>
            </div>
        </div>
        <div>
            <div class="my-3 text-gray-700 overflow-auto">
                <span v-html="convertText(post.body)">
                </span>
            </div>
            <div v-if="post.image_path">
                <img
                    v-if="post.file_type === 'jpg' || post.file_type === 'webp' || post.file_type === 'jpeg'"
                    :src="'http://localhost:8000/storage/' + post.image_path"
                    :alt="post.image_path"
                    class="sm:max-w-md h-auto mx-auto my-3 object-cover"
                />
                <!-- C:\xampp\htdocs\social-network\storage\app\public\subimpost
                    http://localhost:8000/storage/app/public/
                    -->
                <iframe
                    v-if="post.file_type === 'pdf'"
                    :src="'http://localhost:8000/storage/' + post.image_path"
                    class="w-full h-80 pdf"
                    frameborder="1"
                ></iframe>

                <iframe
                    v-if="post.file_type === 'mp4'"
                    :src="'http://localhost:8000/storage/' + post.image_path"
                    class="flex justify-between items-center w-full"
                    height="400"
                    sandbox
                ></iframe>
            </div>
            <div class="flex ">
                <like :item="post" :method="submitLike"></like>
                <dislike :item="post" :method="submitLike"></dislike>
            </div>
            <div class="flex justify-between border-y border-gray-300" v-show="post.reported < 1">
                <div class="flex ml-3 p-3 sm:p-5 hover:bg-slate-200 rounded">
                    <button @click="submitLike">
                        <div class="flex text-gray-600">
                            <icon
                                name="like"
                                class="w-7 h-7 sm:w-5 sm:h-5 ml-1 fill-current"
                            ></icon>
                            <span class="hidden sm:block">Me gusta</span>
                        </div>
                    </button>
                </div>
                <div class="flex ml-3 p-3 sm:p-5 hover:bg-slate-200 rounded">
                    <button @click="submitDisLike">
                        <div class="flex text-gray-600">
                            <icon
                                name="dislike"
                                class="w-7 h-7 sm:w-5 sm:h-5 ml-1 fill-current"
                            ></icon>
                            <span class="hidden sm:block">No me gusta</span>
                        </div>
                    </button>
                </div>
                <div class="flex p-3 sm:p-5 ml-3 hover:bg-slate-200 rounded">
                    <button @click="openComments = !openComments">
                        <div class="flex text-gray-600">
                            <icon
                                name="comment"
                                class="w-7 h-7 sm:w-5 sm:h-5 ml-1 fill-current"
                            ></icon>
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
                    class="mt-5"
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
import Report from "./Reports/Report.vue";
import CombinedComments from "./CombinedComments.vue";
import PostForm from "./PostForm.vue";

const formatDate = (date) => {
    return moment(date).fromNow();
};

function convertText(txtData) {
    var urlRegex =/(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
    txtData = txtData.replace(urlRegex, '<a href="$1" target="_blank">$1</a>');

    var urlRegex =/(\b(\swww).[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
    txtData = txtData.replace(urlRegex, ' <a href="$1" target="_blank">$1</a>');

    var urlRegex =/(>\swww)/ig;
    txtData = txtData.replace(urlRegex, '>www');

    var urlRegex =/(\"\swww)/ig;
    txtData = txtData.replace(urlRegex, '"http://www');

    return txtData;
}

</script>
<script>
export default {
    components: { CombinedComments, PostForm },
    props: ["post"],
    data() {
        return {
            openMenu: false,
            informationHover: false,
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
            reportForm: this.$inertia.form({
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
        submitReport() {
            this.reportForm.post(this.route("post-report.store", this.post), {
                preserveScroll: true,
                onSuccess: () => {
                    Toast.fire({
                        icon: "success",
                        title: "El post ha sido reportado",
                    });
                },
            });
        },
    },
};
</script>
