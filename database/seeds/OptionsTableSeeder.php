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
                                             'value' => '',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'title',
                                             'value' => '',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'keywords',
                                             'value' => '',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'description',
                                             'value' => '',
                                             'input' => 'textarea'
                                         ],
                                         [
                                             'key' => 'address',
                                             'value' => '',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'phone',
                                             'value' => '',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'email',
                                             'value' => '',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'facebook',
                                             'value' => '',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'youtube',
                                             'value' => '',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'twitter',
                                             'value' => '',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'google',
                                             'value' => '',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'copyright',
                                             'value' => '',
                                             'input' => 'input'
                                         ],
                                         [
                                             'key' => 'about',
                                             'value' => '',
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
