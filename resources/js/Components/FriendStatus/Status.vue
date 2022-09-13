<template>
    <div class="flex mt-5 sm:mt-0">
        <template v-if="friendRequestRecivedFrom">
            <accept :profile="profile"></accept>
            <ignore :profile="profile" class="ml-2"></ignore>
        </template>
        <template v-else-if="friendRequestSentTo">
            <h3 class="font-semibold text-md text-gray-800 leading-tight">Pending</h3>
        </template>
        <template v-else-if="isFriendsWith">
            <form @submit.prevent="deleteFriend">
                <danger-button type="submit">
                    Unfriend
                    <icon name="users-minus" class="w-4 h-4 fill-current ml-1"></icon>
                </danger-button>
            </form>
        </template>
        <template v-else-if="$page.props.user.id != profile.id">
            <form @submit.prevent="addFriend">
                <blue-button
                    type="submit"
                    class="text-xs inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-600 transition ease-in-out duration-150"
                >
                    Add Friend
                    <icon
                        name="users-plus"
                        class="w-4 h-4 fill-current ml-1"
                    ></icon>
                </blue-button>
            </form>
        </template>
    </div>
</template>
<script setup>
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
        };
    },
    methods: {
        addFriend() {
            this.addFriendForm.post(
                this.route("friends.store", this.profile.id),
                {
                    preserveScroll: true,
                    onSuccess: () => {},
                }
            );
        },
        deleteFriend() {
            this.deleteFriendForm.delete(
                this.route("friends.destroy", this.profile.id),
                {
                    preserveScroll: true,
                    onSuccess: () => {},
                }
            );
        },
    },
};
</script>
