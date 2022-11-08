<script setup>
import GreenButton from '../../Components/Buttons/GreenButton.vue';
import { useForm, Head } from '@inertiajs/inertia-vue3';
import PagesLayout from "../../Layouts/PagesLayout.vue";

defineProps(['views']);

const form = useForm({
    años: '',
    carrera: '',
    asignatura: '',
    desde: '',
    hasta: '',
});
</script>
 
<template>
    <pages-layout title="View Profile">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('teachingexperiences.store'), { onSuccess: () => form.reset() })">
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label>Años:</label>
                        <input  
                        v-model="form.años"
                        class="h-10 w-full bg-white text-center border " 
                        placeholder="años *"
                        required>
                    </div>
                    <div>
                        <label>Carrera:</label>
                        <input  
                        v-model="form.carrera" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="carrera*"
                        required>
                    </div>
                    <div>
                        <label>Asignatura:</label>
                        <input  
                        v-model="form.asignatura" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="asignatura *"
                        required>
                    </div>
                    <div>
                        <label>Desde:</label>
                        <input
                        type="date"
                        v-model="form.desde" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="desde *"
                        required>
                    </div>
                    <div>
                        <label>Hasta:</label>
                        <input 
                        type="date"
                        v-model="form.hasta" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="hasta *"
                        required>
                    </div>

                    <div>
                        <GreenButton class="btn btn-primary">Enviar</GreenButton>
                    </div>                            
                </div>
            </form>
        </div>
    </pages-layout>
</template>