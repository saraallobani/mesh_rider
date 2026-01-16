<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MESHRIDER | عن مش رايدر</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .about-content {
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
            margin-bottom: 60px;
        }

        .about-text h2 {
            color: var(--dark-blue);
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .about-text p {
            line-height: 1.8;
            color: #555;
            font-size: 1.1rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .feature-item {
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border-top: 5px solid var(--orange);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .mission-vision {
            background: var(--dark-blue);
            color: white;
            padding: 60px 20px;
            text-align: center;
            border-radius: 20px;
            margin: 40px 0;
        }

        .mission-vision h3 { color: var(--orange); font-size: 1.8rem; }

        @media (max-width: 768px) {
            .about-grid { grid-template-columns: 1fr; text-align: center; }
        }
    </style>
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <div class="hero">
        <h1>قصة مش رايدر 📖</h1>
        <p>من فكرة بسيطة إلى أكبر مجتمع للمغامرين في الأردن</p>
    </div>

    <div class="about-content">
        
        <div class="about-grid">
            <div class="about-text">
                <h2>كيف بدأنا؟</h2>
                <p>
                    بدأت <b>مش رايدر</b> من شغف شاب أردني بالطبيعة والمغامرة. لاحظنا أن الوصول للأماكن المخفية في الأردن وحجز مركبات الدفع الرباعي كان أمراً معقداً، فقررنا بناء منصة تجمع كل ذلك في مكان واحد.
                </p>
                <p>
                    نحن هنا لنكسر حاجز الروتين، ونأخذك في رحلات ليست موجودة في الكتيبات السياحية التقليدية.
                </p>
            </div>
            <div class="about-image">
                <div style="width: 100%; height: 300px; background: #ddd; border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 5rem;">🏔️</div>
            </div>
        </div>

        <div class="mission-vision">
            <div style="max-width: 800px; margin: 0 auto;">
                <h3>رؤيتنا 👁️</h3>
                <p>أن نصبح الرفيق الأول لكل مغامر في الشرق الأوسط، وأن نجعل سياحة المغامرة في متناول الجميع.</p>
                <br>
                <h3>رسالتنا 🎯</h3>
                <p>تقديم تجارب آمنة، ممتعة، ومنظمة باحترافية عالية مع الحفاظ على البيئة ودعم المجتمعات المحلية في وجهاتنا.</p>
            </div>
        </div>

        <h2 style="text-align: center; color: var(--dark-blue); margin-top: 60px;">ليش تختار مش رايدر؟</h2>
        <div class="features-grid">
            <div class="feature-item">
                <div class="feature-icon">🛡️</div>
                <h4>أمان عالي</h4>
                <p>جميع مركباتنا ومدربينا يخضعون لمعايير سلامة صارمة.</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">💰</div>
                <h4>أفضل الأسعار</h4>
                <p>نقدم صفقات تنافسية وشفافية كاملة في التكاليف.</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">🤝</div>
                <h4>مجتمع واحد</h4>
                <p>معنا، أنت لست مجرد زبون، أنت جزء من عائلة المغامرين.</p>
            </div>
        </div>

    </div>

    <footer style="text-align: center; padding: 40px; background: #f4f4f4; border-top: 1px solid #ddd;">
        <p>© 2026 MESHRIDER - جميع الحقوق محفوظة</p>
    </footer>

</body>
</html>