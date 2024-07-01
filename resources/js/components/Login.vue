<template>
    <div class="flex flex-col justify-center items-center">
        <div class="text-2xl my-8">Login</div>
        <form class="flex flex-col min-w-48">
            <label for="name">Username</label>
            <input class="mb-5" id="name" type="text">
            <label for="password">Password</label>
            <input id="password" type="text">
            <button>
                <input type="submit" value="Login" class="mt-5 px-2 text-xl bg-gray-500 cursor-pointer">
            </button>
        </form>
        <router-link class="mt-10 underline text-black-700 text-xl" to="/signup">Make an account</router-link>
    </div>
</template>

<script setup>
    
</script>