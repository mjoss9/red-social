<template>
    <div class="flex mt-5 sm:mt-0">
        <template v-if="friendRequestRecivedFrom">
            <accept :profile="profile"></accept>
            <ignore :profile="profile" class="ml-2"></ignore>
        </template>
        <template v-else-if="friendRequestSentTo">
            <h3 class="font-semibold text-md text-gray-800 leading-tight">
                Pending
            </h3>
        </template>
        <template v-else-if="isFriendsWith">
            <form @submit.prevent="deleteFriend">
                <danger-button type="submit">
                    <fingerprint-spinner
                        :animation-duration="1500"
                        :size="20"
                        color="white"
                        v-if="loading"
                    />
                    <template v-else>
                        Unfriend
                        <icon
                            name="users-minus"
                            class="w-4 h-4 fill-current ml-1"
                        ></icon>
                    </template>
                </danger-button>
            </form>
        </template>
        <template v-else-if="$page.props.user.id != profile.id">
            <form @submit.prevent="addFriend">
                <blue-button type="submit" class="text-xs">
                    <fingerprint-spinner
                        :animation-duration="1500"
                        :size="20"
                        color="white"
                        v-if="loading"
                    />
                    <template v-else>
                        Add Friend
                        <icon
                            name="users-plus"
                            class="w-4 h-4 fill-current ml-1"
                        ></icon>
                    </template>
                </blue-button>
            </form>
        </template>
    </div>
</template>
<script setup>
import { FingerprintSpinner } from 'epic-spinners';
import BlueButton from "../Buttons/BlueButton.vue";
import Accept from "./Accept.vue";
import Ignore from "./Ignore.vue";
import DangerButton from "../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Components/DangerButton.vue";
</script>
<script>
export default {
    props: [
        "profile",
        "isFriendsWith",
        "friendRequestSentTo",
        "friendRequestRecivedFrom",
    ],
    data() {
        return {
            addFriendForm: this.$inertia.form({
                user: this.profile,
            }),
            deleteFriendForm: this.$inertia.form({
                user: this.profile,
            }),
            loading: false,
        };
    },
    methods: {
        addFriend() {
            this.loading = true
            this.addFriendForm.post(
                this.route("friends.store", this.profile.id),
                {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.loading = false
                    },
                }
            );
        },
        deleteFriend() {
            this.loading = true
            this.deleteFriendForm.delete(
                this.route("friends.destroy", this.profile.id),
                {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.loading = false
                    },
                }
            );
        },
    },
};
</script>
