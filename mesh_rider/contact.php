<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MESHRIDER | اتصل بنا</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .contact-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* قسم معلومات التواصل */
        .contact-info {
            background: var(--dark-blue);
            color: white;
            padding: 40px;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .info-card {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .info-card .icon {
            background: var(--orange);
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 20px;
        }

        .info-card h4 { margin: 0; color: var(--orange); }
        .info-card p { margin: 5px 0 0; font-size: 0.95rem; }

        /* قسم فورم المراسلة */
        .contact-form {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .form-group {
            margin-bottom: 20px;
            text-align: right;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: var(--dark-blue);
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #eee;
            border-radius: 8px;
            box-sizing: border-box;
            font-family: inherit;
        }

        .form-group input:focus, .form-group textarea:focus {
            border-color: var(--orange);
            outline: none;
        }

        .map-container {
            width: 90%;
            margin: 40px auto;
            height: 300px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        @media (max-width: 768px) {
            .contact-wrapper { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <div class="hero">
        <h1>إحنا دايماً معك 📞</h1>
        <p>عندك استفسار؟ حابب تنسق رحلة خاصة؟ تواصل معنا الآن</p>
    </div>

    <div class="contact-wrapper">
        
        <div class="contact-info">
            <h2>معلومات التواصل</h2>
            <p>لا تتردد في الاتصال بنا، فريقنا جاهز للرد عليك على مدار الساعة.</p>
            
            <div class="info-card">
                <div class="icon">📍</div>
                <div>
                    <h4>موقعنا</h4>
                    <p>عمان، شارع الرينبو، مجمع رقم 45</p>
                </div>
            </div>

            <div class="info-card">
                <div class="icon">📞</div>
                <div>
                    <h4>الهاتف</h4>
                    <p>079 000 0000</p>
                </div>
            </div>

            <div class="info-card" style="cursor: pointer;" onclick="window.open('https://wa.me/962790000000')">
                <div class="icon" style="background: #25D366;">💬</div>
                <div>
                    <h4>واتساب</h4>
                    <p>تواصل سريع ومباشر</p>
                </div>
            </div>

            <div class="info-card">
                <div class="icon">✉️</div>
                <div>
                    <h4>البريد الإلكتروني</h4>
                    <p>support@meshrider.com</p>
                </div>
            </div>
        </div>

        <div class="contact-form">
            <h2 style="color: var(--dark-blue); margin-top: 0;">أرسل لنا رسالة</h2>
            <form action="#">
                <div class="form-group">
                    <label>الاسم بالكامل</label>
                    <input type="text" placeholder="مثال: زيد علي" required>
                </div>
                <div class="form-group">
                    <label>البريد الإلكتروني</label>
                    <input type="email" placeholder="example@mail.com" required>
                </div>
                <div class="form-group">
                    <label>موضوع الرسالة</label>
                    <input type="text" placeholder="استفسار عن رحلة، شكوى، حجز خاص" required>
                </div>
                <div class="form-group">
                    <label>رسالتك</label>
                    <textarea rows="5" placeholder="اكتب تفاصيل استفسارك هنا..." required></textarea>
                </div>
                <button type="submit" class="btn" style="width: 100%; border: none; cursor: pointer;">إرسال الرسالة</button>
            </form>
        </div>
    </div>

    <div class="map-container">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m13!1m3!1d3384.6224151740!2d35.9284!3d31.9539!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzHCsDU3JzE0LjAiTiAzNcKwNTUnNDIuMiJF!5e0!3m2!1sar!2sjo!4v1642150000000!5m2!1sar!2sjo" 
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
    </div>

</body>
</html>