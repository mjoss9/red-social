<script>
export default {
  components: { Notifications },
    data() {
        return {
            unreadNotifications: this.$page.props.auth.unreadNotifications,
            readNotifications: this.$page.props.auth.readNotifications,
            notifications: this.$page.props.auth.notifications,
        }
    },
    mounted() { 
        this.listen()
    },
    methods: {
        listen() {
            window.Echo.private(`App.Models.User.${this.$page.props.user.id}`)
                .notification((notification)=> {
                    let newUnreadNotifications = {
                        data: {
                            info: {
                                avatar: notification.info.avatar,
                                message: notification.info.message,
                                link: notification.info.link,
                                sent: notification.info.sent,
                            }
                        },
                        id: notification.id
                    }
                    this.unreadNotifications.push(newUnreadNotifications)
                    this.notifications.push(newUnreadNotifications)
                })
        }
    }
}
</script>
<script setup>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Head, Link } from "@inertiajs/inertia-vue3";
import JetDropdown from "@/Components/Dropdown.vue";
import JetDropdownLink from "@/Components/DropdownLink.vue";
import JetNavLink from "@/Components/NavLink.vue";
import JetResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import SideBar from "@/Components/SideBar.vue";
import Notifications from '../Components/Notifications.vue';
import Echo from "laravel-echo";

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const logout = () => {
    Inertia.post(route("logout"));
};
</script>
<style>
    body.swal2-toast-shown .swal2-container.swal2-top-end, body.swal2-toast-shown .swal2-container.swal2-top-right {
        top: 60px;
    }
</style>

<template>
    <div>
        <Head :title="title"></Head>

        <div class="flex flex-col min-h-screen">
            <nav class="bg-white border-b border-gray-100 w-full fixed z-20">
                <div class="mx-5 sm:mx-10 py-2 flex content-center justify-between">
                    <img
                        :src="'/storage/images/logoUMSA.png'"
                        alt="logoUMSA"
                        class="h-10 sm:h-16 object-cover"
                    />
                    <div class="text-center text-xs sm:text-lg">
                        <h1>UNIVERSIDAD MAYOR DE SAN ANDRES</h1>
                        <p>Carrera Ingenieria Electronica</p>
                    </div>
                    <img
                        :src="'/storage/images/logoCarrera.png'"
                        alt="logoCarrera"
                        class="h-10 sm:h-16 object-cover"
                    />
                </div>
                
            </nav>

            <div class="flex flex-wrap pt-14 sm:pt-20 sm:flex-nowrap">
                <!-- Page Sidebar -->
                <side-bar></side-bar>
                <!-- Page Content -->
                <main class="shadow rounded my-20 py-6 px-4 w-full sm:w-2/3 sm:mx-2 sm:my-3 md:mx-4 md:px-10 lg:mx-auto">
                    <slot></slot>
                </main>
            </div>
        </div>
    </div>
</template>
