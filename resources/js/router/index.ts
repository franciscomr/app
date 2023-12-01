import { createRouter, createWebHistory } from "vue-router";
import Background from '@/components/Background.vue';
import Test from "@/components/Test.vue";


const routes = [

  {
    path: "/app/",
    name: "index",
    component: Background
  },
  {
    path: "/app/test",
    name: "test",
    component: Test
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;