<template>
    <div class="act-card">
        <div class="act-img">
            <NuxtImg :src="imgSrc"/>
        </div>
        <div class="act-content">
            <p class="act-title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    imgSrc: {
        type: String,
        required: true
    },
    title: {
        type: String,
        required: true
    },
    date: {
        type: String,
        required: true
    }
})
</script>