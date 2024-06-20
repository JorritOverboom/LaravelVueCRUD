<template>
    <div class="flex flex-col justify-center items-center">
        <div class="text-2xl my-8">Create a post</div>
        <form @submit.prevent="handleSubmit" class="flex flex-col min-w-96">
            <label for="name">Name of post</label>
            <input v-model="postName" class="mb-5" id="name" type="text">
            <label for="content">Content of post</label>
            <textarea v-model="postContent" class="min-h-96" id="content"></textarea>
            <button class="flex justify-center mt-5">
                <input class="text-center bg-gray-500 text-xl px-2 cursor-pointer" type="submit" value="Create post">
            </button>
        </form>
    </div>
</template>

<script setup>
    import { ref } from 'vue'
    import { useStore } from 'vuex'
    
    const store = useStore()
    const postName = ref('')
    const postContent = ref('')

    const handleSubmit = () => {
        store.dispatch('addPost', {
            id: Date.now(),
            postName: postName.value,
            postContent: postContent.value
        })
        postName.value = ''
        postContent.value = ''
    }
</script>