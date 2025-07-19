<template>
    <img :src="qrcode" alt="Qr Code">
</template>

<script setup lang="ts">

interface Props {
    qrcode: string;
}

const props = defineProps<Props>();
</script>