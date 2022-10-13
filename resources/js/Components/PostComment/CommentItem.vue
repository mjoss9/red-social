<template>
    <div class="my-5 space-x-5">
        <div class="flex">
            <div class="mr-4 flex-shrink-0">
                <Link :href="route('profiles.show', comment.user.username)">
                    <img
                        class="h-8 w-8 rounded-full object-cover"
                        :src="comment.user.profile_photo_url"
                        :alt="comment.user.username"
                    />
                </Link>
            </div>
            <div>
                <div class="flex">
                    <div class="rounded-lg bg-gray-100 p-2">
                        <h4 class="text-gray-900 font-semibold">
                            <Link
                                :href="
                                    route('profiles.show', comment.user.username)
                                "
                                >{{ comment.user.name }}
                            </Link>
                        </h4>
                        <p class="text-gray-700">
                            {{ comment.body }}
                        </p>
                    </div>
                    <div class="">
                        <div>
                            <like :item="comment" :method="submitLike" class="text-xs"></like>
                            <!-- <dislike
                                :item="comment"
                                :method="submitDisLike"
                                class="ml-2"
                            ></dislike> -->
                        </div>
                    </div>
                </div>
                <div class="flex">
                    <div class="ml-3">
                        <button @click="submitLike">
                            <span class="text-sm font-bold text-gray-700 hover:underline"
                                >Me gusta</span
                            >
                        </button>
                    </div>
                    <div class="ml-3">
                        <button @click="submitDisLike">
                            <span class="text-sm font-bold text-gray-700 hover:underline"
                                >No me gusta</span
                            >
                        </button>
                    </div>
                    <div class="mx-3">
                        <span class="text-sm italic">{{
                            formatDate(comment.created_at)
                        }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import Like from "./Likes/Like.vue";
import Dislike from "./Likes/Dislike.vue";
import moment from "moment";

const formatDate = (date) => {
    return moment(date).fromNow();
};
</script>
<script>
export default {
    props: ["comment"],
    data() {
        return {
            likeForm: this.$inertia.form({
                comment: this.comment,
            }),
            dislikeForm: this.$inertia.form({
                comment: this.comment,
            }),
        };
    },
    methods: {
        submitLike() {
            this.likeForm.post(
                this.route("comment-like.store", this.comment.id),
                {
                    preserveScroll: true,
                    onSuccess: () => {},
                }
            );
        },
        submitDisLike() {
            this.dislikeForm.delete(
                this.route("comment-like.destroy", this.comment.id),
                {
                    preserveScroll: true,
                    onSuccess: () => {},
                }
            );
        },
    },
};
</script>
