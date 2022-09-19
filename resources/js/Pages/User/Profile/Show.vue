<template>
    <pages-layout title="Dashboard">
        <template #title>
            <div class="flex justify-between items-center w-full">
                <h2
                    class="flex items-end font-semibold text-xl text-gray-800 leading-tight"
                >
                    <img
                        :src="profile.profile_photo_url"
                        :alt="profile.username"
                        class="h-8 w-8 rounded-full object-cover"
                    />
                    <span class="capitalize ml-3">
                        {{ `${profile.username}'s Profile` }}
                    </span>
                </h2>

                <status
                    :profile="profile"
                    :isFriendsWith="isFriendsWith"
                    :friendRequestSentTo="friendRequestSentTo"
                    :friendRequestRecivedFrom="friendRequestRecivedFrom"
                ></status>
            </div>
        </template>

        
        <post-form :method="submit" :form="form" :text="'Post'"></post-form>

        <infinite-scroll @loadMore="loadMorePosts">
            <combined-post :posts="allPosts.data" :pagination="pagination"></combined-post>
        </infinite-scroll>
    </pages-layout>
</template>
<script setup>
import Status from "../../../Components/FriendStatus/Status.vue";
import PostForm from "../../../Components/PostComment/PostForm.vue";
import CombinedPost from "../../../Components/PostComment/CombinedPost.vue";
import InfiniteScroll from "../../../Components/InfiniteScroll.vue";
</script>
<script>
import PagesLayout from "../../../Layouts/PagesLayout.vue";
export default {
    props: [
        "profile",
        "isFriendsWith",
        "friendRequestSentTo",
        "friendRequestRecivedFrom",
        "posts"
    ],
    components: {
        PagesLayout,
    },
    data() {
        return {
            form: this.$inertia.form({
                body: this.body,
                user_id: this.profile.id,
            }),
            allPosts: this.posts
        };
    },
    computed: {
        pagination(){
            return this.allPosts = this.posts
        }
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
        loadMorePosts(){
            if(!this.allPosts.next_page_url) {
                return
            }
            return axios.get(this.allPosts.next_page_url).then((resp) => {
                this.allPosts = {
                    ...resp.data,
                    data: [...this.allPosts.data, ...resp.data.data],
                };
            });
        }
    },
};
</script>
