<template>
    <div class="flex flex-col justify-center items-center">
        <div class="text-2xl my-8">Create a user</div>
        <form class="flex flex-col min-w-48">
            <label for="name">Username</label>
            <input class="mb-5" id="name" type="text">
            <label for="password">Password</label>
            <input id="password" type="text">
            <label for="confirm-password" class="mt-5">Confirm password</label>
            <input id="confirm-password" type="text">
            <button>
                <input type="submit" value="Login" class="mt-5 px-2 text-xl bg-gray-500 cursor-pointer">
            </button>
        </form>
    </div>
</template>

<script setup>
    
</script>