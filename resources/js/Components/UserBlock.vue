<template>
    <div class="sm:flex sm:flex-wrap">
            <Link
                :href="route('profiles.show', item.username)"
                class="sm:w-1/2"
                v-for="(item, index) in items"
                :key="index"
            >
                <div
                    class="flex items-center bg-gray-50 px-2 py-3 border-1 border-gray-500 mt-5 hover:bg-gray-400 hover:text-blue-800"
                >
                    <div class="flex flex-shrink-0">
                        <img
                            :src="item.profile_photo_url"
                            :alt="item.username"
                            class="h-8 w-8 rounded-full objetc-cover"
                        />
                    </div>
                    <div class="flex flex-grow overflow-hidden">
                        <span class="text-lg ml-3">
                            {{ item.username }}
                        </span>
                    </div>
                </div>
            </Link>
        </div>
</template>
<script setup>
    import { Link } from "@inertiajs/inertia-vue3";
    </script>
<script>
    export default {
      props: ['items']
    }
</script>