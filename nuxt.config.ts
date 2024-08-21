// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    compatibilityDate: '2024-04-03',
    devtools: { enabled: true },

    app: {
      head: {
          htmlAttrs: {
              lang: 'ja',
              prefix: 'og: http://ogp.me/ns#',
          },
          title: '大野研究室｜大分大学',
          meta: [
              {
                  charset: 'utf-8',
              },
              {
                  name: 'viewport',
                  content: 'width=device-width, initial-scale=1, viewport-fit=cover',
              },
              { hid: 'description', name: 'description', content: '大分大学大野研究室のサイト' },
              { hid: 'og:site_name', property: 'og:site_name', content: '大野研究室｜大分大学' },
              { hid: 'og:url', property: 'og:url', content: 'https://ohno.eee.oita-u.ac.jp/' },  //絶対パスで指定
              { hid: 'og:type', property: 'og:type', content: 'website' },
              { hid: 'og:image', property: 'og:image', content: 'https://ohno.eee.oita-u.ac.jp/picture-ogp.png' },  //絶対パスで指定
              { hid: 'og:title', property: 'og:title', content: '大野研究室｜大分大学' },
              { hid: 'og:description', property: 'og:description', content: '大野研究室｜大分大学' },
              { name: 'twitter:card', content: 'summary_large_image' },
              { name: 'twitter:image', content: 'https://ohno.eee.oita-u.ac.jp/picture-ogp.png'}
          ],
          link: [
              {
                  rel : 'icon', type: 'image/x-icon', href: '/favicon.ico'
              },
              {
                rel:"preconnect",
                href: "https://fonts.googleapis.com",
              },
              {
                rel: "stylesheet",
                href:"https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+JP:wght@400;500;700&display=swap",
                crossorigin: "",
              }
          ],
      },
  },

    css: [
      '@/assets/css/reset.css',
      '@/assets/css/style.css'
    ],

    modules: [
      "@nuxt/image",
      "@nuxt/content"
    ],
    runtimeConfig: {
            EMAIL_USER: process.env.NUXT_EMAIL_USER,
            EMAIL_PASS: process.env.NUXT_EMAIL_PASS,
            EMAIL_USER_DEBUG: process.env.NUXT_EMAIL_USER_DEBUG,
            EMAIL_PASS_DEBUG: process.env.NUXT_EMAIL_PASS_DEBUG    
        
      },
})