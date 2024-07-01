import { createRouter, createWebHistory } from 'vue-router';
import AuthenticatedLayout from './layouts/AuthenticatedLayout.vue';

const routes = [
  {
    path: '/',
    component: AuthenticatedLayout,
    children: [
      {
        path: '/',
        name: 'Posts',
        component: () => import('@/components/Posts.vue')
      },
      {
        path: 'signup',
        name: 'SignUp',
        component: () => import('@/components/SignUp.vue')
      },
      {
        path: 'create',
        name: 'CreatePost',
        component: () => import('@/components/CreateAPost.vue')
      },
      {
        path: 'login',
        name: 'Login',
        component: () => import('@/components/Login.vue')
      },
      {
        path: '/:catchAll(.*)', // Catch-all route for 404 errors
        component: () => import('@/components/NotFound.vue') // Example component for 404
      }
    ]
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
