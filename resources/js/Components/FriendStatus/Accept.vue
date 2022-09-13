<template>
    <form @submit.prevent="acceptFriend">
        <green-button type="submit" class="text-xs">
            Accept
            <icon name="users-plus" class="w-4 h-4 fill-current ml-1"></icon>
        </green-button>
    </form>
</template>
<script setup>
import GreenButton from '../Buttons/GreenButton.vue'

</script>
<script>
export default {
    props: ['profile'],
    data() {
        return {
            acceptFriendFrom: this.$inertia.form({
                user: this.profile
            })
        }
    },
    methods: {
        acceptFriend() {
            this.acceptFriendFrom.patch(this.route('friends.update', this.profile.id), {
                preserveScroll: true,
                onSuccess: ()=>{},
            })
        }
    }
}
</script>