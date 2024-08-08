<template>
    <div class="section-content">
                <div class="paper-img">
                    <NuxtImg :src="imageSrc" alt="paper" />
                </div>
                <div class="paper-container flex">
                    <div class="paper">
                        <div class="paper-title">
                            <a :href="link" target="_blank" rel="noopener noreferrer">{{ title }}</a>
                        </div>
                        <div class="paper-author">{{ author }}</div>
                        <div class="paper-publish">{{ publish }}</div>
                    </div>
                    <div class="paper-content">{{ content }}</div>
                </div>
            </div>
</template>

<script setup>
defineProps({
    imageSrc: {
    type: String,
    required: true
  },
link:{
    type: String,
    required: true
  },
  title: {
    type: String,
    required: true
  },
  author:{
    type: String,
    required: true
  },
  publish:{
    type: String,
    required: true
  },
  content: {
    type: String,
    required: true
  },
})
</script>