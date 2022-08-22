import { createRouter, createWebHistory } from 'vue-router'
import pending from '../views/pending.vue'
import Done from '../views/done.vue'
import new12121212 from '../views/new.vue'
import list from '../views/list.vue'
import search from '../views/search.vue'
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/pending',
      name: 'pending',
      component: pending
    },
    {
      path: '/done',
      name: 'Done',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: Done
    },
    {
      path: '/list',
      
      component: list
    },
    {
      path: '/new',
      
      component: new12121212
    },
    {
      path: '/search',
      
      component: search
    }
  ]
})

export default router
