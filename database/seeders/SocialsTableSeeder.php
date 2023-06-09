<?php

namespace Database\Seeders;

use App\Models\Socials;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Socials::create([
        'content' => 'कपास विकास समिति खारेज गर्ने निर्णय सच्याउन सांसदहरुको माग काठमाडौं,२५ जेठ । सरकारले आगामी आर्थिक वर्षको बजेट वक्तव्य मार्फत कपास विकास समिति खारेज गर्ने घोषणा गरेपछि उक्त निर्णयको सडक देखि सदनसम्म चौतर्फी आलोचना भइरहेको छ । प्रतिनिधि सभाको बिहीबारको बैंठक... reportersnepal.com . ३ मिनेट अघि',
        'facebook_link' => 'https://www.facebook.com/',
        'youtube_link' => 'https://www.youtube.com/',
        'twitter_link' => 'https://twitter.com/',
        'status' => 'Active'
       ]);
    }
}
