<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import HourInterval from "@/Components/HourInterval.vue";
import JetResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Inertia } from "@inertiajs/inertia";
import Icons from "@/Components/generals/Icons.vue";

const props = defineProps({
    canResetPassword: Boolean,
    status: String,
});
const logout = () => {
    Inertia.post(route("logout"));
};
</script>

<template>
    <header>
        <div class="header_wrap">
            <div class="header_inner mcontainer">
                <div class="left_side">
                    <span
                        class="slide_menu md:hidden"
                        uk-toggle="target: #wrapper ; cls: is-collapse is-active"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            width="24"
                            height="24"
                        >
                            <path
                                d="M3 4h18v2H3V4zm0 7h12v2H3v-2zm0 7h18v2H3v-2z"
                                fill="currentColor"
                            ></path>
                        </svg>
                    </span>

                    <div id="logo">
                        <Link :href="route('dashboard')">
                            <img src="/images/logo.png" alt="" />
                            <img
                                src="/images/logo.png"
                                class="logo_mobile"
                                alt=""
                            />
                        </Link>
                    </div>
                </div>

                <div class="right_side">
                    <div class="header_widgets">
                        <a class=""> {{ dateCustom() }} </a>
                        <a class="mx-1">
                            <strong><HourInterval></HourInterval> </strong
                        >
                       
                    
                    </a>
                    

                        <!-- Message -->
                        <!-- <a href="#" class="is_icon" uk-tooltip="title: Message">
                            <svg
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            <span>4</span>
                        </a>
                        <div
                            uk-drop="mode: click"
                            class="header_dropdown is_message"
                        >
                            <div class="dropdown_scrollbar" data-simplebar>
                                <div class="drop_headline">
                                    <h4>Messages</h4>
                                    <div class="btn_action">
                                        <a
                                            href="#"
                                            data-tippy-placement="left"
                                            title="Notifications"
                                        >
                                            <ion-icon
                                                name="settings-outline"
                                                uk-tooltip="title: Message settings ; pos: left"
                                            ></ion-icon>
                                        </a>
                                        <a
                                            href="#"
                                            data-tippy-placement="left"
                                            title="Mark as read all"
                                        >
                                            <ion-icon
                                                name="checkbox-outline"
                                            ></ion-icon>
                                        </a>
                                    </div>
                                </div>
                                <input
                                    type="text"
                                    class="uk-input"
                                    placeholder="Search in Messages"
                                />
                                <ul>
                                    <li class="un-read">
                                        <a href="#">
                                            <div class="drop_avatar">
                                                <img
                                                    src="/images/usericon"
                                                    alt=""
                                                />
                                            </div>
                                            <div class="drop_text">
                                                <strong>
                                                    Stella Johnson
                                                </strong>
                                                <time>12:43 PM</time>
                                                <p>
                                                    Alex will explain you how
                                                    ...
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#" class="see-all"> See all in Messages</a>
                        </div> -->

                        <a href="#">
                            <img
                                src="/images/usericon.png"
                                class="is_avatar"
                                alt=""
                            />
                        </a>
                        <div
                            uk-drop="mode: click;offset:5"
                            class="header_dropdown profile_dropdown"
                        >
                            <a class="user">
                                <div class="user_avatar">
                                    <img
                                        src="/images/usericon.png"
                                        alt=""
                                    />
                                </div>
                                <div class="user_name">
                                    <div>{{ $page.props.user?.name }}</div>
                                    <span> {{ $page.props.user?.email }}</span>
                                </div>
                            </a>
                            <hr />
                            <Link
                                v-if="$page.props.user?.role == 2"
                                :href="route('admin')"
                                class="is-link"
                            >
                                <Icons type="page"></Icons>
                                <span>Administrar páginas</span>
                            </Link>
                            <hr v-if="$page.props.user?.role == 2" />
                            <Link :href="route('profile')">
                                <svg
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                                Mi cuenta
                            </Link>
                            <Link :href="route('profile.pass')">
                                <Icons type="key"/>
                                Cambiar contraseña
                            </Link>

                            <a @click="logout" class="cursor-pointer">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                    ></path>
                                    
                                </svg>
                                Salir
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>
