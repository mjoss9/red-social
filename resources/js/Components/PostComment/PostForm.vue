<template>
    <form @submit.prevent="method" class="w-full">
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
                <InputError
                    :message="form.errors.body"
                    class="mt-2"
                    v-if="form.errors.body"
                >
                </InputError>
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
                <span v-else>{{ text }}</span>
            </blue-button>
        </div>
    </form>
</template>
<script setup>
import { FingerprintSpinner } from "epic-spinners";
import InputError from "../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Components/InputError.vue";
import BlueButton from "../Buttons/BlueButton.vue";
</script>
<script>
export default {
    props: ["method", "form", "text"],
};
</script>
