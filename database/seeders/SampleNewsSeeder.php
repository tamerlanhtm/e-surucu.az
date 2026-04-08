<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SampleNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            [
                'category_id' => 1, // Yol xəbərləri
                'title' => 'Bakı-Quba yolunda yeni yol işarələri quraşdırıldı',
                'slug' => 'baki-quba-yolunda-yeni-yol-isareleri',
                'content' => 'Bakı-Quba magistral yolunun Sumqayıt-Xaçmaz hissəsində yeni yol nişanları və işarələr quraşdırılıb. Yol Hərəkəti Təhlükəsizliyi Agentliyinin məlumatına görə, bu tədbirlər yol hərəkətinin təhlükəsizliyini artırmaq məqsədilə həyata keçirilib. Sürücülər yeni quraşdırılmış nişanlara diqqətlə yanaşmalı və yol qaydalarına riayət etməlidirlər.',
                'published_at' => now()->subDays(2),
            ],
            [
                'category_id' => 2, // Qanun dəyişikliyi
                'title' => 'Yol hərəkəti qaydalarına yeni dəyişikliklər edildi',
                'slug' => 'yol-hereketi-qaydalarina-yeni-deyisiklikler',
                'content' => 'Azərbaycan Respublikasının Yol Hərəkəti Qaydalarına yeni dəyişikliklər edilib. Dəyişikliklərə əsasən, sürücülər üçün təhlükəsizlik kəməri taxmaq məcburiyyəti daha da sərtləşdirilib. Həmçinin, mobil telefondan istifadə zamanı cərimə məbləği artırılıb. Yeni qaydalar yanvarın 15-dən qüvvəyə minəcək.',
                'published_at' => now()->subDays(5),
            ],
            [
                'category_id' => 3, // Təhlükəsizlik
                'title' => 'Qış mövsümündə sürücülərə vacib məsləhətlər',
                'slug' => 'qis-movsumunde-suruculere-meslehetler',
                'content' => 'Qış mövsümü yaxınlaşdıqca sürücülər əlavə ehtiyatlı olmalıdırlar. Yol Polisi sürücülərə qarışıq və buzlu yollarda sürət limitlərini azaltmağı, təkərlərin vəziyyətini yoxlamağı və avtomobilin qış mövsümünə hazır olmasını təmin etməyi tövsiyə edir. Həmçinin uzun məsafələrə gedərkən yol şəraiti haqqında məlumat almaq vacibdir.',
                'published_at' => now()->subDays(1),
            ],
            [
                'category_id' => 4, // Məsləhətlər
                'title' => 'Sürücülük imtahanına necə hazırlaşmaq olar?',
                'slug' => 'suruculuk-imtahani-hazirliq',
                'content' => 'Sürücülük vəsiqəsi almaq istəyənlər üçün imtahana düzgün hazırlıq çox vacibdir. Mütəxəssislər nəzəri hissəni öyrənməkdən əlavə, praktik məşğələlərə də vaxt ayırmağı tövsiyə edirlər. Yol nişanlarını əzbər bilmək, hərəkət qaydalarını başa düşmək və avtomobilin idarə edilməsi bacarıqlarını inkişaf etdirmək uğurun açarıdır.',
                'published_at' => now()->subDays(3),
            ],
            [
                'category_id' => 1, // Yol xəbərləri
                'title' => 'Paytaxtda yeni parklanma zonaları yaradılır',
                'slug' => 'paytaxtda-yeni-parklanma-zonalari',
                'content' => 'Bakı şəhərinin mərkəzi hissələrində yeni parklanma zonaları yaradılır. Nəqliyyat Agentliyinin məlumatına görə, bu il 50-dən çox yeni parklanma sahəsi istifadəyə veriləcək. Parklanma qaydalarının pozulması hallarında cərimələr tətbiq olunacaq.',
                'published_at' => now()->subDays(4),
            ],
            [
                'category_id' => 3, // Təhlükəsizlik
                'title' => 'Gecə vaxtı sürət limitlərinə riayət edilməsi vacibdir',
                'slug' => 'gece-vaxtı-suret-limitleri',
                'content' => 'Yol Polisinin statistikasına görə, qəzaların böyük hissəsi gecə saatlarında baş verir. Sürücülər gecə vaxtı daha ehtiyatlı olmalı, sürət limitlərinə riayət etməli və uzaq işıqlardan düzgün istifadə etməlidirlər. Yorğun olduqda sükan arxasında əyləşmək qadağandır.',
                'published_at' => now()->subHours(12),
            ],
            [
                'category_id' => 2, // Qanun dəyişikliyi
                'title' => 'Elektromobillər üçün yeni güzəştlər tətbiq edilir',
                'slug' => 'elektromobiller-ucun-guzestler',
                'content' => 'Azərbaycan hökuməti elektromobil istifadəçiləri üçün yeni güzəştlər paketi təqdim edib. Yeni qaydalar çərçivəsində elektromobil sahibləri yol vergisindən azad olunacaq və xüsusi parklanma yerləri əldə edəcəklər. Bu tədbirlər ekoloji nəqliyyata keçidi sürətləndirmək məqsədi daşıyır.',
                'published_at' => now()->subDays(6),
            ],
            [
                'category_id' => 4, // Məsləhətlər
                'title' => 'Avtomobilin texniki baxışı nə vaxt keçirilməlidir?',
                'slug' => 'texniki-baxis-qaydalari',
                'content' => 'Azərbaycanda bütün nəqliyyat vasitələri mütəmadi olaraq texniki baxışdan keçməlidir. Yeni avtomobillər ilk 3 il ərzində texniki baxışdan azaddır. 3-10 yaşlı avtomobillər hər 2 ildə bir, 10 yaşdan yuxarı olanlar isə hər il texniki baxışdan keçməlidir. Texniki baxış olmadan yollarda hərəkət etmək qadağandır və cərimə ilə nəticələnir.',
                'published_at' => now()->subDays(7),
            ],
        ];

        foreach ($news as $item) {
            \App\Models\News::create($item);
        }
    }
}
