<?php

namespace frontend\models;

use yii\helpers\Url;
use Yii;

Yii::setAlias('@boxberry', 'http://api.boxberry.de/json.php');

class BoxberryApi
{
    public $token;
    public $weight; //вес в граммах
    public $target; //код пункта выдачи
    public $ordersum = 0; //cтоимость товаров без учета стоимости доставки
    public $deliverysum = 0; //заявленная ИМ стоимость доставки
    public $targetstart = '010'; //код пункта приема посылок
    public $height = 120; //высота коробки (см)
    public $width = 80; //ширина коробки (см)
    public $depth = 50; //глубина коробки (см)
    public $zip; //индекс получателя (для курьерской доставки)
    public $paysum = 0; //сумма к оплате

    public function getListCities()
    {
        $params = [
            '@boxberry',
            'token' => Yii::$app->params['boxberryToken'],
            'method' => 'ListCities',
        ];
        $url = Url::to($params, 'http');
        $handle = fopen($url, "rb");
        $contents = stream_get_contents($handle);
        fclose($handle);
        $data = json_decode($contents, true);
        if (count($data) <= 0 or isset($data[0]['err'])) {
            // если произошла ошибка и ответ не был получен:
            return $data[0]['err'];
        } else {
            // все отлично, ответ получен, теперь в массиве $data ,
            // список всех городов где есть ПВЗ в следующем формате:
            /*
            $data[0...n]=array(
           'Name'=>'Наименование города',
           'Code'=>'Код города в boxberry',
           'Prefix' => 'Префикс: г - Город, п - Поселок и т.д',
           'ReceptionLaP' => 'Прием пип',
           'DeliveryLaP' => 'Выдача пип',
           'Reception' => 'Прием МиМ',
           'ForeignReceptionReturns' => 'Прием международных возвратов',
           'Terminal' => 'Наличие терминала',
           'Kladr' => 'ИД КЛАДРа',
           'Region' => 'Регион',
           'CountryCode' => 'Код страны',
           'UniqName' => 'Составное уникальное имя',
           'District' => 'Район'
            );
            например:
            echo $data[0]['Name'];
            echo $data[5]['Code'];
            */
            $res = [];
            foreach ($data as $item){
                if($item['CountryCode'] == '643'){
                    $res[$item['Code'].','.$item['Name']] = $item['Name'];
                }
            }

            return $res;
        }
    }

    public function getListPoints($cityCode = 0)
    {
        $params = [
            '@boxberry',
            'token' => Yii::$app->params['boxberryToken'],
            'method' => 'ListPoints',
        ];
        if($cityCode){
            $params['CityCode'] = $cityCode;
        }
        $url = Url::to($params, 'http');
        $handle = fopen($url, "rb");
        $contents = stream_get_contents($handle);
        fclose($handle);
        $data = json_decode($contents, true);
        if (count($data) <= 0 or isset($data[0]['err'])) {
            // если произошла ошибка и ответ не был получен:
            echo $data[0]['err'];
        } else {
            // все отлично, ответ получен, теперь в массиве $data,
            // список всех ПВЗ в следующем формате:
            /*
            $data[0...n]=array(
            'Code'=>'Код в базе boxberry',
            'Name'=>'Наименование ПВЗ',
            'Address'=>'Полный адрес',
            'Phone'=>'Телефон или телефоны',
            'WorkSchedule'=>'График работы',
            'TripDescription'=>'Описание проезда',
            'DeliveryPeriod'=>'Срок доставки',
            'CityCode'=>'Код города в boxberry',
            'CityName'=>'Наименование города',
            'TariffZone'=>'Тарифная зона',
            'Settlement'=>'Населенный пункт',
            'Area'=>'Регион',
            'Country'=>'Страна',
            'GPS'=>'Координаты gps',
            'OnlyPrepaidOrders'=>'Если значение "Yes" - точка работает только с
           полностью оплаченными заказами',
            'Acquiring'=>'Если значение "Yes" - Есть возможность оплаты платежными
           (банковскими) картами',
            'DigitalSignature'=>'Если значение "Yes" - Подпись получателя будет
           хранится в системе boxberry в электронном виде'
            );
            например:
            echo $data[0]['Name'];
            echo $data[5]['Code'];
               }
            */

            $res = [];
            foreach ($data as $key=>$item){
                $res[$key]['id'] = $item['Code'].','.$item['Address'];
                $res[$key]['name'] = $item['Address'];
            }
            return $res;
        }
    }

    public function getBoxberryDeliveryCost($weight, $target, $zip = 0){

        $params = [
            '@boxberry',
            'token' => Yii::$app->params['boxberryToken'],
            'method' => 'DeliveryCosts',
            'weight' => $weight,
            'target' => $target,
            'ordersum' => $this->ordersum,
            'deliverysum' => $this->deliverysum,
            'targetstart' => $this->targetstart,
            'height' => $this->height,
            'width' => $this->width,
            'depth' => $this->depth,
            'zip' => $zip,
        ];
        $url = Url::to($params, 'http');
        $handle = fopen($url, "rb");
        $contents = stream_get_contents($handle);
        fclose($handle);
        $data=json_decode($contents,true);
        if(count($data)<=0 or isset($data[0]['err']))
        {
            // если произошла ошибка и ответ не был получен:
            echo $data[0]['err'];
        }
        else
        {
            print_r($data['price']);
            // все отлично, ответ получен, теперь в массиве $data,
            // цена отправки заданной посылки:
            /*
            $data['price']=30.60;
            $data['price_base']=25.60;
            $data['price_service']=5.00;
            $data['delivery_period']=1; // срок доставки.
            */
        }

    }
}