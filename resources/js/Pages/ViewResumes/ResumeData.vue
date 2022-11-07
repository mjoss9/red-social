<script setup>
// import BlueButton from '../../Components/Buttons/BlueButton.vue;
import GreenButton from '../../Components/Buttons/GreenButton.vue';
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
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 bg-gradient-to-r from-green-600">
            <img
                class="h-40 w-40 rounded-full object-cover ml-3"
                :src="$page.props.user.profile_photo_url"
                :alt="$page.props.user.name"
            />
        </div>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('resumedatas.store'), { onSuccess: () => form.reset() })">
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label>Nombre:</label>
                        <input  
                        v-model="form.nombre" name="titulo"
                        class="h-10 w-full bg-white text-center border " 
                        placeholder="nombre *"
                        required>
                    </div>
                    <div>
                        <label>Apellido Paterno:</label>
                        <input  
                        v-model="form.apellidop" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="apellido paterno *"
                        required>
                    </div>
                    <div>
                        <label>Apellido Materno:</label>
                        <input  
                        v-model="form.apellidom" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="apellido materno *"
                        required>
                    </div>
                    <div class="basis-1/4">
                        <label>Carnet:</label>
                        <input  
                        v-model="form.carnet" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="carnet *"
                        required>
                    </div>
                    <div class="col-sm-3">
                        <label>Correo:</label>
                        <input 
                        type="email"
                        v-model="form.correo" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="correo *"
                        required>
                    </div>
                    <div class="col-sm-3">
                        <label for="">Fecha de nacimiento</label>
                        <input 
                        type="date"
                        v-model="form.nacimientof" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="fecha de nacimiento *"
                        required>
                    </div>
                    <div class="col-sm-3">
                        <label>Lugar de Nacimiento:</label>
                        <input
                        v-model="form.nacimientol" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="lugar de nacimiento *"
                        required>
                    </div>
                    <div class="col-sm-3">
                        <label>Direccion:</label>
                        <input  
                        v-model="form.direccion" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="direccion *"
                        required>
                    </div>
                    <div class="col-sm-3">
                        <label>Mension:</label>
                        <input  
                        v-model="form.mension" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="mension *"
                        required>
                    </div>
                    <div class="col-sm-3">
                        <label>Celular:</label>
                        <input  
                        v-model="form.celular" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="celular *"
                        required>
                    </div>
                    <div class="col-sm-3">
                        <label>Telefono:</label>
                        <input  
                        v-model="form.telefono" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="telefono *"
                        required>
                    </div>
                    <div class="col-sm-3">
                        <label>Sexo:</label>
                        <input  
                        v-model="form.sexo" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="sexo *"
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