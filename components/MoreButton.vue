<template>
    <div class="moreButton">
      <NuxtLink to="/researches" class="buttonLink">
        <p>More {{ text }}</p>
        <span class="arrowRight"></span>
      </NuxtLink>
    </div>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  
  const props = defineProps({
    text: String
  });
  </script>