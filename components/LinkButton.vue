<template>
        <!-- 内部リンクの場合 -->
        <NuxtLink v-if="isInternalLink" :to="link" class="paper-button" target="_blank" rel="noopener noreferrer">
            <NuxtImg v-if="icon" :src="icon" alt="icon" class="icon" />
            {{ text }}
        </NuxtLink>

        <!-- 外部リンクの場合 -->
        <a v-else :href="link" class="paper-button" target="_blank" rel="noopener noreferrer">
            <NuxtImg v-if="icon" :src="icon" alt="icon" class="icon" />
            {{ text }}
        </a>
</template>

<script setup>
import { computed } from 'vue'

// プロパティの定義
const props = defineProps({
    link: {
        type: String,
        required: true
    },
    text: {
        type: String,
        required: true
    },
    icon: {
        type: String,
        required: false
    }
})

// 内部リンクか外部リンクかを判定
const isInternalLink = computed(() => props.link.startsWith('/'))
</script>

<!-- <template>
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
</script> -->