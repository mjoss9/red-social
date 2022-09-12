<template>
    <app-layout>
        <div class="lg:px-10">
            <div>
                <slot name="title"></slot>
            </div>
            <div class="mt-5">
                <slot></slot>
            </div>
        </div>
    </app-layout>
</template>

<script setup>

import AppLayout from './AppLayout.vue';

</script>
<script>
export default {
    components: {
        AppLayout,
    }
}
</script>