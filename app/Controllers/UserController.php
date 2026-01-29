<?php

namespace App\Controllers;

use Core\Request;
use Core\Response;
use Core\Collection;
use Core\Log;
use Core\View;

class UserController
{
    public function index()
    {
        return View::render('/index.php');
    }


    public function user($response): void
    {
        Log::info(['User Data:' => $response]);
        echo "نمایش لیست کاربران";
    }

    public function show(Request $request, Response $response)
    {

        $data = $request->getBody();
        Log::info(['show controller یشفش:' => $data]);
        if (empty($data)) {
            $response->setStatusCode(404);
            return "دیتایی فرستاده نشده";
        }

        echo json_encode([
            'status' => 200,
            'data' => $data
        ]);
    }

    public function testCollection(): void
    {

        $collectionData = [1, 2, 3, 4, 5, 6];

        $collection = Collection::collect($collectionData);

        $all = $collection->all();
        Log::info(['$all data:' => $all]);
        $first = $collection->first();
        Log::info(['$first data:' => $first]);
        $added = $collection->add(7);
        Log::info([' $added data:' => $added]);

        $has = $collection->has("0");
        Log::info([' $has data:' => $has]);

        $pop = $collection->pop();
        Log::info([' $pop data:' => $pop]);

        $shift = $collection->shift();
        Log::info([' $shift data:' => $shift]);

        $mapped = $collection->map(function ($item) {
            return $item * 2;
        });
        Log::info([' $mapped data:' => $mapped]);
        $filtered = $collection->filter(function ($item) {
            return $item > 5;
        });
        Log::info([' $filtered data:' => $filtered]);
        echo json_encode([
            'status' => 200,
            'original' => $collection->all(),
        ]);
    }
}
