<template>
    <div class="flex flex-col justify-center items-center">
        <h1 class="text-2xl mb-5">Posts</h1>
        <div v-if="posts.length">
            <div v-for="post in posts" :key="post.id" class="mb-4 p-4 bg-gray-100 rounded">
                <h2 class="text-xl">{{  post.user.name }}</h2>
                <p class="ml-2">{{  post.content }}</p>
            </div>
        </div>
        <div v-else>
            <p>No posts available</p>
        </div>
    </div>
</template>

<script setup>
    import { mapGetters, mapActions } from 'vuex'

    // Using the 'defineProps' and 'defineEmits' helpers with `<script setup>`
    const { getPosts, fetchPosts } = useStore(mapGetters, mapActions);

    fetchPosts();

    const posts = getPosts();
</script>