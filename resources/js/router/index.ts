import { createRouter, createWebHistory } from "vue-router";
import auth from '@/router/middlewares/auth';
import Background from '@/components/Background.vue';
import HomeVue from "@/pages/Home.vue";
import Dashboard from "@/pages/Dashboard.vue";
import DataTable from "@/pages/DataTable.vue";
import DataForm from "@/pages/DataForm.vue";
import companies from "./catalog/companies/companies";
import branches from "./catalog/companies/branches";
import departments from "./catalog/companies/departments";


import login from "./auth/login";

const routes = [


  {
    path: "/app/home",
    name: "home",
    component: HomeVue,
    beforeEnter: auth,
    children: [
      ...companies,
      ...branches,
      ...departments
    ]
  },

  ...login
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;