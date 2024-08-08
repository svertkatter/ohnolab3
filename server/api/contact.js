import nodemailer from 'nodemailer'

export default defineEventHandler(async (event) => {
  const body = await readBody(event)

  const config = useRuntimeConfig();

  // メール設定
  const transporter = nodemailer.createTransport({
    service: 'gmail', // ここではGmailを例として使用します
    auth: {
        user: config.EMAIL_USER_DEBUG,
        pass: config.EMAIL_PASS_DEBUG // 送信元のメールアドレス
      //pass: 'nexv jmoc vwdy dmby' // 送信元のメールアドレスのパスワード
      //pass: 'mzji xtoc gqcu urmr'
    }
  })

  const mailOptions = {
    from: body.email,
    to: 'alice241102@gmail.com', // 管理者のメールアドレス
    subject: `お問い合わせ: ${body.subject}`,
    text: `
      お名前: ${body.name}
      メールアドレス: ${body.email}
      電話番号: ${body.phone}
      件名: ${body.subject}
      本文:
      ${body.message}
    `
  }

  try {
    await transporter.sendMail(mailOptions)
    return { success: true }
  } catch (error) {
    console.error(error)
    return { success: false }
  }
})