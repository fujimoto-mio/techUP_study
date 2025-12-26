@component('mail::message')

## 📩 お問い合わせありがとうございます

※このメールはシステムからの自動返信です。  
This email has been sent automatically.

---

{{ $data['name'] }} 様

お世話になっております。  
GLOBE NATIONへのお問い合わせありがとうございました。

以下の内容でお問い合わせを受け付けました。  
お問い合わせ内容をご確認でき次第、ご連絡いたしますので今しばらくお待ちくださいませ。

---

--English--

Dear {{ $data['name'] }},

Thank you so much for reaching out to GLOBE NATION.  
We will get back to you as soon as possible.  
Thank you!

---

━━━━━━□■□ お問い合わせ内容 / Your Inquiry □■□━━━━━━

**会社名 / Company:**  
{{ $data['company'] ?? '未入力' }}

**お名前 / Name:**  
{{ $data['name'] }}

**E-Mail:**  
{{ $data['email'] }}

**電話番号 / Phone:**  
{{ $data['phone'] }}

**カテゴリー / Category:**  
{{ $data['category'] }}

---

**お問い合わせ内容 / Your Message:**  

{{ $data['message'] }}

---

・・・・・・・・・・・・・・・・・・・・・・・・・・・

"Together, We Shape the GLOBE.”  
「共に描こう、世界のカタチ。」

GLOBE NATION

Website: [https://globe-nation.com](https://globe-nation.com)  
Email: info@globe-nation.com  
Phone: 070-8379-5788

・・・・・・・・・・・・・・・・・・・・・・・・・・・
@endcomponent
