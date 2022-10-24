<template>
    <div class="flex items-start space-x-4">
        <div class="flex-shrink-0">
            <img
                class="inline-block h-10 w-10 rounded-full"
                :src="$page.props.user.profile_photo_url"
                :alt="$page.props.user.username"
            />
        </div>
        <div class="min-w-0 flex-1">
            <form
                @submit.prevent="method"
                v-on:keyup.enter="method"
                enctype="multipart/form-data"
            >
                <div
                    class="border border-gray-300 rounded-lg shadow-sm overflow-hidden focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500"
                >
                    <label class="sr-only">Ingresa tu comentario</label>
                    <textarea
                        name="post"
                        rows="3"
                        class="block w-full py-3 border-0 resize-none focus:ring-0 sm:text-sm"
                        :placeholder="`Post something ${$page.props.user.username} ...`"
                        v-model="form.body"
                    ></textarea>
                </div>
                <div class="pt-2 flex justify-between">
                    <div class="flex items-center space-x-5">
                        <div class="inline-flex items-center">
                            <label
                                type="button"
                                class="-m-2 w-10 h-10 mr-5 rounded-full inline-flex items-center justify-center text-gray-400 hover:text-gray-500"
                            >
                                <icon
                                    name="paper-clip"
                                    class="w-6 h-6 fill-current"
                                ></icon>
                                <input
                                    type="file"
                                    @input="form.photo = $event.target.files[0]"
                                    style="display: none"
                                    v-on:change="close = !close"
                                />
                            </label>
                        </div>
                        <div>
                            <InputError
                                :message="form.errors.body"
                                class="mt-2"
                                v-if="form.errors.body"
                            >
                            </InputError>
                        </div>
                        <div class="flex items-center"></div>
                    </div>
                    <div class="flex-shrink-0">
                        <blue-button
                            type="submite"
                            class="text-xs"
                            :class="{ 'opacity-25': form.processing }"
                            :disable="form.processing"
                            v-on:click="close = !close"
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
                </div>
                <div
                    class="alert bg-green-100 rounded-lg py-2 px-6 my-2 text-xs text-green-800 inline-flex items-center sm:w-3/4 w-full"
                    role="alert"
                    v-show="close"
                >
                    <p>Tu archivo fue cargado correctamente!</p>
                </div>
            </form>
        </div>
    </div>
</template>
<script setup>
import { FingerprintSpinner } from "epic-spinners";
import InputError from "../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Components/InputError.vue";
import BlueButton from "../Buttons/BlueButton.vue";
import Icon from "../Icon.vue";
</script>
<script>
export default {
    components: { Icon },
    props: ["method", "form", "text"],
    data() {
        return {
            close: false,
        };
    },
};
</script>
