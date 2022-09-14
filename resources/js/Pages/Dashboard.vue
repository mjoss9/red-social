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
        <form @submit.prevent="submit" class="w-full">
            <div>
                <textarea
                    name="post"
                    rows="3"
                    class="border rounded px-2 py-2 w-full"
                    :placeholder="`Post something ${$page.props.user.username} ...`"
                    v-model="form.body"
                ></textarea>
            </div>
            <div class="flex justify-between my-3">
                <div>
                    <input-error
                        :message="form.errors.body"
                        class="mt-2"
                        v-if="form.errors.body"
                    >
                    </input-error>
                </div>
                <blue-button
                    type="submite"
                    class="text-xs"
                    :class="{ 'opacity-25': form.processing }"
                    :disable="form.processing"
                >
                    <fingerprint-spinner
                        :animation-duration="1500"
                        :size="20"
                        color="white"
                        v-if="form.processing"
                    />
                    <span v-else>Post</span>
                </blue-button>
            </div>
        </form>
        <combined-post :posts="combinedPost.data"></combined-post>
    </pages-layout>
</template>

<script setup>
    import PagesLayout from "@/Layouts/PagesLayout.vue";
    import CombinedPost from "../Components/PostComment/CombinedPost.vue";
    import InputError from "../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Components/InputError.vue";
    import BlueButton from "../Components/Buttons/BlueButton.vue";
    import { FingerprintSpinner } from 'epic-spinners';
    </script>
    <script>
    export default {
        props: ["combinedPost"],
        data() {
            return{
                form: this.$inertia.form({
                    user_id: this.$page.props.user.id,
                    body: this.body
                })
            }
        },
        methods: {
            submit() {
                this.form.post(this.route('posts.store'), {
                    preserveScroll: true,
                    onSuccess: ()=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Tu post ha sido publicado con exito!',
                        }),
                        this.form.body = null
                    }
                })
            }
        }
    };
    </script>
