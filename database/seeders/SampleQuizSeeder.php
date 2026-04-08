<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SampleQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Yol nişanları questions
        $this->createQuestion(
            1,
            'Qırmızı üçbucaq formasında olan yol nişanı nəyi bildirir?',
            'Yol vermək nişanı əks istiqamətdən gələn nəqliyyat vasitələrinə üstünlük verilməsini tələb edir.',
            [
                ['text' => 'Əsas yol', 'is_correct' => false],
                ['text' => 'Yol vermək', 'is_correct' => true],
                ['text' => 'Hərəkət qadağandır', 'is_correct' => false],
                ['text' => 'Dayanma qadağandır', 'is_correct' => false],
            ]
        );

        $this->createQuestion(
            1,
            'Mavi dairəvi nişan nəyi göstərir?',
            'Mavi dairəvi nişanlar əmredici nişanlardır və müəyyən hərəkət istiqamətini göstərir.',
            [
                ['text' => 'Qadağan edici nişan', 'is_correct' => false],
                ['text' => 'Xəbərdarlıq nişanı', 'is_correct' => false],
                ['text' => 'Əmredici nişan', 'is_correct' => true],
                ['text' => 'Məlumat nişanı', 'is_correct' => false],
            ]
        );

        $this->createQuestion(
            1,
            'Qırmızı dairə içində rəqəm olan nişan nəyi bildirir?',
            'Bu nişan maksimal sürət limitini göstərir. Göstərilən sürətdən yuxarı hərəkət qadağandır.',
            [
                ['text' => 'Minimum sürət', 'is_correct' => false],
                ['text' => 'Maksimal sürət', 'is_correct' => true],
                ['text' => 'Tövsiyə olunan sürət', 'is_correct' => false],
                ['text' => 'Orta sürət', 'is_correct' => false],
            ]
        );

        // Yol hərəkəti qaydaları questions
        $this->createQuestion(
            2,
            'Şəhərdaxili ərazilərdə maksimal icazə verilən sürət neçə km/saat-dır?',
            'Şəhər daxilində ümumi sürət limiti 60 km/saat təşkil edir, bəzi yerlərdə isə xüsusi nişanlarla məhdudlaşdırıla bilər.',
            [
                ['text' => '40 km/saat', 'is_correct' => false],
                ['text' => '50 km/saat', 'is_correct' => false],
                ['text' => '60 km/saat', 'is_correct' => true],
                ['text' => '70 km/saat', 'is_correct' => false],
            ]
        );

        $this->createQuestion(
            2,
            'Piyada keçidində piyadalar yolu keçərkən sürücü nə etməlidir?',
            'Sürücü piyada keçidində piyadalara yol verməli və onların təhlükəsiz keçməsini təmin etməlidir.',
            [
                ['text' => 'Sürəti azaltmalı', 'is_correct' => false],
                ['text' => 'Dayanmalı və yol verməli', 'is_correct' => true],
                ['text' => 'Siqnal verməli', 'is_correct' => false],
                ['text' => 'Sürətlə keçməli', 'is_correct' => false],
            ]
        );

        $this->createQuestion(
            2,
            'Təhlükəsizlik kəməri taxmaq hansı hallarda məcburidir?',
            'Təhlükəsizlik kəməri həm sürücü, həm də bütün sərnişinlər tərəfindən daim taxılmalıdır.',
            [
                ['text' => 'Yalnız şəhərdən kənarda', 'is_correct' => false],
                ['text' => 'Yalnız magistral yollarda', 'is_correct' => false],
                ['text' => 'Həmişə və hər yerdə', 'is_correct' => true],
                ['text' => 'Yalnız gecə vaxtı', 'is_correct' => false],
            ]
        );

        $this->createQuestion(
            2,
            'Sarı işıq yandıqda sürücü nə etməlidir?',
            'Sarı işıq hərəkətin dayandırılacağını xəbərdarlıq edir. Sürücü təhlükəsiz dayana bilmirsə, diqqətlə davam edə bilər.',
            [
                ['text' => 'Dərhal dayanmalı', 'is_correct' => false],
                ['text' => 'Sürəti artırmalı', 'is_correct' => false],
                ['text' => 'Dayanmağa hazırlaşmalı', 'is_correct' => true],
                ['text' => 'Davam etməli', 'is_correct' => false],
            ]
        );

        // Texniki suallar questions
        $this->createQuestion(
            3,
            'Avtomobilin əyləc sisteminin əsas funksiyası nədir?',
            'Əyləc sistemi avtomobilin sürətini azaltmaq və ya tam dayandırmaq üçün nəzərdə tutulub.',
            [
                ['text' => 'Sürəti artırmaq', 'is_correct' => false],
                ['text' => 'Avtomobili dayandırmaq', 'is_correct' => true],
                ['text' => 'Sükanı idarə etmək', 'is_correct' => false],
                ['text' => 'Mühərriki işə salmaq', 'is_correct' => false],
            ]
        );

        $this->createQuestion(
            3,
            'Mühərrikin yağ səviyyəsi nə vaxt yoxlanılmalıdır?',
            'Yağ səviyyəsi avtomobil soyuq olduqda, düz səth üzərində yoxlanılmalıdır.',
            [
                ['text' => 'Mühərrik işləyərkən', 'is_correct' => false],
                ['text' => 'Mühərrik soyuq olduqda', 'is_correct' => true],
                ['text' => 'Yalnız texniki xidmətdə', 'is_correct' => false],
                ['text' => 'Hər gün', 'is_correct' => false],
            ]
        );

        $this->createQuestion(
            3,
            'Təkərlərin hava təzyiqi nə vaxt yoxlanılmalıdır?',
            'Təkərlərin təzyiqi soyuq olduqda, hər ay və uzun səfərdən əvvəl yoxlanılmalıdır.',
            [
                ['text' => 'İldə bir dəfə', 'is_correct' => false],
                ['text' => 'Hər ay', 'is_correct' => true],
                ['text' => 'Yalnız zərurət olduqda', 'is_correct' => false],
                ['text' => 'Heç vaxt', 'is_correct' => false],
            ]
        );

        $this->createQuestion(
            3,
            'ABS (Anti-lock Braking System) nə üçün nəzərdə tutulub?',
            'ABS sistemi əyləcləmə zamanı təkərlərin kilidlənməsinin qarşısını alır və idarəetməni saxlayır.',
            [
                ['text' => 'Sürəti artırmaq üçün', 'is_correct' => false],
                ['text' => 'Yanacaq qənaət etmək üçün', 'is_correct' => false],
                ['text' => 'Təkərlərin kilidlənməsinin qarşısını almaq üçün', 'is_correct' => true],
                ['text' => 'Mühərriki soyutmaq üçün', 'is_correct' => false],
            ]
        );

        $this->createQuestion(
            2,
            'Mobil telefondan sükan arxasında istifadə etmək icazəlidirmi?',
            'Sükan arxasında mobil telefondan hands-free cihazı olmadan istifadə etmək qəti qadağandır.',
            [
                ['text' => 'Bəli, qısa zəng üçün', 'is_correct' => false],
                ['text' => 'Xeyr, qəti qadağandır', 'is_correct' => true],
                ['text' => 'Yalnız dayanarkən', 'is_correct' => false],
                ['text' => 'Yalnız yüngül sürətdə', 'is_correct' => false],
            ]
        );

        $this->createQuestion(
            1,
            'Üçbucaq formasında qırmızı çərçivəli nişan nəyi bildirir?',
            'Bu xəbərdarlıq nişanıdır və sürücünü qabaqda potensial təhlükə olduğu barədə məlumatlandırır.',
            [
                ['text' => 'Qadağan edici nişan', 'is_correct' => false],
                ['text' => 'Xəbərdarlıq nişanı', 'is_correct' => true],
                ['text' => 'Məlumat nişanı', 'is_correct' => false],
                ['text' => 'Əmredici nişan', 'is_correct' => false],
            ]
        );
    }

    private function createQuestion($categoryId, $questionText, $explanation, $answers)
    {
        $question = \App\Models\Question::create([
            'category_id' => $categoryId,
            'question_text' => $questionText,
            'explanation' => $explanation,
        ]);

        foreach ($answers as $answer) {
            \App\Models\Answer::create([
                'question_id' => $question->id,
                'answer_text' => $answer['text'],
                'is_correct' => $answer['is_correct'],
            ]);
        }
    }
}
