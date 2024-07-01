<template>
    <div class="flex flex-col justify-center items-center">
      <h1 class="text-2xl mb-5">Posts</h1>
      <div v-if="posts.length === 0">
        No posts available
      </div>
      <div v-else>
        <ul>
          <li v-for="post in posts" :key="post.id">
            <h2>{{ post.postName }}</h2>
            <p>{{ post.postContent }}</p>
          </li>
        </ul>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from '../axios.js';
  
  const posts = ref([]);
  
  const fetchPosts = async () => {
    try {
      const response = await axios.get('/posts');
      posts.value = response.data;
    } catch (error) {
      console.error('Error fetching posts:', error);
    }
  };
  
  onMounted(() => {
    fetchPosts();
  });
  </script>
  