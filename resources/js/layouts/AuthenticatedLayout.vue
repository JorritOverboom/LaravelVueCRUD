<template>
    <div class="flex flex-col h-screen">
      <!-- Navigation Bar -->
      <header class="flex justify-between items-center p-4 bg-gray-800 text-white">
        <router-link class="mx-2" to='/posts'>LaravelVueCRUD</router-link>
        <div class="text-xl">
          <router-link class="mx-2" to='/create'>Create a post</router-link>
          <router-link class="mx-2" to='/'>Login</router-link>
        </div>
      </header>
  
      <!-- Main Content -->
      <main class="flex-grow">
        <router-view class="h-full bg-red-700" />
      </main>
  
      <!-- Footer -->
      <footer class="p-4 bg-gray-800 text-white text-center">
        Footer
      </footer>
    </div>
  </template>