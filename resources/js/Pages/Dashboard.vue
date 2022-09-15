<template>
    <pages-layout title="Dashboard">
        <template #title>
            <div class="flex justify-between items-center w-full">
                <h2
                    class="flex items-end font-semibold text-xl text-gray-800 leading-tight"
                >
                    <img
                        :src="$page.props.user.profile_photo_url"
                        :alt="$page.props.user.username"
                        class="h-8 w-8 rounded-full object-cover"
                    />
                    <span class="capitalize ml-3"> Dashboard </span>
                </h2>
            </div>
        </template>
        <post-form :method="submit" :form="form" :text="'Post'"></post-form>
        <suggestion-block :suggestions="suggestions"></suggestion-block>
        <combined-post :posts="combinedPost.data"></combined-post>
    </pages-layout>
</template>

<script setup>
import PagesLayout from "@/Layouts/PagesLayout.vue";
import CombinedPost from "../Components/PostComment/CombinedPost.vue";
import PostForm from "../Components/PostComment/PostForm.vue";
import SuggestionBlock from "../Components/SuggestionBlock.vue";
</script>
<script>
export default {
    props: ["combinedPost", "suggestions"],
    data() {
        return {
            form: this.$inertia.form({
                user_id: this.$page.props.user.id,
                body: this.body,
            }),
        };
    },
    methods: {
        submit() {
            this.form.post(this.route("posts.store"), {
                preserveScroll: true,
                onSuccess: () => {
                    Toast.fire({
                        icon: "success",
                        title: "Tu post ha sido publicado con exito!",
                    }),
                        (this.form.body = null);
                },
            });
        },
    },
};
</script>
