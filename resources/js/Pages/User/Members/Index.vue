<template>
    <pages-layout title="Dashboard">
        <template #title>
            <div
                class="flex flex-col items-center sm:flex-row sm:justify-between"
            >
                <h2
                    class="flex items-end font-semibold text-xl text-gray-800 leading-tight"
                >
                    <Link
                        :href="route('members.index')"
                        class="capitalize underline"
                        >Members</Link
                    >
                </h2>
                <span
                    class="text-gray-800 leading-tight text-lg capitaliza mt-5 sm:mt-0"
                >
                    Visit your
                    <Link href="#" class="underline hover:text-green-500"
                        >Friends</Link
                    >
                </span>
            </div>
        </template>
        <infinite-scroll @loadMore="loadMoreMembers">
            <user-block :items="allMembers.data"></user-block>
        </infinite-scroll>
    </pages-layout>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>
<script>
import UserBlock from "../../../Components/UserBlock.vue";
import PagesLayout from "../../../Layouts/PagesLayout.vue";
import axios from "axios";
import InfiniteScroll from "../../../Components/InfiniteScroll.vue";
export default {
    props: ["members"],
    components: {
        PagesLayout,
        UserBlock,
    },
    data() {
        return {
            allMembers: this.members,
        };
    },
    methods: {
        loadMoreMembers() {
            if(!this.allMembers.next_page_url) {
                return
            }
            return axios.get(this.allMembers.next_page_url).then((resp) => {
                this.allMembers = {
                    ...resp.data,
                    data: [...this.allMembers.data, ...resp.data.data],
                };
            });
        },
    },
};
</script>
