import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
      props: true,
    },
    {
      path: '/board/:id/edit',
      name: 'BoardEdit',
      component: () => import("../views/BoardEdit.vue"),
      props: true,
    },
    {
      path: '/task/:id/create',
      name: 'TaskCreate',
      component: () => import("../views/CreateTask.vue"),
      props: true,
    },
    {
      path: '/task/:id/edit',
      name: 'TaskEdit',
      component: () => import("../views/TaskEdit.vue"),
      props: true,
    }
  ]
})

export default router
