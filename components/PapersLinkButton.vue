<template>
        <a class="paper-button" :href="link" target="_blank" rel="noopener noreferrer">{{ text }}</a>
</template>

<script setup>
defineProps({
    link: {
        type: String,
        required: true
    },
    text: {
        type: String,
        required: true
    }
})
</script>