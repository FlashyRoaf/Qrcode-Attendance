<template>
    <Head title="Home"/>
    <main class="bg-white min-h-screen text-black">
        <span class="text-2xl font-bold text-center">Home</span>
        <Link class="bg-red-500 hover:bg-red-600 text-white font-bold p-4 rounded-lg" method="post" :href="route('logout')" @click="handleLogout">Keluar</Link>
    </main>
</template>

<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';

const handleLogout = () => {
    router.flushAll();
}
</script>