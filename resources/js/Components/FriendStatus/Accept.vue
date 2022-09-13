<template>
    <form @submit.prevent="acceptFriend">
        <green-button type="submit" class="text-xs">
            <fingerprint-spinner
                :animation-duration="1500"
                :size="20"
                color="white"
                v-if="loading"
            />
            <template v-else>
                Accept
                <icon
                    name="users-plus"
                    class="w-4 h-4 fill-current ml-1"
                ></icon>
            </template>
        </green-button>
    </form>
</template>
<script setup>
import GreenButton from "../Buttons/GreenButton.vue";
import { FingerprintSpinner } from 'epic-spinners';
</script>
<script>
export default {
    props: ["profile"],
    data() {
        return {
            acceptFriendFrom: this.$inertia.form({
                user: this.profile,
            }),
            loading: false,
        };
    },
    methods: {
        acceptFriend() {
            this.loading = true
            this.acceptFriendFrom.patch(
                this.route("friends.update", this.profile.id),
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
