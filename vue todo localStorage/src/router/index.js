import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import about from '../views/AboutView.vue'
import new12121212 from '../views/new.vue'
import list from '../views/list.vue'
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/pending',
      name: 'home',
      component: HomeView
    },
    {
      path: '/done',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: about
    },
    {
      path: '/list',
      
      component: list
    },
    {
      path: '/new',
      
      component: new12121212
    }
  ]
})

export default router
