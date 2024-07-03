<template>
    <div class="flex flex-col justify-center items-center">
      <h2 class="text-2xl mb-5">Posts</h2>
      <table class="border-black border-2">
        <thead>
          <tr class="border-bottom border-black border-b-2">
            <th class="w-16 pl-2 text-right">ID</th>
            <th class="w-64 px-8">Content</th>
            <th class="w-24"></th>
            <th class="w-24"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-if="posts.length === 0">
            <td>No Posts available</td>
          </tr>
          <tr v-else v-for="post in posts" :key="post.id">
            <td class="pl-2 text-right">{{ post.id }}.</td>
            <td class="px-8"><textarea class="resize-none" type="text" v-model="post.content"></textarea></td>
            <td class="px-8"><button class="bg-gray-500 px-2 my-1 rounded-md" @click="updatePost(post.id, post.content)">Update</button></td>
            <td class="pr-2"><button class="bg-gray-500 px-2 my-1 rounded-md" @click="deletePost(post.id)">Delete</button></td>
          </tr>
        </tbody>

      </table>
      <h2 class="text-2xl my-5">Create a post</h2>
      <table class="border-black border-2">
        <thead>
          <tr class="border-bottom border-black border-b-2">
            <th class="">Content</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="px-8"><textarea class="resize-none" type="text" v-model="newPostContent"></textarea></td>
          </tr>
          <tr>
            <td class="px-8"><button class="bg-gray-500 px-2 my-1 rounded-md" @click="addPost()">Create</button></td>
          </tr>
        </tbody>
      </table>

    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import { useStore } from 'vuex';
  
  const store = useStore();
  const posts = ref([]);
  const newPostContent = ref('');
  
  const fetchPosts = async () => {
    try {
      await store.dispatch('fetchPosts');
      posts.value = store.getters.getPosts;
    } catch (error) {
      console.error('Error fetching posts:', error);
    }
  };

  const updatePost = async (id, content) => {
    try {
      await store.dispatch('updatePost', { id, content });
    } catch (error) {
      console.error('Error updating post:', error);
    }
  }

  const deletePost = async (id) => {
    try {
      await store.dispatch('deletePost', { id });
      fetchPosts();
    } catch (error) {
      console.error('Error deleting post', error);
    }
  }

  const addPost = async () => {
    try {
      console.log('the addpost call is being used')
      await store.dispatch('addPost', { content: newPostContent.value });
      fetchPosts();
      newPostContent.value = '';
    } catch (error) {
      console.error('Error adding post:', error);
    }
  }
  
  onMounted(() => {
    fetchPosts();
  });
  </script>
  
  