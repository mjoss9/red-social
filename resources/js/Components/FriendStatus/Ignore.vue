<template>
    <form @submit.prevent="ignoreRequest">
        <DangerButton type="submit" class="text-xs">
            <fingerprint-spinner
                :animation-duration="1500"
                :size="20"
                color="white"
                v-if="loading"
            />
            <template v-else>
                Ignore
                <icon
                    name="users-minus"
                    class="w-4 h-4 fill-current ml-1"
                ></icon>
            </template>
        </DangerButton>
    </form>
</template>
<script setup>
import DangerButton from "../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Components/DangerButton.vue";
import { FingerprintSpinner } from "epic-spinners";
</script>
<script>
export default {
    props: ["profile"],
    data() {
        return {
            loading: false,
        };
    },
    methods: {
        ignoreRequest() {
            this.loading = true;
            this.$inertia.get(this.route("friends.deny", this.profile.id), {
                onSuccess: () => {
                    Toast.fire({
                        icon: "success",
                        title: "Friend request succesfully ignore!",
                    });
                    this.loading = false;
                },
            });
        },
    },
};
</script>
