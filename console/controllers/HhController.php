<?php
namespace console\controllers;

use common\models\CsvHelper;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;
use yii\helpers\Json;
use yii\httpclient\Client;

class HhController extends Controller
{
    public function actionParseToCsv(int $olderThanDays = 30)
    {
        $client = new Client();
        $expirenceTypes = [
            'noExperience' => 'Нет опыта',
            'between1And3' => 'От 1 года до 3 лет',
            'between3And6' => 'От 3 до 6 лет',
            'moreThan6' => 'Более 6 лет',
        ];

        $rows = [];
        $rows[] = [
            'name',
            'employer name',
            'department name',
            'employer url',
            'has_test',
            'response_letter_required',
            'salary from',
            'salary to',
            'salary currency',
            'salary gross',
            'published_at',
            'created_at',
            'type name',
            'address raw',
            'schedule name',
            'snippet requirement',
            'snippet responsibility',
            'experience',
        ];

        $items = [];

        foreach (array_keys($expirenceTypes) as $expirenceType) {
            for ($day = 30; $day >= 0; $day--) {
                $dateFrom = date('Y-m-d', strtotime('-' . ($day + 1) . ' day'));
                $dateTo =   date('Y-m-d', strtotime('-' . $day. ' day'));
                for ($page=0; $page <= 19; $page++) {
                    try {
                        $response = $client->createRequest()
                            ->setMethod('GET')
                            ->setUrl('https://api.hh.ru/vacancies')
                            ->setFormat(Client::FORMAT_URLENCODED)
                            ->setData([
                                'area' => 1624,
                                'experience' => $expirenceType,
                                'page' => $page,
                                'per_page' => '100',
                                'date_from' => $dateFrom,
                                'date_to' => $dateTo,
                            ])
                            ->setOptions([
                                'timeout' => 10
                            ])
                            ->setHeaders([
                                'User-Agent' => 'PostmanRuntime/7.26.3'
                            ])
                            ->send();
                    }
                    catch (\Exception $e) {}

                    $data = Json::decode($response->getContent());
                    foreach ($data['items'] as $item) {
                        $items[$item['id']] = $item;
                        $items[$item['id']]['experience'] = $expirenceTypes[$expirenceType];
                    }

                    
                }
            }
        }

        foreach ($items as $item) {
            $rows[] = [
                $item['name'] ,
                ($item['employer']['name'] ?? '') ,
                ($item['department']['name'] ?? '') ,
                ($item['employer']['url'] ?? '') ,
                ($item['has_test'] ?? '') ,
                ($item['response_letter_required'] ?? '') ,
                ($item['salary']['from'] ?? '') ,
                ($item['salary']['to'] ?? '') ,
                ($item['salary']['currency'] ?? '') ,
                ($item['salary']['gross'] ?? '') ,
                ($item['published_at'] ?? '') ,
                ($item['created_at'] ?? '') ,
                ($item['type']['name'] ?? '') ,
                ($item['address']['raw'] ?? '') ,
                ($item['schedule']['name'] ?? '') ,
                ($item['snippet']['requirement'] ?? '') ,
                ($item['snippet']['responsibility'] ?? '') ,
                ($item['experience'] ?? '') ,
            ];
        }

        CsvHelper::writeToFile('hh_vacancies.csv', $rows);

        $this->stdout("Done\n", Console::FG_YELLOW);
    }
}
