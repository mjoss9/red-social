<script setup>
    import PagesLayout from "@/Layouts/PagesLayout.vue";
    const props = defineProps({
        profile: Object,
    });
    console.log(props.profile);
</script>

<template>
    <img
                        :src="profile.profile_photo_url"
                        :alt="profile.username"
                        class="h-8 w-8 rounded-full object-cover"
                    />
    <!-- <pages-layout title="Dashboard">
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
                    <span class="capitalize ml-3"> Dashboard </span>
                </h2>
            </div>
        </template>
    </pages-layout> -->
    hola
</template>
