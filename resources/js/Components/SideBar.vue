<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import JetDropdown from "@/Components/Dropdown.vue";
import JetDropdownLink from "@/Components/DropdownLink.vue";
import { Inertia } from "@inertiajs/inertia";
import Notifications from "../Components/Notifications.vue";
import JetResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
// import Icon from './Icon.vue';
const showingNavigationDropdown = ref(false);
const logout = () => {
    Inertia.post(route("logout"));
};
</script>
<script>
export default {
    data() {
        return {
            unreadNotifications: this.$page.props.auth.unreadNotifications,
            readNotifications: this.$page.props.auth.readNotifications,
            notifications: this.$page.props.auth.notifications,
        };
    },
    computed: {
        sideBarLinks() {
            return [
                {
                    name: "Editar perfil",
                    route: route("profile.show"),
                    icon: "user-edit",
                },
                {
                    name: "Friends",
                    route: route("friends.index"),
                    icon: "user-friends",
                },
                {
                    name: "Members",
                    route: route("members.index"),
                    icon: "users",
                },
                {
                    name: "Chat Rooms",
                    route: route("chat-rooms.index"),
                    icon: "comments",
                },
            ];
        },
    },
};
</script>
<template> 
    <aside class="sm:h-screen bg-white shadow py-2 w-full sm:w-1/3 lg:w-1/4 fixed sm:top-20 sm:sticky">
        <div class="mx-6 sm:mx-0">
            <div class="max-w-7xl sm:px-6">
                <div class="flex justify-between">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <Link
                            :href="route('dashboard.index')"
                            class="h-3/8 w-12"
                        >
                            <img
                                :src="'/storage/images/logoCarrera.png'"
                                alt="logo"
                                class="rounded-full"
                            />
                        </Link>
                    </div>
                    <div
                        class="hidden sm:flex sm:items-center sm:justify-end sm:ml-6 w-1/2"
                    >
                        <!-- Settings Dropdown -->
                        <div class="flex items-center ml-3 relative">
                            <JetDropdown align="left" width="48">
                                <template #trigger>
                                    <button
                                        v-if="
                                            $page.props.jetstream
                                                .managesProfilePhotos
                                        "
                                        class="flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-transparent transition duration-150 ease-in-out"
                                    >
                                        <img
                                            class="h-8 w-8 rounded-full object-cover ml-3"
                                            :src="
                                                $page.props.user
                                                    .profile_photo_url
                                            "
                                            :alt="$page.props.user.name"
                                        />
                                    </button>
                                    <button
                                        type="button"
                                        class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-transparent transition duration-150 ease-in-out"
                                        v-else
                                    >
                                        <div>
                                            {{ $page.props.user.username }}
                                        </div>
                                        <svg
                                            class="ml-2 -mr-0.5 h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                </template>
                                <template #content>
                                    <!-- Account Management -->
                                    <JetDropdownLink :href="route('profiles.show',this.$page.props.user.username)">
                                        <div class="flex">
                                            <img
                                                :src="this.$page.props.user.profile_photo_url"
                                                :alt="this.$page.props.user.username"
                                                class="h-8 w-8 rounded-full object-cover"
                                            />
                                            <span class="ml-2">{{ this.$page.props.user.name }}</span>
                                        </div>
                                    </JetDropdownLink>
                                    <div class="border-t border-gray-100"></div>
                                    <JetDropdownLink
                                        :href="route('profile.show')"
                                    >
                                        Perfil
                                    </JetDropdownLink>
                                    <!-- Authentication -->
                                    <form @submit.prevent="logout">
                                        <JetDropdownLink as="button">
                                            Log Out
                                        </JetDropdownLink>
                                    </form>
                                </template>
                            </JetDropdown>
                            <JetDropdown align="left" width="96">
                                <template #trigger>
                                    <button class="mt-1 focus:outline-none">
                                        <div class="flex ml-2 relative">
                                            <icon
                                                name="bell"
                                                class="w-6 h-6"
                                            ></icon>
                                            <template
                                                v-if="
                                                    unreadNotifications.length >
                                                    0
                                                "
                                            >
                                                <span
                                                    class="text-white text-xs bg-red-600 rounded-full px-2 py-1 absolute bottom-2 left-3"
                                                >
                                                    {{
                                                        unreadNotifications.length
                                                    }}
                                                </span>
                                            </template>
                                        </div>
                                    </button>
                                </template>
                                <template
                                    #content
                                    v-if="notifications.length > 0"
                                >
                                    <Link
                                        :href="route('notifications.update')"
                                        class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-300 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                    >
                                        Mark all as read
                                    </Link>
                                    <div class="border-t border-gray-100"></div>

                                    <notifications
                                        :unreads="unreadNotifications"
                                        :reads="readNotifications"
                                    ></notifications>
                                </template>

                                <template #content v-else>
                                    <div
                                        class="block text-center px-4 py-2 text-xs text-gray-400"
                                    >
                                        No tienes notificaciones
                                    </div>
                                </template>
                            </JetDropdown>
                        </div>
                    </div>
                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition"
                            @click="
                                showingNavigationDropdown =
                                    !showingNavigationDropdown
                            "
                        >
                            <svg
                                class="h-6 w-6"
                                stroke="currentColor"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    :class="{
                                        hidden: showingNavigationDropdown,
                                        'inline-flex':
                                            !showingNavigationDropdown,
                                    }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                                <path
                                    :class="{
                                        hidden: !showingNavigationDropdown,
                                        'inline-flex':
                                            showingNavigationDropdown,
                                    }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- Responsive Navigation Menu -->
                <div
                    :class="{
                        block: showingNavigationDropdown,
                        hidden: !showingNavigationDropdown,
                    }"
                    class="sm:hidden"
                >
                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200  ">
                        <div class="flex items-center px-4">
                            <div
                                v-if="
                                    $page.props.jetstream.managesProfilePhotos
                                "
                                class="shrink-0 mr-3"
                            >
                                <img
                                    class="h-10 w-10 rounded-full object-cover"
                                    :src="$page.props.user.profile_photo_url"
                                    :alt="$page.props.user.name"
                                />
                            </div>

                            <div>
                                <div
                                    class="font-medium text-base text-gray-800"
                                >
                                    {{ $page.props.user.name }}
                                </div>
                                <div class="font-medium text-sm text-gray-500">
                                    {{ $page.props.user.email }}
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <JetResponsiveNavLink
                                :href="route('profile.show')"
                                :active="route().current('profile.show')"
                            >
                                Perfil
                            </JetResponsiveNavLink>

                            <!-- Authentication -->
                            <form method="POST" @submit.prevent="logout">
                                <JetResponsiveNavLink as="button">
                                    Log Out
                                </JetResponsiveNavLink>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- OPCIONES -->
        <div :class="{
                        block: showingNavigationDropdown,
                        hidden: !showingNavigationDropdown,
                    }"
            class="sm:block">
            <Link
                :href="link.route"
                v-for="link in sideBarLinks"
                :key="link.name"
                class="flex items-end pl-6 py-2"
                :class="
                    route().current(link.route)
                        ? 'text-white bg-gray-800 hover:bg-gray-500'
                        : 'text-gray-800 hover:bg-gray-500 hover:text-blue-500'
                "
            >
                <img
                    :src="link.image"
                    :alt="link.alt"
                    class="h-8 w-8 rounded-full object-cover"
                    v-if="link.image"
                />
                <icon
                    :name="link.icon"
                    class="fill-current w-8 h-8"
                    v-if="link.icon"
                ></icon>
                <span class="ml-2">{{ link.name }}</span>
            </Link>
        </div>
    </aside>
</template>
