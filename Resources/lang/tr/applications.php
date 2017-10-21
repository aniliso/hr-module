<?php

return [
    'list resource'    => 'Başvuru Listele',
    'create resource'  => 'Başvuru Ekle',
    'edit resource'    => 'Başvuru Düzenle',
    'destroy resource' => 'Başvuru Sil',
    'title'            => [
        'application'        => 'İnsan Kaynakları Formu',
        'applications'       => 'Başvurular',
        'create application' => 'Başvuru Ekle',
        'edit application'   => 'Başvuru Düzenle',
        'view application'   => ':id no.lu Başvuru'
    ],
    'button'           => [
        'create application' => 'Başvuru Ekle',
    ],
    'table'            => [
    ],
    'legend'           => [
        'personal'   => 'Kişisel Bilgiler',
        'identity'   => 'Kimlik Bilgisi',
        'driver'     => 'Sürücü Belgesi',
        'contact'    => 'İletişim Bilgileri',
        'health'     => 'Sağlık Durumu',
        'criminal'   => 'Sabıka Durumu',
        'language'   => 'Yabancı Dil Bilgisi',
        'skills'     => 'Kişisel Beceriler',
        'education'  => 'Öğrenim Durumu',
        'course'     => 'Kurs ve Eğitimler',
        'experience' => 'İş Tecrübesi',
        'reference'  => 'Referanslar',
        'emergency'  => 'Acil Durumlarda Haber Verebileceğimiz Kişiler',
        'request'    => 'Başvuru Bilgileri'
    ],
    'form'             => [
        'gender'        => 'Cinsiyet',
        'first_name'    => 'Adınız',
        'last_name'     => 'Soyadınız',
        'language'      => 'Yabancı Dil',
        'nationality'   => 'Uyruğu',
        'marital'       => 'Medeni Hal',
        'health'        => 'Sağlık Durumu',
        'health_desc'   => 'Ciddi bir sakatlık ya da rahatsızlık geçirdiniz mi ?',
        'criminal'      => 'Sabıka Bilgisi',
        'criminal_desc' => 'Sabıkanız Var mı ?',
        'identity'      => [
            'birthdate'  => 'Doğum Tarihi',
            'birthplace' => 'Doğum Yeri',
            'bloodgroup' => 'Kan Grubu',
            'no'         => 'TC Kimlik No',
            'sgk'        => 'SGK',
            'tax'        => 'Vergi No'
        ],
        'languages'     => [
            'read'  => 'Okuma',
            'write' => 'Yazma',
            'speak' => 'Konuşma'
        ],
        'driver'        => [
            'type'     => 'Ehliyet Sınıfı',
            'no'       => 'Ehliyet No',
            'issue_at' => 'Veriliş Tarihi'
        ],
        'contacts'      => [
            'address1' => 'Adres',
            'address2' => 'Adres',
            'county'   => 'İlçe',
            'city'     => 'Şehir',
            'phone'    => 'Telefon',
            'gsm'      => 'Mobil',
            'postcode' => 'Posta Kodu',
            'email'    => 'E-Posta'
        ],
        'educate'       => [
            'start_at' => 'Başlangıç Tarihi',
            'end_at'   => 'Bitiş Tarihi',
            'name'     => 'Okul Adı',
            'status'   => 'Diploma Durumu',
            'branch'   => 'Bölüm',
            'statuses' => [
                0 => 'Seçiniz',
                1 => 'Mezun',
                2 => 'Öğrenci',
                3 => 'Terk'
            ]
        ],
        'courses'       => [
            'name'    => 'Eğitimin Adı',
            'company' => 'Eğitimi Veren Kişi / Kuruluş',
            'date'    => 'Tarih'
        ],
        'experiences'   => [
            'start_at'   => 'Başlangıç Tarihi',
            'end_at'     => 'Bitiş Tarihi',
            'company'    => 'İşyeri',
            'department' => 'Bölümünüz',
            'position'   => 'Göreviniz',
            'reason'     => 'Ayrılma Nedeni',
            'phone'      => 'Telefon No',
            'full_name'  => 'Adı Soyadı',
            'title'      => 'Ünvanı',
            'title_desc' => 'İş Yerinizdeki Bir Üst Yöneticinizin;'
        ],
        'references'    => [
            'full_name'   => 'Adı Soyadı',
            'work_place'  => 'Çalıştığı Yer',
            'position'    => 'Görevi',
            'proximity'   => 'Yakınlık Dereceniz',
            'phone'       => 'Telefon',
            'description' => 'Verilen bilgilerin teyit edilmesi amacıyla eski işverenler, eğitim kurum/kuruluşları, kamu kurumları ve verilen referanslar ile temasa geçilmesini kabul ediyorum.'
        ],
        'emergencies'   => [
            'full_name' => 'Adı Soyadı',
            'phone'     => 'Telefon'
        ],
        'requests'      => [
            'travel'       => 'Seyehate çıkabilir misiniz?',
            'department'   => 'Başvurulan Pozisyon',
            'price'        => 'Talep Edilen Ücret',
            'work_time'    => 'Görev Şekli',
            'job_rotation' => 'Vardiyalı çalışabilir misiniz?'
        ],
        'recaptcha'     => 'Doğrulama Kodu'
    ],
    'select'           => [
        'select'    => 'Seçiniz',
        'no'        => 'Hayır',
        'yes'       => 'Evet',
        'gender'    => [
            'male'   => 'Bay',
            'female' => 'Bayan'
        ],
        'marital'   => [
            1 => 'Evli',
            2 => 'Bekar'
        ],
        'blood'     => [
            0 => 'Seçiniz',
            1 => '0 RH+',
            2 => '0 RH-',
            3 => 'A Rh+',
            4 => 'A Rh-',
            5 => 'AB Rh+',
            6 => 'AB Rh-',
            7 => 'B Rh+',
            8 => 'B Rh-'
        ],
        'driver'    => [
            0 => 'Seçiniz',
            1 => 'B Sınıf',
            2 => 'C Sınıf',
            3 => 'D Sınıf',
            4 => 'E Sınıf',
            5 => 'F Sınıf'
        ],
        'skill'     => [
            0 => 'Seçiniz',
            1 => 'AMADEUS',
            2 => 'DCS',
            3 => 'Microsoft Office',
            4 => 'SAP',
            5 => 'SITA',
            6 => 'TROYA',
            7 => 'Diğer'
        ],
        'language'  => [
            'lang'  => 'Yabancı Dil',
            'speak' => 'Konuşma',
            'read'  => 'Okuma',
            'write' => 'Yazma',
            'radio' => [
                'better' => 'İyi',
                'middle' => 'Orta',
                'little' => 'Az'
            ]
        ],
        'languages' => [
            'select'  => 'Seçiniz',
            'english' => 'İngilizce',
            'german'  => 'Almanca',
            'french'  => 'Fransızca',
            'spanish' => 'İspanyolca',
            'russian' => 'Rusça'
        ],
        'skills'    => [
            'program' => 'Program',
            'level'   => 'Seviye',
            'other'   => 'Diğer Program',
            'radio'   => [
                'better' => 'Çok İyi',
                'good'   => 'İyi',
                'middle' => 'Orta',
                'little' => 'Az'
            ]
        ]
    ],
    'messages'         => [
        'notice'              => 'Yukarıda verdiğim bilgi, adres, telefon ve diğer tüm açıklamaların doğru olduğunu, işe alınmam halinde; verdiğim yanlış bilgilerden dolayı, ortaya çıkabilecek tüm sorunlardan benim sorumlu olduğumu beyan eder; böyle bir durumda şirketin tüm yasal uygulamalarını peşinen kabul ederim.',
        'success'             => 'İş Başvuru Formunu başarıyla eklendi. İncelenerek tarafınıza en kısa zamanda geri dönüş yapılacaktır.',
        'update'              => 'İş Başvuru Formunuz güncellendi',
        'user login required' => 'Üye girişi yapmanız gerekiyor.'
    ],
    'validation'       => [
    ],
    'buttons'          => [
        'create' => 'Başvuru Yap',
        'update' => 'Başvuru Güncelle'
    ]
];
