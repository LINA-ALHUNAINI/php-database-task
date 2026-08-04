# php-database-task

هذا المشروع عبارة عن تطبيق ويب بسيط لإدارة البيانات (إضافة وتحديث الحالة) باستخدام PHP وقاعدة بيانات MySQL.

## 🚀 رابط التجربة المباشرة (Live Demo)
يمكنك تجربة التطبيق مباشرة عبر الرابط التالي:
http://lina-task.fwh.is/page.php

---

## 🛠️ التقنيات المستخدمة (Tech Stack)
* HTML5 / CSS3 للواجهة والأشكال.
* PHP للمعالجة والربط بقاعدة البيانات.
* MySQL لتخزين البيانات.
* JavaScript / AJAX لتحديث الحالة (Toggle) بدون إعادة تحميل الصفحة.

---

## 📌 الميزات (Features)
* إضافة اسم وعمر مستخدم جديد إلى قاعدة البيانات.
* عرض جميع السجلات في جدول تفاعلي.
* زر Toggle لتغيير حالة السجل (Status) بين 0 و 1 بشكل فوري.

---

## 🗄️ هيكل قاعدة البيانات (Database Schema)
أنشئ جدول باسم stu باستخدام الاستعلام التالي:

```sql
CREATE TABLE stu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    status INT DEFAULT 0
);
