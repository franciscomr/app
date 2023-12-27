import { createRouter, createWebHistory } from "vue-router";
import auth from '@/router/middlewares/auth';
import Background from '@/components/Background.vue';
import HomeVue from "@/pages/Home.vue";
import Dashboard from "@/pages/Dashboard.vue";
import Formdata from "@/pages/Formdata.vue";


import login from "./auth/login";

const routes = [

  {
    path: "/app/",
    name: "index",
    component: Background
  },
  {
    path: "/app/home",
    name: "home",
    component: HomeVue,
    beforeEnter: auth,
  },
  {
    path: "/app/form",
    name: "form",
    component: Formdata
  },
  ...login
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;