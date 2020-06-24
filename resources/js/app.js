/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/** Moment JS */
import moment from "moment";

/** Progress Bar */
import VueProgressBar from "vue-progressbar";

Vue.use(VueProgressBar, {
    color: "rgb(143, 255, 199)",
    failedColor: "red",
    height: "2px"
});

/** Sweet Alert 2 */
import Swal from "sweetalert2";
window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: false,
    onOpen: toast => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    }
});
window.Toast = Toast;

/** V-Form */
import { Form, HasError, AlertError } from "vform";
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

/** Vue Router */
import VueRouter from "vue-router";
Vue.use(VueRouter);

/** Vue Routes */
const routes = [
    {
        path: "/",
        component: require("./components/Home.vue").default
    },
    {
        path: "/shop",
        component: require("./components/Shop.vue").default
    },
    {
        path: "/admin",
        component: require("./components/Admin.vue").default
    },
    {
        path: "/admin/users",
        component: require("./components/ManageUsers.vue").default
    },

    {
        path: "/contact",
        component: require("./components/Contact.vue").default
    },
    {
        path: "/about",
        component: require("./components/About.vue").default
    }
];

const router = new VueRouter({
    mode: "history",
    routes // short for `routes: routes`
});

/** Filters */
Vue.filter("roleFilter", function(value) {
    if (value) return "Administrator";
    else return "Standard User";
});
Vue.filter("prettyDate", function(value) {
    return moment(value).format("LLL");
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component("search-bar", require("./components/SearchBar.vue").default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    router
});
