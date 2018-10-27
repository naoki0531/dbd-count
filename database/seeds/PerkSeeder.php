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

        $names = ['しなやか', 'ダンス・ウィズ・ミー', '素早く静かに', 'ウィンドウズ・オブ・オポチュニティ', 'セルフケア', '魂の平穏', 'ずっと一緒だ', 'アドレナリン', '絆', '都会の逃走術', 'リーダー', '全力疾走', '警戒', 'デッドハード', '決死の一撃', 'スマートな着地', '与えられた猶予', '鋼の意志'
        , '共感', '血族', 'テクニシャン', '有能の証明', 'ボイル・オーバー', 'きっとやり遂げる', '調剤学'];
        foreach ($names as $name) {
            $model = new App\Perk();
            $model->name = $name;
            $model->save();
        }
    }
}
