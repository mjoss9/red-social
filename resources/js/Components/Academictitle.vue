<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
defineProps(['academictitle']);
</script>
<template>
    <tr class="text-center">
        <td class="px-6 py-4">{{academictitle.id}}</td>
        <td class="px-6 py-4">{{academictitle.titulo}}</td>
        <td class="px-6 py-4">{{academictitle.universidad}}</td>
        <td class="px-6 py-4">{{academictitle.añot}}</td>
        <td class="px-6 py-4">{{academictitle.horas}}</td>
    </tr>

</template>