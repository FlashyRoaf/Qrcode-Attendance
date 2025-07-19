<template>
    <Head title="Login" />

    <main class="min-h-screen bg-white text-black p-2">
        <div class="border border-gray-100 w-full max-w-md mx-auto rounded-lg m-8 shadow-xl">
            <form class="flex flex-col w-full gap-3 p-8" @submit.prevent="submit">
                <div class="flex justify-center font-extrabold text-4xl">Login</div>
                <div class="flex flex-col gap-2">
                    <label class="text-lg font-bold" for="name">Nama</label>
                    <input class="border-3 bg-gray-50 border-gray-100 rounded-lg px-5 py-2" type="text" id="name"
                        v-model="form.name" placeholder="Masukkan nama" required>
                    <div class="text-red-500" v-if="form.errors.name">
                        {{ form.errors.name }}
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-lg font-bold" for="password">Password</label>
                    <input class="border-3 bg-gray-50 border-gray-100 rounded-lg px-5 py-2" type="password"
                        id="password" v-model="form.password" placeholder="Masukkan password" required>
                    <div v-if="form.errors.password">
                        {{ form.errors.password }}
                    </div>
                </div>

                <button class="bg-blue-400 font-bold text-white rounded-md p-2" type="submit"
                    :disabled="form.processing">Masuk</button>
            </form>
        </div>
    </main>

</template>

<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    password: '',
    remember: true,
});

const submit = () => {
    form.post(route('login'));
}

</script>