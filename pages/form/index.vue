<template>
    <article class="container form-article">
        <div class="section">
            <div class="section-title">
                <h2>Form</h2>
                <p>お問い合わせフォーム</p>
            </div>

            <div class="form-section">
                <!-- <div>
                    <p>現在、製作中です。お問い合わせは以下のメールアドレスにてお願いいたします。お問い合わせの際は件名、お名前、メールアドレス、お電話番号をご記入ください。</p>
                    <a href="mailto:shiihara-rie@oita-u.ac.jp?subject=お問い合わせ" class="mail-button">shiihara-rie@oita-u.ac.jp</a>
                </div> -->
                <ContactForm/>
            </div>

            <div class="button-back"><BackButton/></div>

            
        </div>
    </article>
</template>

<style scoped>
.mail-button{
    margin-top: 3em;
    background: rgb(252, 253, 255, 0.6);
    backdrop-filter: blur(10px);
    width: fit-content;
    border-radius: 5px;
    padding: 0.5em 1em;
    display: block;
}

.mail-button:hover{
    color: var(--base-color);
    background: rgb(55, 60, 56);
}
</style>