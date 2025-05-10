<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = [
            ['name' => 'ألفا روميو', 'photo' => 'ألفا-روميو-Alfa-Romeo.webp'],
            ['name' => 'أودي', 'photo' => 'أودي-Audi.webp'],
            ['name' => 'اسوزو', 'photo' => 'اسوزو-Isuzu.webp'],
            ['name' => 'ام جي', 'photo' => 'ام-جي-Mg.webp'],
            ['name' => 'اوبل', 'photo' => 'اوبل-Opel.webp'],
            ['name' => 'بروتن', 'photo' => 'بروتن-Proton.webp'],
            ['name' => 'بي ام دبليو', 'photo' => 'بي-ام-دبليو-Bmw.webp'],
            ['name' => 'بريليانس', 'photo' => 'بريليانس-Brilliance.webp'],
            ['name' => 'بي واي دي', 'photo' => 'بي-واي-دي-Byd.webp'],
            ['name' => 'بيجو', 'photo' => 'بيجو-Peugeot.webp'],
            ['name' => 'بورش', 'photo' => 'بورش-Porsche.webp'],
            ['name' => 'تويوتا', 'photo' => 'تويوتا-Toyota.webp'],
            ['name' => 'دايو', 'photo' => 'دايو-Daewoo.webp'],
            ['name' => 'دودج', 'photo' => 'دودج-Dodge.webp'],
            ['name' => 'جيلي', 'photo' => 'جيلي-Geely.webp'],
            ['name' => 'جاكوار', 'photo' => 'جاكوار-Jaguar.webp'],
            ['name' => 'جيب', 'photo' => 'جيب-Jeep.webp'],
            ['name' => 'رينو', 'photo' => 'رينو-Renault.webp'],
            ['name' => 'سكودا', 'photo' => 'سكودا-Skoda.webp'],
            ['name' => 'سوبارو', 'photo' => 'سوبارو-Subaru.webp'],
            ['name' => 'شيفروليه', 'photo' => 'شيفروليه-Chevrolet.webp'],
            ['name' => 'ستروين', 'photo' => 'ستروين-Citroen.webp'],
            ['name' => 'فورد', 'photo' => 'فورد-Ford.webp'],
            ['name' => 'سيات', 'photo' => 'سيات-Seat.webp'],
            ['name' => 'سوزوكي', 'photo' => 'سوزوكي-Suzuki.webp'],
            ['name' => 'كرايسلر', 'photo' => 'كرايسلر-Chrysler.webp'],
            ['name' => 'كيا', 'photo' => 'كيا-Kia.webp'],
            ['name' => 'فولكس فاجن', 'photo' => 'فولكس-فاجن-Volkswagen.webp'],
            ['name' => 'فولفو', 'photo' => 'فولفو-Volvo.webp'],
            ['name' => 'لاند روفر', 'photo' => 'لاند-روفر-Land-Rover.webp'],
            ['name' => 'مازدا', 'photo' => 'مازدا-Mazda.webp'],
            ['name' => 'مرسيدس', 'photo' => 'مرسيدس-Mercedes.webp'],
            ['name' => 'ميني كوبر', 'photo' => 'ميني-كوبر-Mini-Cooper.webp'],
            ['name' => 'ميتسوبيشي', 'photo' => 'ميتسوبيشي-Mitsubishi.webp'],
            ['name' => 'نيسان', 'photo' => 'نيسان-Nissan.webp'],
            ['name' => 'هوندا', 'photo' => 'هوندا-Honda.webp'],
            ['name' => 'هامر', 'photo' => 'هامر-Hummer.webp'],
            ['name' => 'هيونداي', 'photo' => 'هيونداي-Hyundai.webp'],
            ['name' => 'رام', 'photo' => 'رام-Ram.webp'],
            ['name' => 'جي إم سي', 'photo' => 'جي-إم-سي-Gmc.webp'],
            ['name' => 'جمس', 'photo' => 'جمس-Gmc.webp'],
            ['name' => 'إنفينيتي', 'photo' => 'إنفينيتي-Infiniti.webp'],
            ['name' => 'لكزس', 'photo' => 'لكزس-Lexus.webp'],
            ['name' => 'لوتس', 'photo' => 'لوتس-Lotus.webp'],
            ['name' => 'بنتلي', 'photo' => 'بنتلي-Bentley.webp'],
            ['name' => 'رولز رويس', 'photo' => 'رولز-رويس-Rolls-Royce.webp'],
            ['name' => 'تسلا', 'photo' => 'تسلا-Tesla.webp'],
            ['name' => 'مازيراتي', 'photo' => 'مازيراتي-Maserati.webp'],
            ['name' => 'فيراري', 'photo' => 'فيراري-Ferrari.webp'],
            ['name' => 'لامبورغيني', 'photo' => 'لامبورغيني-Lamborghini.webp'],
            ['name' => 'كاديلاك', 'photo' => 'كاديلاك-Cadillac.webp'],
            ['name' => 'لنكولن', 'photo' => 'لنكولن-Lincoln.webp'],
            ['name' => 'روفر', 'photo' => 'روفر-Rover.webp'],
            ['name' => 'دايهاتسو', 'photo' => 'دايهاتسو-Daihatsu.webp'],
            ['name' => 'بوجاتي', 'photo' => 'بوجاتي-Bugatti.webp'],
            ['name' => 'كوبرا', 'photo' => 'كوبرا-Cupra.webp'],
            ['name' => 'باجاني', 'photo' => 'باجاني-Pagani.webp'],
            ['name' => 'شيري', 'photo' => 'شيري-Chery.webp'],
            ['name' => 'هافال', 'photo' => 'هافال-Haval.webp'],
            ['name' => 'جي أيه سي', 'photo' => 'جي-إيه-سي-Gac.webp'],
            ['name' => 'سانغ يونغ', 'photo' => 'سانغ-يونغ-SsangYong.webp'],
            ['name' => 'ريفيان', 'photo' => 'ريفيان-Rivian.webp'],
            ['name' => 'لوسيد', 'photo' => 'لوسيد-Lucid.webp'],
            ['name' => 'جينيسيس', 'photo' => 'جينيسيس-Genesis.webp']
        ];

        foreach ($cars as $car) {
            DB::table('cars')->insert([
                'name' => $car['name'],
                'slug' => str_replace(' ', '-', $car['name']),
                'photo' => 'images/cars/' . $car['photo'],
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
