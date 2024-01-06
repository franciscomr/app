import { createRouter, createWebHistory } from "vue-router";
import auth from '@/router/middlewares/auth';
import Background from '@/components/Background.vue';
import HomeVue from "@/pages/Home.vue";
import Dashboard from "@/pages/Dashboard.vue";
import Formdata from "@/pages/Formdata.vue";
import companies from "./catalog/companies/companies";
import branches from "./catalog/companies/branches";


import login from "./auth/login";

const routes = [


  {
    path: "/app",
    name: "home",
    component: HomeVue,
    beforeEnter: auth,
    children: [
      ...companies,
      ...branches
    ]
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