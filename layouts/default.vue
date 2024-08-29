<template>
  <div>
    <Header />
    <div class="background">
      <Background />
    </div>
        <slot />
    <Footer />
  </div>
</template>

<style>
.page-enter-active, .page-leave-active {
  transition: all 0.5s ease;
}

.page-enter-from, .page-leave-to {
  opacity: 0;
  transform: translateX(100px);
}

.page-leave-from, .page-enter-to {
  opacity: 1;
  transform: translateX(0);
}
</style>
