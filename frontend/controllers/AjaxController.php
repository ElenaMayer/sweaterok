<?php
/**
 * Created by PhpStorm.
 * User: elenam
 * Date: 23.12.17
 * Time: 14:50
 */

namespace frontend\controllers;

use frontend\models\BoxberryApi;
use yii\helpers\Json;

class AjaxController extends \yii\web\Controller
{

    public $enableCsrfValidation = false;

    public function actionPoints() {

        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $city = explode(",", $parents[0]);
                $city_id = $city[0];

                $bb = new BoxberryApi();
                $out = $bb->getListPoints($city_id);
                // the getSubCatList1 function will query the database based on the
                // cat_id, param1, param2 and return an array like below:
                // [
                //    'group1'=>[
                //        ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //        ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                //    ],
                //    'group2'=>[
                //        ['id'=>'<sub-cat-id-3>', 'name'=>'<sub-cat-name3>'],
                //        ['id'=>'<sub-cat-id-4>', 'name'=>'<sub-cat-name4>']
                //    ]
                // ]


                echo Json::encode(['output'=>$out]);
                return;
            }
        }
        echo Json::encode(['output'=>'']);
    }

}