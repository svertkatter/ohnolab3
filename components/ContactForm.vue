<template>
  
        <div class="form-group">
          <label for="name">お名前</label>
          <input type="text" id="name" v-model="form.name" placeholder="例）大分花子" />
        </div>
        
        <div class="form-group">
          <label for="email">メールアドレス</label>
          <input type="email" id="email" v-model="form.email" placeholder="example@example.com" />
        </div>
        
        <div class="form-group">
          <label for="phone">電話番号</label>
          <input type="tel" id="phone" v-model="form.phone" placeholder="例）090-000-0000" />
        </div>
        
        <div class="form-group">
          <label for="subject">件名</label>
          <input type="text" id="subject" v-model="form.subject" placeholder="例）研究内容について、ウェブサイトについて など" />
        </div>
        
        <div class="form-group">
          <label for="message">本文</label>
          <textarea id="message" v-model="form.message" placeholder=""></textarea>
        </div>
        
        <div class="form-group">
          <button @click="submitForm">送信</button>
        </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  
  const form = ref({
    name: '',
    email: '',
    phone: '',
    subject: '',
    message: ''
  })
  
  const submitForm = async () => {
    try {
      await fetch('/api/contact', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(form.value)
      })
      alert('お問い合わせ内容が送信されました。')
    } catch (error) {
      console.error('Error:', error)
      alert('送信に失敗しました。もう一度お試しください。')
    }
  }
  </script>
  
  <style scoped>
  .container {
    max-width: 600px;
    margin: 0 auto;
  }
  
  .section {
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
  }
  
  .section-title {
    margin-bottom: 20px;
  }
  
  .section-title h2 {
    font-size: 24px;
  }
  
  .section-title p {
    font-size: 16px;
  }
  
  .form-group {
    margin-bottom: 20px;
  }
  
  .form-group label {
    display: block;
    margin-bottom: 8px;
  }
  
  .form-group input,
  .form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  .form-group button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  .form-group button:hover {
    background-color: #0056b3;
  }
  </style>