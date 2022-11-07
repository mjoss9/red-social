<script setup>
// import PrimaryButton from '../../@Components/Buttons/BlueButton.vue;
import { useForm, Head } from '@inertiajs/inertia-vue3';
import PagesLayout from "../../Layouts/PagesLayout.vue";

const form = useForm({
    nombre:'',
    apellidop:'',
    apellidom:'',
    carnet:'',
    correo:'',
    mension:'',
    direccion:'',
    celular:'',
    nacimientof:'',
    nacimientol:'',
    sexo:'',
    telefono:'',
});
</script>
 
<template>
    <pages-layout title="View Profile">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('resumedatas.store'), { onSuccess: () => form.reset() })">
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <input  
                        v-model="form.nombre" name="titulo"
                        class="w-full bg-green-200 text-center border focus:border-blue-400" 
                        placeholder="nombre">
                    </div>
                    <div>
                        <input  
                        v-model="form.apellidop" 
                        class="block w-full bg-green-200 text-center" 
                        placeholder="apellido paternno">
                    </div>
                    <div>
                        <input  
                        v-model="form.apellidom" 
                        class="block w-full bg-green-200 text-center" 
                        placeholder="apellido materno">
                    </div>
                    <div class="basis-1/4">
                        <input  
                        v-model="form.carnet" 
                        class="block w-full bg-green-200 text-center" 
                        placeholder="carnet">
                    </div>
                    <div class="col-sm-3">
                        <input  
                        v-model="form.correo" 
                        class="block w-full bg-green-200 text-center" 
                        placeholder="correo">
                    </div>
                    <div class="col-sm-3">
                        <input  
                        v-model="form.mension" 
                        class="block w-full bg-green-200 text-center" 
                        placeholder="mension">
                    </div>
                    <div class="col-sm-3">
                        <input  
                        v-model="form.direccion" 
                        class="block w-full bg-green-200 text-center" 
                        placeholder="direccion">
                    </div>
                    <div class="col-sm-3">
                        <input  
                        v-model="form.celular" 
                        class="block w-full bg-green-200 text-center" 
                        placeholder="celular">
                    </div>
                    <div class="col-sm-3">
                        <input  
                        v-model="form.nacimientof" 
                        class="block w-full bg-green-200 text-center" 
                        placeholder="fecha de nacimiento">
                    </div>
                    <div class="col-sm-3">
                        <input  
                        v-model="form.nacimientol" 
                        class="block w-full bg-green-200 text-center" 
                        placeholder="lugar de nacimiento">
                    </div>
                    <div class="col-sm-3">
                        <input  
                        v-model="form.sexo" 
                        class="block w-full bg-green-200 text-center" 
                        placeholder="sexo">
                    </div>
                    <div class="col-sm-3">
                        <input  
                        v-model="form.telefono" 
                        class="block w-full bg-green-200 text-center" 
                        placeholder="telefono">
                    </div>
                    <div class="col-auto">
                        <PrimaryButton class="btn btn-primary">Enviar</PrimaryButton>
                    </div>                            
                </div>
            </form>

        </div>
    </pages-layout>
</template>