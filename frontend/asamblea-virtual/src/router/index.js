import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Persona from '../views/Persona.vue'
import App from '../App.vue'

Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  base: import.meta.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },

    {
      path: '/persona',
      name: 'persona',
      component: Persona
    },

  ]
})

export default router
