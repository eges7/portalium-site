<?php

use portalium\menu\models\Menu;
use yii\db\Migration;
use portalium\site\models\Form;

class m010101_010102_site_menu extends Migration
{
    public function init()
    {
        $this->db = 'db';
        parent::init();
    }
    public function up()
    {

        $this->insert('menu_menu', [
            'name' => 'site',
            'slug' => 'site',
            'type' => Menu::TYPE['web']
        ]);
        $id_menu = $this->db->getLastInsertID();

        $this->insert('menu_item', [
            'id_menu' => $id_menu,
            'id_parent' => 0,
            'name_auth' => 'admin',
            'label' => 'Home',
            'data' => json_encode([
                'routeType' => 'route',
                'route' => '/site/site/index'
            ]),
            'sort' => 1
        ]);

    }

    public function down()
    {
        $this->dropTable('site_setting');
    }
}