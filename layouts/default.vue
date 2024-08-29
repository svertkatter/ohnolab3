<template>
  <div>
    <Header />
    <div class="background">
      <Background />
    </div>
    <transition
      mode="out-in"
      @before-enter="beforeEnter"
      @enter="enter"
      @leave="leave"
    >
      <div :key="$route.fullPath">
        <slot />
      </div>
    </transition>
    <Footer />
  </div>
</template>

<script setup>
import { useNuxtApp } from '#app'

const { $gsap } = useNuxtApp()

const enter = (el, done) => {
  // fromTo でアニメーションを指定
  $gsap.fromTo(
    el,
    { opacity: 0, x: 100 },
    { opacity: 1, x: 0, duration: 0.5, ease: 'power2.out', onComplete: done }
  );
};

const leave = (el, done) => {
  $gsap.fromTo(
    el,
    { opacity: 1, x: 0 },
    { opacity: 0, x: -100, duration: 0.5, ease: 'power2.in', onComplete: done }
  );
};
</script>

