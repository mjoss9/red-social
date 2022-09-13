<template>
    <form>
        <DangerButton type="submit" class="text-xs">
            Ignore
            <icon name="users-minus" class="w-4 h-4 fill-current ml-1"></icon>
        </DangerButton>
    </form>
</template>
<script setup>
import DangerButton from '../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Components/DangerButton.vue';

</script>
<script>
export default {
    props: ['profile']
}
</script>