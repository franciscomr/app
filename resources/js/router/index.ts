import { createRouter, createWebHistory } from "vue-router";
import Background from '@/components/Background.vue';
import Dashboard from "@/pages/Dashboard.vue";
import Formdata from "@/pages/Formdata.vue";

const routes = [

  {
    path: "/app/",
    name: "index",
    component: Background
  },
  {
    path: "/app/home",
    name: "home",
    component: Dashboard
  },
  {
    path: "/app/form",
    name: "form",
    component: Formdata
  } 
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;