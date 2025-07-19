<template>
    <main class="bg-white min-h-screen text-black">
        <div class="flex flex-col gap-2 p-4">
            <span class="flex justify-center font-bold text-4xl">Scan Absensi</span>
            <div class="border-2 border-gray-300 p-2 max-w-100 mx-auto p-8 shadow-xl rounded-xl">
                <img :src="qrcode" alt="Qr Code">
            </div>
        </div>
    </main>
</template>

<script setup lang="ts">

interface Props {
    qrcode: string;
}

const props = defineProps<Props>();
</script>