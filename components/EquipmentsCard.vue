<template>
    <div class="equi-area">
        <div class="equi-text">
            <p class="equi-title">{{ title }}</p>
            <p class="equi-content">{{ content }}</p>
        </div>
        <div class="equi-img">
            <NuxtImg :src="imageSrc"/>
        </div>
    </div>
</template>

<script setup>
defineProps({
  title: {
    type: String,
    required: true
  },
  content: {
    type: String,
    required: true
  },
  imageSrc: {
    type: String,
    required: true
  },
})
</script>