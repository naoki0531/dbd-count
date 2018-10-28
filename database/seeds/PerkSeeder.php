<?php

use Illuminate\Database\Seeder;

class PerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('perks')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $names = [1 => 'しなやか', 11 => 'ダンス・ウィズ・ミー', 21 => '素早く静かに', 31 => 'ウィンドウズ・オブ・オポチュニティ',
            41 => 'セルフケア', 51 => '魂の平穏', 61 => 'ずっと一緒だ', 71 => 'アドレナリン', 81 => '絆', 91 => '都会の逃走術',
            101 => 'リーダー', 111 => '全力疾走', 121 => '警戒', 131 => 'デッドハード', 141 => '決死の一撃', 151 => 'スマートな着地',
            161 => '与えられた猶予', 171 => '鋼の意志', 181 => '共感', 191 => '血族', 201 => 'テクニシャン', 211 => '有能の証明',
            221 => 'ボイル・オーバー', 231 => 'きっとやり遂げる', 241 => '調剤学', 251 => '植物学の知識', 261 => '都会の生存術',
            271 => '凍りつく背筋', 281 => '解放', 291 => '最後の切り札', 301 => 'こそ泥の本能', 311 => 'デジャヴ', 321 => '身軽',
            331 => '予感', 341 => '陽動', 351 => '痛みも気から', 361 => '逆境魂'];
        foreach ($names as $key => $name) {
            $model = new App\Perk();
            $model->name = $name;
            $model->save();
        }
    }
}
