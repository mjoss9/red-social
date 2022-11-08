<script setup>
import GreenButton from '../../Components/Buttons/GreenButton.vue';
import { useForm, Head } from '@inertiajs/inertia-vue3';
import PagesLayout from "../../Layouts/PagesLayout.vue";

defineProps(['academictitles']);

// const form = useForm({
//     titulo: '',
//     universidad: '',
//     añot: '',
//     horas: '',
// });

// const formDataPersonal = useForm({
//     nombre:'',
//     apellidop:'',
//     apellidom:'',
//     carnet:'',
//     correo:'',
//     mension:'',
//     direccion:'',
//     celular:'',
//     nacimientof:'',
//     nacimientol:'',
//     sexo:'',
//     telefono:'',
// });
// const formAcademicTitle = useForm({
//     titulo: '',
//     universidad: '',
//     añot: '',
//     horas: '',
// });
// const formCourseSeminar = useForm({
//     titulo: '',
//     universidad: '',
//     añot: '',
//     horas: '',
// });
// const formIntellectualProduction = useForm({
//     titulo: '',
//     universidad: '',
//     añoe: '',
//     paginas: '',
//     nregistro: '',
// });

</script>
 
<template>
    <pages-layout title="View Profile">
        <!-- Datos Personales -->
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 bg-gradient-to-r from-green-600">
            <img
                class="h-40 w-40 rounded-full object-cover ml-3"
                :src="$page.props.user.profile_photo_url"
                :alt="$page.props.user.name"
            />
        </div>
        <!-- Titulos Academicos -->
        <div class="text-xs sm:text-lg">
            <p>Titulos Academicos</p>
        </div>
        <table class="divide-y divide-gray-300 ">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-2">Titulo</th>
                    <th class="px-6 py-2">Universidad Institucion</th>
                    <th class="px-6 py-2">Año Titulo</th>
                    <th class="px-6 py-2">Horas</th>
                </tr>
            </thead>
            <tbody>
                <Academictitle
                    v-for="academictitle in academictitles"
                    :key="academictitle.id"
                    :academictitle="academictitle"
                />
            </tbody>    
        </table>

        <!-- Cursos y Seminarios -->
        <div class="text-xs sm:text-lg">
            <p>Cursos y Seminarios</p>
        </div>

        <!-- Produccion Intelectual -->
        <div class="text-xs sm:text-lg">
            <p>Produccion Intelectual</p>
        </div>
        <!-- Experiencia Docente -->
        <div class="text-xs sm:text-lg">
            <p>Experiencia Docente</p>
        </div>

    </pages-layout>
</template>