<template>
    <article class="container access-article">
        <div class="section">
            <div class="section-title">
                <h2>Access</h2>
                <p>アクセス</p>
            </div>

            <div class="access-section">
                <p class="blue-title">研究室へのアクセス</p>
                <div class="map-img">
                    <NuxtImg src="/img/access/map.webp"/>
                </div>
                <div class="access-content">
                    <p>大分大学旦野原キャンパスの理工13号館（30番）2階にあります。お気軽にご訪問ください。</p>
                    <div class="access-room">
                        <p>准教授室：207号室</p>
                        <p>技 官 室：205号室</p>
                    </div>
                </div>
            </div>

            <div class="access-section">
                <p class="blue-title">お問い合わせ</p>
                <div class="access-content">
                    <p>見学、研究相談、共同研究、試料の試作、このサイトのご意見・ご質問などは以下のお問い合わせフォームより受け付けております。</p>
                    <div class="access-room">
                        <LinkButton link="/form" text="お問い合わせフォーム" icon="/img/icon/mail.svg"/>
                    </div>
                </div>
            </div>
        

            <div class="button-back"><BackButton/></div>

            
        </div>
    </article>
</template>