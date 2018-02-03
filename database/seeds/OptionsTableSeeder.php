<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
                                         [
                                             'key' => 'sitename',
                                             'value' => 'Lilishop',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'title',
                                             'value' => 'Lilishop',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'keywords',
                                             'value' => 'quan ao tre em',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'description',
                                             'value' => 'thoi trang tre em',
                                             'input' => 'textarea'
                                         ],
                                         [
                                             'key' => 'address',
                                             'value' => '3/6c Tien Lan, Ba Diem, Hoc Mon',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'phone',
                                             'value' => '0935919398',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'email',
                                             'value' => 'liam@dangngoclinh.com',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'facebook',
                                             'value' => 'lilishop',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'youtube',
                                             'value' => 'lilishop',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'twitter',
                                             'value' => 'lilishop',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'google',
                                             'value' => 'lilishop',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'copyright',
                                             'value' => 'Lilishop',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'about',
                                             'value' => '<p>Happy <a href=""><strong>Kids Life</strong></a> comes with powerful theme options, which
                            empowers you to quickly and easily build incredible store.</p>
                            <ul>
                            <li><a href=""> English Grammar Class </a></li>
                            <li><a href=""> Music class </a></li>
                            <li><a href=""> Swimming &amp; Karate </a></li>
                            <li><a href=""> Lot of HTML Styles </a></li>
                            <li><a href=""> Unique News Page Design </a></li>
                        </ul>',
                                             'input' => 'editor'
                                         ],
                                         [
                                             'key' => 'widget_1',
                                             'value' => '',
                                             'input' => 'editor'
                                         ],
                                         [
                                             'key' => 'widget_2',
                                             'value' => '',
                                             'input' => 'editor'
                                         ],
                                     ]);
    }
}
