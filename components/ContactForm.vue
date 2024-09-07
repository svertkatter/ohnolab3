<template>
  <form @submit.prevent="sendEmail">
    <div class="form-group">
      <label for="name">お名前</label>
      <input
        type="text"
        id="name"
        v-model="form.name"
        name="name"
        placeholder="例）大分花子"
        required
      />
    </div>

    <div class="form-group">
      <label for="email">メールアドレス</label>
      <input
        type="email"
        id="email"
        v-model="form.email"
        name="email"
        placeholder="example@example.com"
        required
      />
    </div>

    <div class="form-group">
      <label for="phone">電話番号（ハイフン無し）</label>
      <input
        type="tel"
        id="phone"
        v-model="form.phone"
        name="phone"
        placeholder="例）090-000-0000"
        required
      />
    </div>

    <div class="form-group">
      <label for="subject">件名</label>
      <input
        type="text"
        id="subject"
        v-model="form.subject"
        name="subject"
        placeholder="件名を入力"
        required
      />
    </div>

    <div class="form-group">
      <label for="message">本文</label>
      <textarea
        id="message"
        v-model="form.message"
        name="message"
        placeholder="お問い合わせ内容を入力"
        required
      ></textarea>
    </div>

    <div class="form-group">
      <button type="submit">送信</button>
    </div>

    <div v-if="errorMessage" class="error">{{ errorMessage }}</div>
    <div v-if="successMessage" class="success">{{ successMessage }}</div>
  </form>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const form = ref({
  name: '',
  email: '',
  phone: '',
  subject: '',
  message: ''
})

const pending = ref(false)
const successMessage = ref('')
const errorMessage = ref('')

const sendEmail = async () => {
  pending.value = true
  successMessage.value = ''
  errorMessage.value = ''

  const formData = new URLSearchParams();
  formData.append('name', form.value.name);
  formData.append('email', form.value.email);
  formData.append('phone', form.value.phone);
  formData.append('subject', form.value.subject);
  formData.append('message', form.value.message);

  console.log('送信するフォームデータ:', formData.toString()); // フォームデータをコンソールで確認

  try {
    const response = await fetch('https://ohno.eee.oita-u.ac.jp/send-email.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: formData.toString(),
    });

    console.log('サーバーからの応答:', response); // サーバーの応答を確認

    const result = await response.json();
    console.log('サーバーからの結果:', result); // サーバーからの結果を確認

    if (response.ok && result.status === 'success') {
      successMessage.value = result.message;
      form.value = {
        name: '',
        email: '',
        phone: '',
        subject: '',
        message: ''
      };
    } else {
      errorMessage.value = result.message || 'メール送信に失敗しました。';
    }
  } catch (error) {
    console.error('送信中にエラーが発生しました:', error); // エラーをコンソールに表示
    errorMessage.value = '送信中にエラーが発生しました。';
  } finally {
    pending.value = false;
  }
};
</script>




<!-- <template>
  
  <div class="form-group">
        <label for="name">お名前</label>
        <input
          type="text"
          id="name"
          v-model="form.name"
          placeholder="例）大分花子"
          @input="validateField('name')"
        />
        <p v-if="errors.name" class="error-message">{{ errors.name }}</p>
      </div>
      
      <div class="form-group">
        <label for="email">メールアドレス</label>
        <input
          type="email"
          id="email"
          v-model="form.email"
          placeholder="example@example.com"
          @input="validateField('email')"
        />
        <p v-if="errors.email" class="error-message">{{ errors.email }}</p>
      </div>
      
      <div class="form-group">
        <label for="phone">電話番号（ハイフン無し）</label>
        <input
          type="tel"
          id="phone"
          v-model="form.phone"
          placeholder="例）090-000-0000"
          @input="validateField('phone')"
        />
        <p v-if="errors.phone" class="error-message">{{ errors.phone }}</p>
      </div>
      
      <div class="form-group">
        <label for="subject">件名</label>
        <input
          type="text"
          id="subject"
          v-model="form.subject"
          placeholder="例）研究内容について、ウェブサイトについて など"
          @input="validateField('subject')"
        />
        <p v-if="errors.subject" class="error-message">{{ errors.subject }}</p>
      </div>
      
      <div class="form-group">
        <label for="message">本文</label>
        <textarea
          id="message"
          v-model="form.message"
          placeholder=""
          @input="validateField('message')"
        ></textarea>
        <p v-if="errors.message" class="error-message">{{ errors.message }}</p>
      </div>
      
      <div class="form-group">
        <button @click="submitForm">送信</button>
      </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  
  // フォームデータとエラーオブジェクトの定義
  const form = ref({
    name: '',
    email: '',
    phone: '',
    subject: '',
    message: ''
  })
  
  const errors = ref({
    name: '',
    email: '',
    phone: '',
    subject: '',
    message: ''
  })
  
  // フィールドごとのバリデーション
  const validateField = (field) => {
    switch (field) {
      case 'name':
        errors.value.name = form.value.name ? '' : 'お名前を入力してください。'
        break
      case 'email':
        errors.value.email = validateEmail(form.value.email) ? '' : '有効なメールアドレスを入力してください。'
        break
      case 'phone':
        errors.value.phone = validatePhone(form.value.phone) ? '' : '有効な電話番号を入力してください。数字のみを使用してください。'
        break
      case 'subject':
        errors.value.subject = form.value.subject ? '' : '件名を入力してください。'
        break
      case 'message':
        errors.value.message = form.value.message ? '' : '本文を入力してください。'
        break
    }
  }
  
  // メールアドレスの形式を確認する関数
  const validateEmail = (email) => {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    return re.test(email)
  }

  // 電話番号が数字のみで構成されているかを確認する関数
const validatePhone = (phone) => {
  const re = /^[0-9]+$/
  return re.test(phone)
}

const submitForm = async () => {
  try {
    const response = await fetch('/send-email.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: new URLSearchParams({
        name: form.value.name,
        email: form.value.email,
        phone: form.value.phone,
        subject: form.value.subject,
        message: form.value.message,
      }),
    });

    const result = await response.json(); // 正しいJSONレスポンスを期待する
    if (result.success) {
      alert(result.message);
      form.value = { name: '', email: '', phone: '', subject: '', message: '' }; // フォームをクリア
    } else {
      alert(result.message);
    }
  } catch (error) {
    console.error('Error:', error);
    alert('送信に失敗しました。もう一度お試しください。');
  }
};


  
  //フォーム送信時の処理
  // const submitForm = async () => {
  //   // 全てのフィールドをバリデート
  //   validateField('name')
  //   validateField('email')
  //   validateField('phone')
  //   validateField('subject')
  //   validateField('message')
  
  //   // エラーがなければ送信処理を実行
  //   if (!Object.values(errors.value).some(error => error !== '')) {
  //     try {
  //       await fetch('/api/contact', {
  //         method: 'POST',
  //         headers: {
  //           'Content-Type': 'application/json'
  //         },
  //         body: JSON.stringify(form.value)
  //       })
  //       alert('お問い合わせ内容が送信されました。')

  //       // フォームをクリア
  //     form.value.name = ''
  //     form.value.email = ''
  //     form.value.phone = ''
  //     form.value.subject = ''
  //     form.value.message = ''
  //     } catch (error) {
  //       console.error('Error:', error)
  //       alert('送信に失敗しました。もう一度お試しください。')
  //     }
  //   } else {
  //     alert('フォームにエラーがあります。修正してください。')
  //   }
  // }
  </script> -->
  
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

  .form-group textarea{
    height: 300px;
  }
  
  .form-group button {
    padding: 10px 40px;
    background-color: #005bac;
    color: #fff;
    border: none;
    border-radius: 999px;
    cursor: pointer;
    transition: all .3s;
  }
  
  .form-group button:hover {
    background-color: #fff;
    color: #005bac;
  }
  
  .error-message {
    color: #ff0000;
    margin-top: 5px;
  }

  .error {
  color: red;
}
.success {
  color: green;
}
  </style>