<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\QuestionCategory;
use App\Models\UserQuestionResult;
use Illuminate\Database\Seeder;

class QuizDataSeeder extends Seeder
{
    public function run(): void
    {
        // Delete all existing quiz data
        UserQuestionResult::truncate();
        Answer::truncate();
        Question::truncate();
        QuestionCategory::truncate();

        // Create the two categories
        $category1 = QuestionCategory::create([
            'name' => 'Qanunvericilik, Təchizat və Cərimələr',
            'slug' => 'qanunvericilik-techizat-cerimeler',
        ]);

        $category2 = QuestionCategory::create([
            'name' => 'Yol Hərəkəti Qaydaları və Xüsusi Nəqliyyat Vasitələri',
            'slug' => 'yol-hereketi-qaydalari-xususi-neqliyyat',
        ]);

        // Quiz Part 1 - 50 questions
        $quizPart1 = [
            [
                'id' => 1,
                'question' => '"Yol hərəkətinin təşkili" nədir?',
                'options' => [
                    'A' => 'Nəqliyyat vasitələrinin köməyi ilə hərəkət prosesində yaranan ictimai münasibətlərin məcmusu.',
                    'B' => 'Nəqliyyat vasitələrinin və ya piyadaların təhlükəsizliyini, fasiləsiz və rahat hərəkətini, optimal sürətini təmin etmək məqsədilə küçə-yol şəbəkəsində həyata keçirilən mühəndis və təşkilati tədbirlər sistemi.',
                    'C' => 'Bir dövlətin fiziki və ya hüquqi şəxsinə məxsus nəqliyyat vasitəsinin başqa dövlətin ərazisində iştirak etdiyi hərəkət.',
                    'D' => 'Yol hərəkəti iştirakçılarının yol-nəqliyyat hadisələrindən müdafiə olunma dərəcəsi.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 2,
                'question' => 'Avtomagistrallarda xüsusi istirahət yerləri və dayanacaq meydançaları ən çox nə qədər məsafədən bir təchiz edilir?',
                'options' => [
                    'A' => 'Hər 100 kilometrdən.',
                    'B' => 'Hər 10 kilometrdən.',
                    'C' => 'Hər 50 kilometrdən çox olmayan məsafədə.',
                    'D' => 'Hər 75 kilometrdən.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 3,
                'question' => 'Maksimal konstruksiya sürəti saatda 50 kilometrdən yüksək olmayan və iş həcmi 50 kub santimetrdən çox olmayan mühərriklə hərəkətə gətirilən iki və ya üç təkərli nəqliyyat vasitəsi necə adlanır?',
                'options' => [
                    'A' => 'Motosiklet.',
                    'B' => 'Trisikl.',
                    'C' => 'Moped.',
                    'D' => 'Velosiped.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 4,
                'question' => 'Kiçik elektrik nəqliyyat vasitəsinin sürücüsüz maksimum kütləsi nə qədər olmalıdır?',
                'options' => [
                    'A' => '35 kq.',
                    'B' => '400 kq.',
                    'C' => '750 kq.',
                    'D' => '55 kq.',
                ],
                'answer' => 'D',
            ],
            [
                'id' => 5,
                'question' => '"Nəqliyyat vasitəsinin durması" zamanı hərəkətsiz vəziyyətə gətirilməsi hansı səbəblərdən başqa səbəblərdəndir?',
                'options' => [
                    'A' => 'Yüklərin zərurəti.',
                    'B' => 'Yanacaq problemi.',
                    'C' => 'Digər yol istifadəçisi və ya hər hansı maneə ilə toqquşmanın qarşısını almaq və ya hərəkət qaydalarının göstərişlərini yerinə yetirmək səbəblərindən başqa.',
                    'D' => 'Sürücünün dincəlməyə ehtiyacı.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 6,
                'question' => '"Yol hərəkətinin təhlükəsizliyi"nin təmin edilməsinin başlıca prinsipləri sırasında insanların həyatının və sağlamlığının nədən üstünlüyü qeyd olunur?',
                'options' => [
                    'A' => 'Yol hərəkətində iştirak edən insanların məsuliyyətindən.',
                    'B' => 'Təsərrüfat fəaliyyətinin iqtisadi nəticələrindən.',
                    'C' => 'Nəqliyyat vasitələrinin texniki göstəricilərindən.',
                    'D' => 'Dövlətin məsuliyyətindən.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 7,
                'question' => 'Mexaniki nəqliyyat vasitələrinə (istehsal olunduqları vaxtdan VI hissənin 1-ci bəndində göstərilənlər istisna olmaqla) neçə il keçdikdə iki ildə bir dəfə texniki baxış keçirilir?',
                'options' => [
                    'A' => '1 ildən sonra.',
                    'B' => '2 ildən sonra.',
                    'C' => '3 ildən sonra.',
                    'D' => '4 ildən sonra.',
                ],
                'answer' => 'D',
            ],
            [
                'id' => 8,
                'question' => 'Avtobuslara, icazə verilən maksimum kütləsi 3,5 tondan artıq olan yük avtonəqliyyat vasitələrinə və təhlükəli yüklərin daşınması üçün xüsusi təyinatlı nəqliyyat vasitələrinə texniki baxış hansı müddətdə keçirilir?',
                'options' => [
                    'A' => 'Altı ayda bir dəfə.',
                    'B' => 'İldə bir dəfə.',
                    'C' => 'İki ildə bir dəfə.',
                    'D' => 'Texniki vəziyyətdən asılı olaraq.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 9,
                'question' => 'Nəqliyyat vasitəsinin növbəti texniki baxışının keçiriləcəyi gündən neçə gün ərzində texniki baxışdan keçirilməməsi Azərbaycan Respublikasının İnzibati Xətalar Məcəlləsi ilə məsuliyyətə səbəb olur?',
                'options' => [
                    'A' => '10 gün.',
                    'B' => '15 gün.',
                    'C' => '20 gün.',
                    'D' => '30 gün.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 10,
                'question' => 'Nəqliyyat vasitəsini "Yol hərəkəti haqqında" Azərbaycan Respublikasının Qanunu ilə müəyyən edilmiş müddətdə texniki baxışdan keçirmədən idarə etməyə görə cərimə məbləği nə qədərdir?',
                'options' => [
                    'A' => 'On manat.',
                    'B' => 'İyirmi manat.',
                    'C' => 'Əlli manat.',
                    'D' => 'Yüz manat.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 11,
                'question' => 'Nəqliyyat vasitəsinin qeydiyyat şəhadətnaməsinin verilməsi üçün sahibindən rüsum ödənişi tələb olunurmu?',
                'options' => [
                    'A' => 'Tələb olunmur, bu dövlət xidmətidir.',
                    'B' => 'Yalnız təkrar qeydiyyat üçün tələb olunur.',
                    'C' => 'Bəli, Azərbaycan Respublikasının qanunvericiliyi ilə müəyyən edilmiş məbləğdə dövlət rüsumu ödənilir.',
                    'D' => 'Yalnız xarici vətəndaşlar üçün tələb olunur.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 12,
                'question' => 'Vərəsəlik üzrə alınan nəqliyyat vasitələri istisna olmaqla, nəqliyyat vasitələri kimin adına qeydiyyata alınır?',
                'options' => [
                    'A' => '14 yaşına çatmış fiziki şəxslərin adına.',
                    'B' => '18 yaşına çatmış fiziki şəxslərin adına.',
                    'C' => '20 yaşına çatmış fiziki şəxslərin adına.',
                    'D' => 'Yaş məhdudiyyəti yoxdur.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 13,
                'question' => 'Mexaniki nəqliyyat vasitələrinin sahibləri onları əldə etdikləri vaxtdan neçə gün ərzində dövlət qeydiyyatından keçirməli və daimi uçota aldırmalıdırlar?',
                'options' => [
                    'A' => 'Üç gün.',
                    'B' => 'Beş gün.',
                    'C' => 'On gün.',
                    'D' => 'Bir ay.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 14,
                'question' => 'Yol hərəkəti qaydaları üzrə nəzəri və nəqliyyat vasitələrini idarəetmə vərdişləri üzrə təcrübi imtahanları müvəffəqiyyətlə vermiş şəxslərə sürücülük vəsiqəsi nə qədər müddətdə verilir?',
                'options' => [
                    'A' => 'Bir iş günü.',
                    'B' => '30 dəqiqə.',
                    'C' => 'Üç gün.',
                    'D' => 'Beş gün.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 15,
                'question' => '"A1" altkateqoriyasına daxil olan nəqliyyat vasitələrini idarəetmə hüququ hansı yaşdan yaranır?',
                'options' => [
                    'A' => '14 yaşdan.',
                    'B' => '16 yaşdan.',
                    'C' => '18 yaşdan.',
                    'D' => '19 yaşdan.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 16,
                'question' => '"D" kateqoriyasına daxil olan nəqliyyat vasitələrini (avtobuslar) idarəetmə hüququ hansı yaşdan (və neçə yaşadək) yaranır?',
                'options' => [
                    'A' => '18 yaşdan (65 yaşadək).',
                    'B' => '21 yaşdan (65 yaşadək).',
                    'C' => '23 yaşdan (65 yaşadək).',
                    'D' => '25 yaşdan (65 yaşadək).',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 17,
                'question' => 'Yaşayış zonalarında (yaşayış məntəqəsinin 5.51 və 5.52 nişanları ilə işarələnmiş hissəsi) maksimum hansı sürətlə hərəkət etmək olar?',
                'options' => [
                    'A' => 'Saatda 60 km-dən çox olmayan sürətlə.',
                    'B' => 'Saatda 20 km-dən çox olmayan sürətlə.',
                    'C' => 'Saatda 10 km-dən çox olmayan sürətlə.',
                    'D' => 'Sürət məhdudiyyəti yoxdur.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 18,
                'question' => 'Avtomagistrallarda minik avtomobilləri hansı sürət həddi ilə hərəkət edə bilərlər?',
                'options' => [
                    'A' => 'Saatda 90 km-dən çox olmayan sürətlə.',
                    'B' => 'Saatda 110 km-dən çox olmayan sürətlə.',
                    'C' => 'Saatda 120 km-dən çox olmayan sürətlə.',
                    'D' => 'Saatda 100 km-dən çox olmayan sürətlə.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 19,
                'question' => 'Nəqliyyat vasitəsini idarə edən şəxsin sənədlərinin yoxlanılması məqsədilə, yol hərəkəti təhlükəsizliyinə nəzarəti həyata keçirən orqanın əməkdaşı onu yalnız harada dayandıra bilər?',
                'options' => [
                    'A' => 'Yolayrıcında.',
                    'B' => 'Stasionar postlarda.',
                    'C' => 'Hərəkət zamanı istənilən yerdə.',
                    'D' => 'Svetoforun qarşısında.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 20,
                'question' => 'Yol hərəkəti təhlükəsizliyinin təmin edilməsi sahəsində yol hərəkəti qaydaları pozuntularının, inzibati xətaların və cinayətlərin uçotunu aparmaq kimin vəzifəsidir?',
                'options' => [
                    'A' => 'Dövlətin (MİHO).',
                    'B' => 'Yerli icra hakimiyyəti orqanlarının.',
                    'C' => 'Hüquqi şəxslərin.',
                    'D' => 'Yol hərəkəti iştirakçılarının.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 21,
                'question' => 'Nəqliyyat vasitəsinin qeydiyyat şəhadətnaməsində nəqliyyat vasitəsinin buraxılış ili və ya ilk qeydiyyatının tarixi hansı hərflə işarə olunur?',
                'options' => [
                    'A' => '"A"',
                    'B' => '"B"',
                    'C' => '"C"',
                    'D' => '"D"',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 22,
                'question' => 'Mexaniki nəqliyyat vasitəsinin sürücüsünə hansı hərəkət qadağandır?',
                'options' => [
                    'A' => 'Mühərriki söndürülmüş nəqliyyat vasitəsini ətalətlə idarə etmək.',
                    'B' => 'Yanqoşqusu olan motosikleti idarə etmək.',
                    'C' => 'Yaşayış məntəqələrindən kənarda səs siqnalından istifadə etmək.',
                    'D' => 'Yolda su olan sahələrdən keçmək.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 23,
                'question' => 'Nəqliyyat vasitəsini "Yol hərəkəti haqqında" Qanunla müəyyən edilmiş müddətdə texniki baxışdan keçirmədən idarə etməyə görə cərimə nə qədərdir?',
                'options' => [
                    'A' => 'Qırx manat.',
                    'B' => 'Səksən manat.',
                    'C' => 'Yüz manat.',
                    'D' => 'Əlli manat.',
                ],
                'answer' => 'D',
            ],
            [
                'id' => 24,
                'question' => 'Velosiped yollarında velosiped və kiçik elektrik nəqliyyat vasitələri istisna olmaqla, digər nəqliyyat vasitələrinin hərəkət etməsinə görə cərimə nə qədərdir?',
                'options' => [
                    'A' => '40 manat.',
                    'B' => '80 manat.',
                    'C' => '100 manat.',
                    'D' => '150 manat.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 25,
                'question' => 'Nəqliyyat vasitələrini idarəetmə hüququnu təsdiq edən, xarici dövlətlərin səlahiyyətli orqanları tərəfindən beynəlxalq standartlara uyğun verilmiş və etibarlıq müddəti qurtarmamış sürücülük vəsiqələri Azərbaycan Respublikasının ərazisində qüvvədədirmi?',
                'options' => [
                    'A' => 'Bəli, qüvvədədir.',
                    'B' => 'Xeyr, yalnız yerli vəsiqə qüvvədədir.',
                    'C' => 'Yalnız Azərbaycan vətəndaşları üçün qüvvədədir.',
                    'D' => 'Yalnız bir ay müddətində qüvvədədir.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 26,
                'question' => 'İcazə verilən maksimum kütləsi 3,5 tondan artıq, lakin 7,5 tondan çox olmayan avtomobilləri idarə etmək üçün hansı altkateqoriya tələb olunur?',
                'options' => [
                    'A' => 'B.',
                    'B' => 'C.',
                    'C' => 'C1.',
                    'D' => 'D1.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 27,
                'question' => 'Qoşqusunun icazə verilən maksimum kütləsi 750 kq-dan artıq olan "C" kateqoriyasından olan avtomobilləri idarə etmək üçün hansı kateqoriya tələb olunur?',
                'options' => [
                    'A' => 'C1E.',
                    'B' => 'BE.',
                    'C' => 'CE.',
                    'D' => 'D.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 28,
                'question' => 'Dövlət qeydiyyat nişanı itdikdə və ya oğurlandıqda, nəqliyyat vasitəsinin sahibi nə etməlidir?',
                'options' => [
                    'A' => 'Yeni dövlət qeydiyyat nişanının alınması üçün müvafiq icra hakimiyyəti orqanına müraciət etməlidir.',
                    'B' => 'İtmiş nişan tapılana qədər hərəkət edə bilməz.',
                    'C' => 'İtmiş nişan tapıldıqdan sonra istifadə edilə bilər.',
                    'D' => 'Polis tərəfindən axtarış başa çatana qədər gözləməlidir.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 29,
                'question' => 'Yol hərəkəti təhlükəsizliyinə nəzarəti həyata keçirən orqan tərəfindən yol hərəkəti qaydalarının pozuntusu aşkar edildikdə, əməkdaş inzibati xəta haqqında protokolu və ya qərarı nə vaxt müvafiq informasiya sistemində yerləşdirməlidir (bort-kompyuter olmadıqda)?',
                'options' => [
                    'A' => 'Növbəti gün.',
                    'B' => 'Beş gün ərzində.',
                    'C' => 'Həmin günün sonunadək.',
                    'D' => 'Bir həftə ərzində.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 30,
                'question' => 'Texniki cəhətdən nasaz olan kiçik elektrik nəqliyyat vasitəsinin operatorlar tərəfindən icarəyə (istifadəyə) verilməsinə görə cərimə məbləği nə qədərdir?',
                'options' => [
                    'A' => 'Dörd yüz manatdan altı yüz manatadək məbləğdə.',
                    'B' => 'Altı yüz manatdan min manatadək məbləğdə.',
                    'C' => 'Min beş yüz manatdan iki min manatadək məbləğdə.',
                    'D' => 'İki yüz manat.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 31,
                'question' => 'Kiçik elektrik nəqliyyat vasitələrinin operatorları icarəçiləri (istifadəçiləri) hansı xidmətlə təmin etməlidirlər?',
                'options' => [
                    'A' => 'Sığorta təminatı ilə.',
                    'B' => 'Təlim kursları ilə.',
                    'C' => 'Ödənişsiz çağrı mərkəzi xidmətləri ilə.',
                    'D' => 'GPS olmadan istifadə imkanı ilə.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 32,
                'question' => 'Əgər yollarda yol hərəkətinin təhlükəsizliyi üçün real qorxu mövcud olan təcili hal yaranarsa, nəqliyyat vasitələrinin və piyadaların hərəkətinin təşkilində dəyişiklikləri kim həyata keçirir?',
                'options' => [
                    'A' => 'Yerli icra hakimiyyəti orqanları.',
                    'B' => 'Yol hərəkəti iştirakçılarının özləri.',
                    'C' => 'Azərbaycan Respublikasının müvafiq icra hakimiyyəti orqanı.',
                    'D' => 'Yol təsərrüfatı orqanları.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 33,
                'question' => 'Mülkiyyət formasından asılı olmayaraq, yol hərəkəti sahəsində hüquqi şəxslərin hansı hərəkəti qadağandır?',
                'options' => [
                    'A' => 'Sürücülərin əmək və istirahət rejiminə nəzarət etmək.',
                    'B' => 'Yol hərəkəti qanunvericiliyi üzrə profilaktik iş aparmaq.',
                    'C' => 'Yol-nəqliyyat hadisələrinin profilaktikasını maliyyələşdirmək.',
                    'D' => 'Sürücüləri yol hərəkətinin təhlükəsizliyi tələblərini pozmağa hər hansı formada sövq etmək.',
                ],
                'answer' => 'D',
            ],
            [
                'id' => 34,
                'question' => 'Yol hərəkəti təhlükəsizliyinin təmin edilməsinin başlıca prinsipləri sırasında yol hərəkəti təhlükəsizliyinin təmin edilməsinə görə məsuliyyət kimin məsuliyyətindən üstündür?',
                'options' => [
                    'A' => 'Sürücülərin.',
                    'B' => 'Dövlətin.',
                    'C' => 'Yol hərəkətində iştirak edən insanların.',
                    'D' => 'Yol təsərrüfatı orqanlarının.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 35,
                'question' => 'Nəqliyyat vasitəsinin sahibindən onun qeydiyyata alınması üçün bu Qanunla nəzərdə tutulmuş sənədlərdən başqa digər sənədlər tələb etmək qadağandırmı?',
                'options' => [
                    'A' => 'Bəli, qadağandır.',
                    'B' => 'Yalnız xüsusi hallarda tələb edilə bilər.',
                    'C' => 'Yalnız hüquqi şəxslərdən tələb edilə bilər.',
                    'D' => 'Səlahiyyətli orqanın qərarı ilə tələb edilə bilər.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 36,
                'question' => 'Sürücülük vəsiqəsinin etibarlıq müddəti 60 və daha çox yaşı olan şəxslər üçün nə qədərdir?',
                'options' => [
                    'A' => '10 il.',
                    'B' => 'Onların 70 yaşı tamam olanadək qalan müddət.',
                    'C' => '2 il.',
                    'D' => 'Tibbi arayışda göstərilən müddət.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 37,
                'question' => '"Həkim" tanınma nişanı hansı nəqliyyat vasitələrinin qabağında və arxasında quraşdırılır?',
                'options' => [
                    'A' => 'Təcili tibbi yardım maşınlarında.',
                    'B' => 'Sürücü-həkimlərin idarə etdiyi nəqliyyat vasitələrində.',
                    'C' => 'Bütün xüsusi xidmət nəqliyyat vasitələrində.',
                    'D' => 'Yalnız tibb müəssisələrinə məxsus avtomobillərdə.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 38,
                'question' => 'Ödənişli parklanma yerlərində nəqliyyat vasitəsinin parklanmasının müddəti əlavə məlumat nişanları ilə məhdudlaşdırıla bilərmi?',
                'options' => [
                    'A' => 'Bəli, məhdudlaşdırıla bilər.',
                    'B' => 'Xeyr, məhdudlaşdırıla bilməz.',
                    'C' => 'Yalnız sutkanın qaranlıq vaxtı məhdudlaşdırılır.',
                    'D' => 'Yalnız bələdiyyələr tərəfindən təşkil edilən yerlərdə məhdudlaşdırılır.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 39,
                'question' => 'Parklanmaya görə ödəniş SMS və ya xüsusi proqram təminatında baş vermiş texniki nasazlıq səbəbindən mümkün olmadıqda, nəqliyyat vasitəsinin istifadəçisi məsuliyyət daşıyırmı?',
                'options' => [
                    'A' => 'Bəli, məsuliyyət daşıyır.',
                    'B' => 'Xeyr, məsuliyyət daşımır.',
                    'C' => 'Yalnız müddət 15 dəqiqədən artıq olduqda məsuliyyət daşıyır.',
                    'D' => 'Yalnız xüsusi proqram təminatı işləmədikdə məsuliyyət daşıyır.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 40,
                'question' => 'Kiçik elektrik nəqliyyat vasitələrinin operatorları kiçik elektrik nəqliyyat vasitələrini nə ilə təmin etməlidirlər ki, hərəkətə nəzarət olunsun?',
                'options' => [
                    'A' => 'Yanğınsöndürən balonu ilə.',
                    'B' => 'Yalnız xüsusi işıq cihazları ilə.',
                    'C' => 'Xüsusi proqram təminatı olmadan işləmə qadağası ilə.',
                    'D' => 'Qlobal məsafədən mövqe təyinetmə ("GPS") cihazı ilə.',
                ],
                'answer' => 'D',
            ],
            [
                'id' => 41,
                'question' => 'Svetoforun əsas yaşıl işığının üstünə qara konturlu ox (oxlar) çəkilmişsə, bu nəyi bildirir?',
                'options' => [
                    'A' => 'Oxun göstərdiyi istiqamətdə hərəkət qadağandır.',
                    'B' => 'Svetoforun əlavə bölməsinin olduğunu bildirir və əlavə bölmənin işığında göstəriləndən fərqlənən digər istiqamətlərdə hərəkətə icazə verir.',
                    'C' => 'Yalnız tramvaylar üçün nəzərdə tutulub.',
                    'D' => 'Yaxınlaşan qatarın olduğunu.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 42,
                'question' => 'Yol hərəkətinin nizama salınmasında istifadə olunan nizamlayıcının siqnalları və göstərişləri yol nişanlarının tələblərinə zidd olduqda, sürücülər və piyadalar hansına əməl etməlidirlər?',
                'options' => [
                    'A' => 'Svetoforun siqnallarına.',
                    'B' => 'Yol nişanlarının tələblərinə.',
                    'C' => 'Nizamlayıcının siqnallarına və göstərişlərinə.',
                    'D' => 'Nişanlama xətlərinə.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 43,
                'question' => 'Qadağan nişanlarının (3.2–3.8) qüvvəsi işarələnmiş sahədə yerləşən müəssisələrə xidmət edən nəqliyyat vasitələrinə şamil edilirmi?',
                'options' => [
                    'A' => 'Xeyr, şamil edilmir.',
                    'B' => 'Bəli, həmişə şamil edilir.',
                    'C' => 'Yalnız avtomagistrallarda şamil edilir.',
                    'D' => 'Yalnız qırmızı və ya göy sayrışan işıq yandırıldıqda şamil edilir.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 44,
                'question' => 'Yaşayış məntəqələrindən kənarda xəbərdarlıq nişanları (zərurət olmadıqda) təhlükəli sahələrin başlanğıcından neçə metr aralıda quraşdırılır?',
                'options' => [
                    'A' => '50—100 metr.',
                    'B' => '100—200 metr.',
                    'C' => '150—300 metr.',
                    'D' => '300—500 metr.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 45,
                'question' => 'Xidməti parklanma yerləri hansı yol nişanı və əlavə lövhəciklə müəyyən edilir?',
                'options' => [
                    'A' => '5.15 nişanı və 7.4.8 lövhəciyi.',
                    'B' => '5.15 nişanı və 7.5.9 lövhəciyi.',
                    'C' => '5.15 nişanı və 7.5.8 lövhəciyi.',
                    'D' => '5.14 nişanı və 7.6.1 lövhəciyi.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 46,
                'question' => 'Svetoforun və ya nizamlayıcının qadağanedici işarəsi verilərkən hərəkətin davam etdirilməsinə görə nə qədər cərimə edilir?',
                'options' => [
                    'A' => 'Qırx manat.',
                    'B' => 'Səksən manat.',
                    'C' => 'Yüz manat.',
                    'D' => 'Əlli manat.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 47,
                'question' => 'Hərəkət üçün ayrılmış yollara nəzarət etmək, hərəkət sürətinin məhdudlaşdırıldığı zonaları müəyyənləşdirmək kimin vəzifəsidir?',
                'options' => [
                    'A' => 'Dövlətin (MİHO).',
                    'B' => 'Bələdiyyələrin.',
                    'C' => 'Yol təsərrüfatı orqanlarının.',
                    'D' => 'Yol hərəkəti iştirakçılarının.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 48,
                'question' => 'Ümumi istifadədə olan nəqliyyat vasitələrinin, yaxud adamlar daşınan yük avtomobillərinin sərnişinlərlə yanacaqdoldurma məntəqəsinə daxil olmasına görə hansı məsuliyyət nəzərdə tutulur (İXM-in 327-ci maddəsinə əsasən)?',
                'options' => [
                    'A' => 'Əlli manat cərimə və 1 bal.',
                    'B' => 'Yüz manat cərimə və 3 bal.',
                    'C' => 'Qırx manat cərimə.',
                    'D' => 'Məsuliyyət yoxdur.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 49,
                'question' => 'Avtomobil yolunun hərəkət hissəsində piyadaların yolu keçməsi üçün nəzərdə tutulan sahə, yaxud mühəndis qurğusu necə adlanır?',
                'options' => [
                    'A' => 'Parklanma yeri.',
                    'B' => 'Yol çiyini.',
                    'C' => 'Piyada keçidi.',
                    'D' => 'Yolayrıcı.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 50,
                'question' => 'Piyada kimə bərabər tutulur?',
                'options' => [
                    'A' => 'Yalnız nəqliyyat vasitələrindən kənarda yol hərəkətində iştirak edən şəxslərə.',
                    'B' => 'Əlilliyi olan şəxs üçün açıq məkanda istifadə üçün mexaniki təkərli oturacaqda gedən, velosiped, kiçik elektrik nəqliyyat vasitəsi, moped və ya motosiklet aparan şəxslər də.',
                    'C' => 'Yalnız uşaq üçün araba aparan şəxslərə.',
                    'D' => 'Yalnız mal-qara ötürənlərə.',
                ],
                'answer' => 'B',
            ],
        ];

        // Quiz Part 2 - 50 questions
        $quizPart2 = [
            [
                'id' => 51,
                'question' => 'Tramvay yolları yolun hərəkət hissəsi ilə kəsişdiyi yerlərdə, onun depodan çıxması halları istisna olmaqla, tramvay relssiz nəqliyyat vasitələrinə nisbətən üstünlüyə malikdirmi?',
                'options' => [
                    'A' => 'Bəli, üstünlüyə malikdir.',
                    'B' => 'Xeyr, yalnız sağdan yaxınlaşana yol verməlidir.',
                    'C' => 'Yalnız nizamlanmayan yolayrıclarında üstünlüyə malikdir.',
                    'D' => 'Yalnız qırmızı və ya göy sayrışan işıq yandırıldıqda.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 52,
                'question' => 'Yaşayış məntəqələrində yolun sol tərəfində dayanmağa və durmağa hansı yollarda icazə verilir?',
                'options' => [
                    'A' => 'Yalnız yol çiyini olan yollarda.',
                    'B' => 'Tramvay yolu olmadıqda və ya birtərəfli hərəkət yollarında.',
                    'C' => 'Hərəkət intensivliyi az olan yollarda.',
                    'D' => 'Heç bir halda icazə verilmir.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 53,
                'question' => 'Nizamlanan piyada keçidlərində svetoforun icazə siqnalı yandırıldıqda, sürücü nə etməlidir?',
                'options' => [
                    'A' => 'Dərhal hərəkətə başlamalıdır.',
                    'B' => 'Həmin istiqamətin hərəkət hissəsindəki piyadaların yolu keçməyi başa çatdırmasına imkan verməlidir.',
                    'C' => 'Səs siqnalı verməlidir.',
                    'D' => 'Təhlükə olmadıqda hərəkəti davam etdirməlidir.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 54,
                'question' => 'Keçidi başa çatdıra bilməmiş piyadalar nəqliyyat vasitələrinin əks istiqamətli hərəkətlərini ayıran xəttin üstündə dayanıb gözləyə bilərlərmi?',
                'options' => [
                    'A' => 'Bəli, dayanıb gözləməlidirlər.',
                    'B' => 'Xeyr, dərhal hərəkət hissəsini tərk etməlidirlər.',
                    'C' => 'Yalnız nizamlayıcı olduqda icazə verilir.',
                    'D' => 'Yalnız sutkanın qaranlıq vaxtı.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 55,
                'question' => 'Avtomobil yollarının təmiri, tikintisi və ya yenidən qurulması üzrə layihələr, yol hərəkəti təhlükəsizliyi qaydalarına uyğunluğu baxımından kimin müəyyən etdiyi orqanda (qurumda) ekspertizadan keçirilməlidir?',
                'options' => [
                    'A' => 'Azərbaycan Respublikasının müvafiq icra hakimiyyəti orqanının.',
                    'B' => 'Yerli bələdiyyələrin.',
                    'C' => 'Yol təsərrüfatı orqanlarının.',
                    'D' => 'Nəqliyyat vasitələri sahiblərinin.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 56,
                'question' => 'Minik avtomobilinin arxa oturacağında uşağı saxlayan xüsusi qurğu olmadıqda, neçə yaşınadək uşaqları həmin nəqliyyat vasitələrində daşımaq qadağandır (arxa oturacaqda yanında bir nəfər böyük müşayiətçi olduğu hallar istisna olmaqla)?',
                'options' => [
                    'A' => '12 yaşınadək.',
                    'B' => '7 yaşınadək.',
                    'C' => '3 yaşınadək.',
                    'D' => '5 yaşınadək.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 57,
                'question' => 'Yaşayış məntəqələrindən kənarda avtobuslar və motosikletlər bütün yollarda saatda maksimum nə qədər sürətlə hərəkət edə bilərlər?',
                'options' => [
                    'A' => '70 km-dən çox olmayan sürətlə.',
                    'B' => '90 km-dən çox olmayan sürətlə.',
                    'C' => '100 km-dən çox olmayan sürətlə.',
                    'D' => '60 km-dən çox olmayan sürətlə.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 58,
                'question' => 'Dairəvi hərəkət təşkil olunmuş yolayrıcına daxil olan sürücü (yol nişanları ilə üstünlük müəyyən edilməmişdirsə) kimə yol verməlidir?',
                'options' => [
                    'A' => 'Sağ tərəfdən yaxınlaşan nəqliyyat vasitələrinə.',
                    'B' => 'Dairədə hərəkət edən nəqliyyat vasitələrinə.',
                    'C' => 'Yalnız sola dönən nəqliyyat vasitələrinə.',
                    'D' => 'Yalnız tramvaylara.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 59,
                'question' => 'Kiçik elektrik nəqliyyat vasitəsi sürücülərinin hərəkət yolunu kəsən piyadalara və velosipedçilərə yol vermə vəzifəsi varmı?',
                'options' => [
                    'A' => 'Bəli, yol verməlidirlər.',
                    'B' => 'Xeyr, kiçik elektrik nəqliyyat vasitəsinin üstünlüyü var.',
                    'C' => 'Yalnız yaşayış zonasında.',
                    'D' => 'Yalnız svetoforun olmadığı yerlərdə.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 60,
                'question' => 'Avtomagistrallarda icazə verilən maksimum kütləsi 3,5 tondan artıq olan yük avtomobillərinin neçənci zolaqdan sonrakılarda hərəkəti qadağandır?',
                'options' => [
                    'A' => 'Birinci zolaqdan.',
                    'B' => 'İkinci zolaqdan.',
                    'C' => 'Üçüncü zolaqdan.',
                    'D' => 'Dördüncü zolaqdan.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 61,
                'question' => 'Hansı yerdə geriyə dönmək qadağandır?',
                'options' => [
                    'A' => 'Yolayrıcının daxilində.',
                    'B' => 'Piyada keçidlərində.',
                    'C' => 'Yolun kənarında, hərəkətə maneə yaratmadıqda.',
                    'D' => 'Sola dönməyə icazə verilən bütün yerlərdə.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 62,
                'question' => 'Nəqliyyat vasitəsində hərəkət zamanı sürücüyə hansı hərəkət qadağandır?',
                'options' => [
                    'A' => 'Qəza işıq siqnalından istifadə etmək.',
                    'B' => 'Telefonu əldə saxlamaqla ondan istifadə etmək.',
                    'C' => 'Qısa müddətə uzaq işığı yandırıb xəbərdarlıq etmək.',
                    'D' => 'Yaxın işıq faralarını yandırmaq.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 63,
                'question' => 'Kiçik elektrik nəqliyyat vasitəsi sürücüsünün yaşayış zonalarında, park və həyət ərazilərində saatda maksimum hansı sürətlə hərəkət etməsi nəzərdə tutulur?',
                'options' => [
                    'A' => '10 kilometrdən çox olmayan sürətlə.',
                    'B' => '20 kilometrdən çox olmayan sürətlə.',
                    'C' => '50 kilometrdən çox olmayan sürətlə.',
                    'D' => '60 kilometrdən çox olmayan sürətlə.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 64,
                'question' => 'Piyada keçidi olmadıqda, piyadalar yolayrıclarında yolu necə keçməlidirlər?',
                'options' => [
                    'A' => 'Yalnız yeraltı keçidlərdən istifadə etməklə.',
                    'B' => 'Yolun hərəkət hissəsinin kənarından düzbucaq altında.',
                    'C' => 'Səki xətti və ya yol çiyni xətləri boyunca keçməlidirlər.',
                    'D' => 'Nizamlayıcının siqnalını gözləyərək.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 65,
                'question' => 'Nizamlayıcının sinə və arxa tərəfindən gələn nəqliyyat vasitələrinin hərəkəti qadağan olunduğu halda, sol və sağ tərəfindən gələn tramvaylar hansı istiqamətdə hərəkət edə bilərlər?',
                'options' => [
                    'A' => 'Sola və sağa.',
                    'B' => 'Yalnız sağa.',
                    'C' => 'Düzünə.',
                    'D' => 'Bütün istiqamətlərdə.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 66,
                'question' => 'Qəza dayanma nişanı nəqliyyat vasitəsinin arxa tərəfində, həmin zolaqda, nəqliyyat vasitəsindən ən azı neçə metr məsafədə quraşdırılır (ümumi tələb)?',
                'options' => [
                    'A' => '15 metr.',
                    'B' => '20 metr.',
                    'C' => '30 metr.',
                    'D' => '50 metr.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 67,
                'question' => 'Svetoforun dairəvi siqnallarından hansı hərəkətə icazə verir və bildirir ki, onun vaxtı qurtarır, tezliklə qadağan siqnalı yanacaq?',
                'options' => [
                    'A' => 'Sarı rəngli işığın yanması.',
                    'B' => 'Qırmızı rəngli işığın yanıb-sönməsi.',
                    'C' => 'Yaşıl rəngli işığın yanıb-sönməsi.',
                    'D' => 'Qırmızı və sarı rəngli işıqların eyni vaxtda yanması.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 68,
                'question' => 'Yük avtomobilinin banında daşınan adamların sayı nədən artıq olmamalıdır?',
                'options' => [
                    'A' => '8 nəfərdən.',
                    'B' => '16 nəfərdən.',
                    'C' => 'Oturmaq üçün düzəldilən yerlərin sayından.',
                    'D' => '24 nəfərdən.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 69,
                'question' => 'Yolun hərəkət hissəsinin kənarından, yol çiyninin isə torpaq örtüyünün kənarından quraşdırılmış yol nişanına qədər məsafə nə qədər olmalıdır?',
                'options' => [
                    'A' => '0,1—0,5 metr.',
                    'B' => '0,5—2,2 metr.',
                    'C' => '2,5—3,5 metr.',
                    'D' => '4—5 metr.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 70,
                'question' => '"Xidməti parklanma yeri" nədir?',
                'options' => [
                    'A' => 'Ödənişli parklanma yerlərinin 5%-i.',
                    'B' => 'Xidməti zərurətlə əlaqədar dövlət orqanlarının (qurumlarının) istifadəsində olan, dövlət orqanlarının (qurumlarının) əməkdaşlarına məxsus olan və ya "D", "T" və "FK" seriyaları üzrə dövlət qeydiyyat nişanı olan nəqliyyat vasitələrinin durması üçün ödənişsiz parklanma yeri.',
                    'C' => 'Qısa müddətli dayanmaq üçün ayrılan yer.',
                    'D' => 'Yalnız ödənişli parklanma yeri.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 71,
                'question' => 'Sürmə təlimi verən şəxsin həmin kateqoriyalı (altkateqoriyalı) nəqliyyat vasitəsini idarə etmək sahəsində ən azı neçə il sürücülük stajı olmalıdır?',
                'options' => [
                    'A' => '3 il.',
                    'B' => '5 il.',
                    'C' => '7 il.',
                    'D' => '10 il.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 72,
                'question' => 'Yedəyə alınan nəqliyyat vasitəsinin sükanı arxasında sürücü və ya müvafiq kateqoriyalı sürücülük vəsiqəsi olan başqa şəxs əyləşməlidirmi?',
                'options' => [
                    'A' => 'Bəli, əyləşməlidir.',
                    'B' => 'Yalnız tormozu saz olduqda əyləşməlidir.',
                    'C' => 'Yalnız şəhərlərarası yollarda.',
                    'D' => 'Xeyr, əyləşməsi vacib deyil, əgər sərt birləşdirici hissə istifadə olunursa.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 73,
                'question' => 'Elastik yedəyə alma zamanı birləşdirici hissəsinin hər metri nə ilə işarələnməlidir?',
                'options' => [
                    'A' => 'Qırmızı rəngli parça ilə.',
                    'B' => 'Ağ və qara zolaqlarla.',
                    'C' => 'Siqnal lövhəcikləri və ya bayraqcıqları ilə.',
                    'D' => 'Sarı rəngli işıqqaytarıcı lentlə.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 74,
                'question' => 'Siyahısı MİHO tərəfindən müəyyən edilən xəstəlikləri olan şəxslər üçün sürücülük vəsiqəsinin etibarlıq müddəti maksimum nə qədər ola bilər?',
                'options' => [
                    'A' => '10 il.',
                    'B' => '2 ildən artıq olmayan müddət (təqdim etdikləri tibbi arayışda göstərilən müddət).',
                    'C' => '5 il.',
                    'D' => '1 il.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 75,
                'question' => '"Beynəlxalq yol hərəkəti" nədir?',
                'options' => [
                    'A' => 'Azərbaycan Respublikasının hüdudlarından kənarda baş verən yol hərəkəti.',
                    'B' => 'Xüsusi nişanlarla təmin olunmuş yollarda hərəkət.',
                    'C' => 'Bir dövlətin fiziki və ya hüquqi şəxsinə məxsus olan və başqa dövlətin ərazisinə müvəqqəti gətirilərək və orada qeydiyyata alınmayan nəqliyyat vasitəsinin iştirak etdiyi yol hərəkətidir.',
                    'D' => 'Yalnız operativ nəqliyyat vasitələrinin iştirak etdiyi hərəkət.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 76,
                'question' => 'Mexaniki nəqliyyat vasitəsinin sürücüsü yol-nəqliyyat hadisəsi zamanı zərər çəkənləri özünün nəqliyyat vasitəsi ilə tibbi müəssisəyə apardıqda, hadisə yerinə qayıtmazdan əvvəl tibb müəssisəsində hansı məlumatları bildirməlidir?',
                'options' => [
                    'A' => 'Yalnız sürücülük vəsiqəsinin nömrəsini.',
                    'B' => 'Yalnız nəqliyyat vasitəsinin markasını.',
                    'C' => 'Özünün soyadını, nəqliyyat vasitəsinin qeydiyyat nömrə nişanını, şəxsiyyətini təsdiq edən sənəd və ya vəsiqəni, nəqliyyat vasitəsinin qeydiyyatı sənədini təqdim etməklə.',
                    'D' => 'Yalnız hadisənin baş verdiyi vaxtı.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 77,
                'question' => 'Kiçik elektrik nəqliyyat vasitəsi sürücülərinin, tramvay hərəkəti olan yollarda və həmin istiqamətdə hərəkət üçün birdən artıq zolağı olan yollarda hansı manevr qadağandır?',
                'options' => [
                    'A' => 'Saatda 20 km-dən yuxarı sürmək.',
                    'B' => 'Sola və ya geriyə dönmək.',
                    'C' => 'Səs siqnalından istifadə etmək.',
                    'D' => 'Yolun sağ kənar zolağı ilə hərəkət etmək.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 78,
                'question' => 'Aşağıdakı halların hansında nəqliyyat vasitəsinin yedəyə alınması qadağan edilir?',
                'options' => [
                    'A' => 'Yedəyə alan nəqliyyat vasitəsinin sükanı arxasında 2 il sürücülük təcrübəsi olduqda.',
                    'B' => 'İkitəkərli motosikletlərlə və ya onları yedəyə almaq.',
                    'C' => 'Sərt birləşdirici hissə istifadə olunduqda.',
                    'D' => 'Ümumi nəqliyyat qatarının uzunluğu 20 metrdən az olduqda.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 79,
                'question' => 'Nəqliyyat vasitəsinin sahibindən dövlət rüsumu ödənişi tələb olunan hərəkətlərdən biri hansıdır (təkrar qeydiyyat istisna olmaqla)?',
                'options' => [
                    'A' => 'Texniki baxış.',
                    'B' => 'Sürücülük vəsiqəsinin dəyişdirilməsi.',
                    'C' => 'Dövlət qeydiyyatı.',
                    'D' => 'Parklanma.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 80,
                'question' => 'Nəqliyyat vasitələrinin parklanması üçün ödəniş hansı vasitələrlə həyata keçirilir?',
                'options' => [
                    'A' => 'Yalnız nağd ödənişlə.',
                    'B' => 'SMS və ya xüsusi proqram təminatı vasitəsilə elektron qaydada.',
                    'C' => 'Yalnız parkomatlar vasitəsilə.',
                    'D' => 'Yalnız bank köçürməsi ilə.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 81,
                'question' => 'Yolun hərəkət hissəsinin kənarını göstərən və sürücüdən sağda yerləşən 1.1 və 1.2 bütöv xətlərini, nəqliyyat vasitəsini yolun çiynində dayandırmaq üçün kəsib keçməyə yol verilirmi?',
                'options' => [
                    'A' => 'Bəli, yol verilir.',
                    'B' => 'Xeyr, bütöv xətlər kəsilə bilməz.',
                    'C' => 'Yalnız yaşayış məntəqələrindən kənarda.',
                    'D' => 'Yalnız məcburi dayanma zamanı.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 82,
                'question' => 'Yol hərəkəti təhlükəsizliyi üçün nəzərdə tutulmuş məsrəflərin azaldılmasına hansı işlər zamanı qadağandır?',
                'options' => [
                    'A' => 'Yol hərəkəti təhlükəsizliyinin təmin olunması proqramlarının hazırlanması zamanı.',
                    'B' => 'Yol hərəkətinə nəzarət prosesində.',
                    'C' => 'Nəqliyyat vasitələrinin texniki baxışı zamanı.',
                    'D' => 'Avtomobil yollarının tikintisi, yenidən qurulması və təmiri zamanı.',
                ],
                'answer' => 'D',
            ],
            [
                'id' => 83,
                'question' => 'Mal-qara ötürənlərə hansı növ örtüklü yollarla mal-qaranı ötürmək qadağandır?',
                'options' => [
                    'A' => 'Asfalt və sement-beton örtüklü.',
                    'B' => 'Torpaq yollar.',
                    'C' => 'Bərk örtüklü yolların kənarı ilə.',
                    'D' => 'Dəmiryol xətləri üzərindən.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 84,
                'question' => 'Minik avtomobilinin qabaq oturacağında uşağı saxlayan xüsusi qurğu olmadıqda, neçə yaşınadək uşaqları daşımaq qadağandır?',
                'options' => [
                    'A' => '3 yaşınadək.',
                    'B' => '7 yaşınadək.',
                    'C' => '12 yaşınadək.',
                    'D' => '15 yaşınadək.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 85,
                'question' => 'Nəqliyyat vasitəsi üzərində həbs və ya yüklülük olduqda, nəqliyyat vasitəsinin utilizasiya üçün dövlət qeydiyyatı üzrə daimi uçotdan çıxarılması mümkündürmü?',
                'options' => [
                    'A' => 'Xeyr, bu, imtina səbəbidir.',
                    'B' => 'Bəli, mümkündür.',
                    'C' => 'Yalnız cərimələr ödənildikdə.',
                    'D' => 'Yalnız sığorta şirkətinin icazəsi ilə.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 86,
                'question' => 'Parklanma yerlərində hər bir nəqliyyat vasitəsinin parklanması üçün işarələnmiş yerlərin sərhədlərini pozmaqla parklanmasına yol verilirmi?',
                'options' => [
                    'A' => 'Xeyr, yol verilmir.',
                    'B' => 'Bəli, əgər bu, digər nəqliyyat vasitələrinə maneə yaratmırsa.',
                    'C' => 'Yalnız kiçik elektrik nəqliyyat vasitələri üçün.',
                    'D' => 'Yalnız gecə vaxtı.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 87,
                'question' => '"Diqqət. Hərəkət dayandırılsın" siqnalı hərəkəti qadağan etsə də, nizamlayıcı tərəfindən siqnal verilərkən yolayrıcında olan sürücülərə və piyadalara nəyə icazə verilir?',
                'options' => [
                    'A' => 'Hərəkətlərini davam etməyə.',
                    'B' => 'Yalnız düzünə getməyə.',
                    'C' => 'Yalnız geri dönməyə.',
                    'D' => 'Svetoforun yaşıl işığını gözləməyə.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 88,
                'question' => '"Yol vermək" o deməkdir ki, sürücünün hərəkəti davam etdirməsi, yenidən hərəkətə başlaması, hər hansı manevr etməsi başqa nəqliyyat vasitələrinin sürücülərini və piyadaları qəflətən nə etməyə məcbur edə biləcəyi halda, hərəkəti davam etdirməməsidir?',
                'options' => [
                    'A' => 'Sürəti artırmağa.',
                    'B' => 'Yalnız dayanmağa.',
                    'C' => 'Hərəkət istiqamətini və ya sürəti dəyişdirməyə.',
                    'D' => 'Avtomagistrala çıxmağa.',
                ],
                'answer' => 'C',
            ],
            [
                'id' => 89,
                'question' => 'Yaşayış məntəqələrindən kənarda yolun hərəkət hissəsi ilə hərəkət edən piyada hansı istiqamətdə getməlidir?',
                'options' => [
                    'A' => 'Nəqliyyat vasitələrinin hərəkəti istiqamətində.',
                    'B' => 'Nəqliyyat vasitələrinin hərəkəti istiqamətinin qarşısında.',
                    'C' => 'Yalnız yol çiyini ilə.',
                    'D' => 'İstiqamətdən asılı olmayaraq.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 90,
                'question' => 'Nəqliyyat vasitəsinin idarə edilməsi hüququ hansı yaşdan yaranır: Asma mühərrikli velosiped və moped?',
                'options' => [
                    'A' => '14 yaşdan.',
                    'B' => '16 yaşdan.',
                    'C' => '18 yaşdan.',
                    'D' => '19 yaşdan.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 91,
                'question' => 'Kiçik elektrik nəqliyyat vasitələrinin sürücülərinə sükan olduğu halda, sükanı tutmadan hərəkət etmək qadağandırmı?',
                'options' => [
                    'A' => 'Bəli, qadağandır.',
                    'B' => 'Xeyr, sükan olmadığı halda qadağandır.',
                    'C' => 'Yalnız sürət həddi 10 km/saatdan çox olduqda.',
                    'D' => 'Yalnız parklanma zamanı.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 92,
                'question' => 'Sutkanın qaranlıq vaxtı yolun işıqlandırılmayan sahəsində dayanarkən və durarkən nəqliyyat vasitəsində nə yandırılmalıdır?',
                'options' => [
                    'A' => 'Yalnız yaxın işıq faraları.',
                    'B' => 'Qabarit və ya dayanacaq işıqları.',
                    'C' => 'Duman fənərləri.',
                    'D' => 'Projektor-faralar.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 93,
                'question' => 'Nizamlayıcı nizamlanan yolayrıcında əl ilə yuxarı-aşağı hərəkətlər edərsə, bu nəyi tələb edən siqnal adlanır?',
                'options' => [
                    'A' => 'Müəyyən istiqamət üzrə hərəkət.',
                    'B' => 'Sürəti azaldın.',
                    'C' => 'Dayan.',
                    'D' => 'Sola dönmə.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 94,
                'question' => 'Qoşqusu olan yük avtomobillərində və təkərli traktorlarda (1,4 t və daha artıq yük götürən), habelə birləşdirilmiş avtobus və trolleybuslarda hansı tanınma nişanı quraşdırılır?',
                'options' => [
                    'A' => '"Avtoqatar".',
                    'B' => '"Uzunölçülü nəqliyyat vasitəsi".',
                    'C' => '"Təhlükəli yük".',
                    'D' => '"Təcrübəsiz sürücü".',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 95,
                'question' => 'Eyni əhəmiyyətli yolların kəsişdiyi yolayrıcında relssiz nəqliyyat vasitəsinin sürücüsü kimə yol verməlidir?',
                'options' => [
                    'A' => 'Soldan yaxınlaşan nəqliyyat vasitələrinə.',
                    'B' => 'Sağdan yaxınlaşan nəqliyyat vasitələrinə.',
                    'C' => 'Yalnız tramvaylara.',
                    'D' => 'Heç kimə, əgər düzünə gedirsə.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 96,
                'question' => 'Sürücülərə hansı hərəkət qadağandır?',
                'options' => [
                    'A' => 'Nəqliyyat vasitəsini onun texniki xarakteristikası üzrə müəyyən edilmiş maksimum sürətdən artıq sürmək.',
                    'B' => 'Avtomagistralda sürəti 100 km/saatdan aşağı salmaq.',
                    'C' => 'Yağış yağanda faraların yaxın işığını yandırmaq.',
                    'D' => 'Yalnız məhdudiyyətli görünmə şəraitində sərt tormozlamaq.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 97,
                'question' => 'Avtomobil yollarının tikintisi, yenidən qurulması və təmiri zamanı yol hərəkəti təhlükəsizliyi təyinatlı məsrəflərin azaldılması qadağandırmı?',
                'options' => [
                    'A' => 'Bəli, qadağandır.',
                    'B' => 'Yalnız dövlət əhəmiyyətli yollarda qadağandır.',
                    'C' => 'Xeyr, maliyyə vəsaitinə qənaət edilə bilər.',
                    'D' => 'Yalnız yerli icra hakimiyyəti orqanları bunu edə bilər.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 98,
                'question' => 'Sərnişin daşınması üçün nəzərdə tutulan və oturacaq yerlərinin sayı (sürücü oturacağından əlavə) 8-dən artıq, lakin 16-dan çox olmayan avtomobilləri idarə etmək üçün hansı altkateqoriya tələb olunur?',
                'options' => [
                    'A' => 'D.',
                    'B' => 'D1.',
                    'C' => 'C1.',
                    'D' => 'B.',
                ],
                'answer' => 'B',
            ],
            [
                'id' => 99,
                'question' => 'Kiçik elektrik nəqliyyat vasitəsinin sürücüsü ilə sərnişin daşımaq qadağandırmı?',
                'options' => [
                    'A' => 'Bəli, qadağandır.',
                    'B' => 'Yalnız uşaqlar üçün icazə verilir.',
                    'C' => 'Yalnız əlində sükan olmadığı halda qadağandır.',
                    'D' => 'Yalnız 55 kq-dan yüngül olduqda.',
                ],
                'answer' => 'A',
            ],
            [
                'id' => 100,
                'question' => 'Nəqliyyat vasitəsinin parklanmasına görə ödənişin həyata keçirilməsi mümkün olmadığı hallarda (məsələn, texniki nasazlıq səbəbindən) məlumat hara ötürülür?',
                'options' => [
                    'A' => 'Parkomatlara.',
                    'B' => 'Sığorta şirkətinə.',
                    'C' => 'Müvafiq icra hakimiyyəti orqanının müəyyən etdiyi orqanın (qurumun) müvafiq informasiya sisteminə.',
                    'D' => 'Yalnız sürücünün telefonuna.',
                ],
                'answer' => 'C',
            ],
        ];

        // Insert Part 1 questions
        foreach ($quizPart1 as $q) {
            $question = Question::create([
                'category_id' => $category1->id,
                'question_text' => $q['question'],
                'image' => null,
                'explanation' => null,
            ]);

            foreach ($q['options'] as $letter => $text) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $text,
                    'is_correct' => $letter === $q['answer'],
                ]);
            }
        }

        // Insert Part 2 questions
        foreach ($quizPart2 as $q) {
            $question = Question::create([
                'category_id' => $category2->id,
                'question_text' => $q['question'],
                'image' => null,
                'explanation' => null,
            ]);

            foreach ($q['options'] as $letter => $text) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $text,
                    'is_correct' => $letter === $q['answer'],
                ]);
            }
        }
    }
}
