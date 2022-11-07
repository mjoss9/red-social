<script setup>
import GreenButton from '../../Components/Buttons/GreenButton.vue';
import { useForm, Head } from '@inertiajs/inertia-vue3';
import PagesLayout from "../../Layouts/PagesLayout.vue";

defineProps(['views']);

const form = useForm({
    titulo: '',
    universidad: '',
    añot: '',
    horas: '',
});
</script>
 
<template>
    <pages-layout title="View Profile">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('academictitles.store'), { onSuccess: () => form.reset() })">
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label>Titulo:</label>
                        <input  
                        v-model="form.titulo" name="titulo"
                        class="h-10 w-full bg-white text-center border " 
                        placeholder="titulo *"
                        required>
                    </div>
                    <div>
                        <label>Universidad:</label>
                        <input  
                        v-model="form.universidad" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="Universidad*"
                        required>
                    </div>
                    <div>
                        <label>Año:</label>
                        <input  
                        v-model="form.añot" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="año *"
                        required>
                    </div>
                    <div class="basis-1/4">
                        <label>Horas:</label>
                        <input  
                        v-model="form.horas" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="horas *"
                        required>
                    </div>
                    <div class="col-auto">
                        <GreenButton class="btn btn-primary">Enviar</GreenButton>
                    </div>                            
                </div>
            </form>
        </div>
    </pages-layout>
</template>