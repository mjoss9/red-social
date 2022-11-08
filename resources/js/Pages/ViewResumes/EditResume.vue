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

const formDataPersonal = useForm({
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
const formAcademicTitle = useForm({
    titulo: '',
    universidad: '',
    añot: '',
    horas: '',
});
const formCourseSeminar = useForm({
    titulo: '',
    universidad: '',
    añot: '',
    horas: '',
});
const formIntellectualProduction = useForm({
    titulo: '',
    universidad: '',
    añoe: '',
    paginas: '',
    nregistro: '',
});

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
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="formDataPersonal.post(route('resumedatas.store'), { onSuccess: () => form.reset() })">
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label>Nombre:</label>
                        <input  
                        v-model="formDataPersonal.nombre" name="titulo"
                        class="h-10 w-full bg-white text-center border " 
                        placeholder="nombre *"
                        required>
                    </div>
                    <div>
                        <label>Apellido Paterno:</label>
                        <input  
                        v-model="formDataPersonal.apellidop" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="apellido paterno *"
                        required>
                    </div>
                    <div>
                        <label>Apellido Materno:</label>
                        <input  
                        v-model="formDataPersonal.apellidom" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="apellido materno *"
                        required>
                    </div>
                    <div class="basis-1/4">
                        <label>Carnet:</label>
                        <input  
                        v-model="formDataPersonal.carnet" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="carnet *"
                        required>
                    </div>
                    <div class="col-sm-3">
                        <label>Correo:</label>
                        <input 
                        type="email"
                        v-model="formDataPersonal.correo" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="correo *"
                        required>
                    </div>
                    <div class="col-sm-3">
                        <label for="">Fecha de nacimiento</label>
                        <input 
                        type="date"
                        v-model="formDataPersonal.nacimientof" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="fecha de nacimiento *"
                        required>
                    </div>
                    <div class="col-sm-3">
                        <label>Lugar de Nacimiento:</label>
                        <input
                        v-model="formDataPersonal.nacimientol" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="lugar de nacimiento *"
                        required>
                    </div>
                    <div class="col-sm-3">
                        <label>Direccion:</label>
                        <input  
                        v-model="formDataPersonal.direccion" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="direccion *"
                        required>
                    </div>
                    <div class="col-sm-3">
                        <label>Mension:</label>
                        <input  
                        v-model="formDataPersonal.mension" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="mension *"
                        required>
                    </div>
                    <div class="col-sm-3">
                        <label>Celular:</label>
                        <input  
                        v-model="formDataPersonal.celular" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="celular *"
                        required>
                    </div>
                    <div class="col-sm-3">
                        <label>Telefono:</label>
                        <input  
                        v-model="formDataPersonal.telefono" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="telefono *"
                        required>
                    </div>
                    <div class="col-sm-3">
                        <label>Sexo:</label>
                        <input  
                        v-model="formDataPersonal.sexo" 
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
        <!-- Titulos Academicos -->
        <div class="text-xs sm:text-lg">
            <p>Titulos Academicos</p>
        </div>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="formAcademicTitle.post(route('academictitles.store'), { onSuccess: () => form.reset() })">
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label>Titulo:</label>
                        <input  
                        v-model="formAcademicTitle.titulo" name="titulo"
                        class="h-10 w-full bg-white text-center border " 
                        placeholder="titulo *"
                        required>
                    </div>
                    <div>
                        <label>Universidad:</label>
                        <input  
                        v-model="formAcademicTitle.universidad" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="Universidad*"
                        required>
                    </div>
                    <div>
                        <label>Año:</label>
                        <input  
                        v-model="formAcademicTitle.añot" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="año *"
                        required>
                    </div>
                    <div class="basis-1/4">
                        <label>Horas:</label>
                        <input  
                        v-model="formAcademicTitle.horas" 
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
        <!-- Cursos y Seminarios -->
        <div class="text-xs sm:text-lg">
            <p>Cursos y Seminarios</p>
        </div>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="formCourseSeminar.post(route('seminarcourses.store'), { onSuccess: () => formCourseSeminar.reset() })">
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label>Titulo:</label>
                        <input  
                        v-model="formCourseSeminar.titulo" name="titulo"
                        class="h-10 w-full bg-white text-center border " 
                        placeholder="titulo *"
                        required>
                    </div>
                    <div>
                        <label>Universidad:</label>
                        <input  
                        v-model="formCourseSeminar.universidad" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="Universidad*"
                        required>
                    </div>
                    <div>
                        <label>Año:</label>
                        <input  
                        v-model="formCourseSeminar.añot" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="año *"
                        required>
                    </div>
                    <div class="basis-1/4">
                        <label>Horas:</label>
                        <input  
                        v-model="formCourseSeminar.horas" 
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
        <!-- Produccion Intelectual -->
        <div class="text-xs sm:text-lg">
            <p>Produccion Intelectual</p>
        </div>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="formIntellectualProduction.post(route('intellectualproductions.store'), { onSuccess: () => form.reset() })">
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label>Titulo:</label>
                        <input  
                        v-model="formIntellectualProduction.titulo" name="titulo"
                        class="h-10 w-full bg-white text-center border " 
                        placeholder="titulo *"
                        required>
                    </div>
                    <div>
                        <label>Universidad:</label>
                        <input  
                        v-model="formIntellectualProduction.universidad" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="Universidad*"
                        required>
                    </div>
                    <div>
                        <label>Año de Edicion:</label>
                        <input  
                        v-model="formIntellectualProduction.añoe" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="año de edicion *"
                        required>
                    </div>
                    <div>
                        <label>Paginas:</label>
                        <input  
                        v-model="formIntellectualProduction.paginas" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="paginas *"
                        required>
                    </div>
                    <div>
                        <label>N° de Registro:</label>
                        <input  
                        v-model="formIntellectualProduction.nregistro" 
                        class="h-10 w-full bg-white text-center" 
                        placeholder="n° de registro *"
                        required>
                    </div>

                    <div class="col-auto">
                        <GreenButton class="btn btn-primary">Enviar</GreenButton>
                    </div>                            
                </div>
            </form>
        </div>
        <!-- Experiencia Docente -->
        <div class="text-xs sm:text-lg">
            <p>Experiencia Docente</p>
        </div>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('seminarcourses.store'), { onSuccess: () => form.reset() })">
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