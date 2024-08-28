<template>
    <header class="header">
            <div class="flex nav">
                <h1>
                    <NuxtLink to="/">
                        <NuxtImg class="logo" src="/img/logo/ohnologo-withtype.svg" alt="大野研究室ロゴ"/>
                    </NuxtLink>
                </h1>
                <ul class="flex list">
                    <li><NuxtLink to="/researches">Researches</NuxtLink></li>
                    <li><NuxtLink to="/equipments">Equipments</NuxtLink></li>
                    <li><NuxtLink to="/activities">Activities</NuxtLink></li>
                    <li><NuxtLink to="/members">Member</NuxtLink></li>
                    <li><NuxtLink to="/room">Room</NuxtLink></li>
                    <li><NuxtLink to="/access">Access</NuxtLink></li>
                </ul>
                <button class="menu-toggle" @click="toggleMenu">
                    <!-- ☰ -->
                    <span class="line line1"></span>
                    <span class="line line2"></span>
                    <span class="line line3"></span>
                </button>
            </div>


            <div :class="['menu', { 'menu--active': menuActive }]">
                <!-- <button class="menu-close" @click="toggleMenu">✖</button> -->
                <ul class="menu-list">
                    <li><NuxtLink to="/researches">Researches</NuxtLink></li>
                    <li><NuxtLink to="/equipments">Equipments</NuxtLink></li>
                    <li><NuxtLink to="/activities">Activities</NuxtLink></li>
                    <li><NuxtLink to="/members">Member</NuxtLink></li>
                    <li><NuxtLink to="/room">Room</NuxtLink></li>
                    <li><NuxtLink to="/access">Access</NuxtLink></li>
                </ul>
            </div>
        </header>
</template>

<script setup>
import { ref } from 'vue';
import { gsap } from 'gsap';

const menuActive = ref(false)

const toggleMenu = () => {
    const headerElement = document.querySelector('.header');
    const menuToggleElement = document.querySelector('.menu-toggle');
    const menuElement = document.querySelector('.menu');
    const menuListElement = document.querySelector('.menu-list');
    const menuItems = document.querySelectorAll('.menu-list li');
    
    if (!menuActive.value) {
        // メニューを開く
        menuActive.value = true;
        headerElement.classList.add('full-screen');
        menuToggleElement.classList.add('active');
        document.body.style.overflow = 'hidden'; // スクロールを無効にする
        menuElement.classList.add('menu--active');

        // display を none から block に変更
        menuListElement.style.display = 'flex';

        // メニューが開いたときのアニメーション (0.5秒の遅延を追加)
        gsap.fromTo(menuItems, 
            { opacity: 0, y: 20 }, 
            { opacity: 1, y: 0, stagger: 0.1, duration: 0.5, ease: 'power2.out', delay: 0.5 }
        );
    } else {
        // メニューが閉じたときのアニメーション
        gsap.to(menuItems, 
            { opacity: 0, y: 20, duration: 0.3, ease: 'power2.in', onComplete: () => {
                headerElement.classList.remove('full-screen');
                menuToggleElement.classList.remove('active');
                document.body.style.overflow = ''; // スクロールを元に戻す
                
                // アニメーション終了後に menu--active クラスを削除し、display を none に戻す
                menuElement.classList.remove('menu--active');
                menuListElement.style.display = 'none';
                
                // メニューを非アクティブ状態に設定
                menuActive.value = false;
            }}
        );
    }
};

const closeMenu = () => {
    const headerElement = document.querySelector('.header');
    const menuToggleElement = document.querySelector('.menu-toggle');
    const menuElement = document.querySelector('.menu');
    const menuListElement = document.querySelector('.menu-list');
    const menuItems = document.querySelectorAll('.menu-list li');

    // メニューが閉じたときのアニメーション
    gsap.to(menuItems, 
        { opacity: 0, y: 20, duration: 0.3, ease: 'power2.in', onComplete: () => {
            headerElement.classList.remove('full-screen');
            menuToggleElement.classList.remove('active');
            document.body.style.overflow = ''; // スクロールを元に戻す
            
            // アニメーション終了後に menu--active クラスを削除し、display を none に戻す
            menuElement.classList.remove('menu--active');
            menuListElement.style.display = 'none';
            
            // メニューを非アクティブ状態に設定
            menuActive.value = false;
        }}
    );
};

// リンククリック時にメニューを閉じる
onMounted(() => {
    const menuLinks = document.querySelectorAll('.menu-list li a');
    menuLinks.forEach(link => {
        link.addEventListener('click', () => {
            closeMenu();
        });
    });
});

// const toggleMenu = () => {
//     menuActive.value = !menuActive.value
//     const headerElement = document.querySelector('.header');
//     const menuToggleElement = document.querySelector('.menu-toggle');
    
//     if (menuActive.value) {
//         headerElement.classList.add('full-screen');
//         menuToggleElement.classList.add('active');
//         document.body.style.overflow = 'hidden'; // スクロールを無効にする
//     } else {
//         headerElement.classList.remove('full-screen');
//         menuToggleElement.classList.remove('active');
//         document.body.style.overflow = ''; // スクロールを元に戻す
//     }
// }
</script>