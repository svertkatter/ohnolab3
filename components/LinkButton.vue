<template>
        <a class="paper-button" :href="link" target="_blank" rel="noopener noreferrer">
            <NuxtImg v-if="icon" :src="icon"/>
            {{ text }}
        </a>
</template>

<script setup>
defineProps({
    link: {
        type: String,
        required: true
    },
    icon:{
        type: String,
        required: false
    },
    text: {
        type: String,
        required: true
    }
})
</script>