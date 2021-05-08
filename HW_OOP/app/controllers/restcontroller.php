<?php

include 'controller.php';
class restcontroller extends controller
{
    private $db = [
        1 => [
            'id' => '1',
            'name' => 'CPU',
            'vendor' => 'Intel',
            'model' => 'Core i7',
            'description' => 'enter arbitrary text about Intel'
        ],
        3 => [
            'id' => '3',
            'name' => 'RAM',
            'vendor' => 'Samsung',
            'model' => 'BF18',
            'description' => 'enter arbitrary text about Samsung'
        ],
        10 => [
            'id' => '10',
            'name' => 'HDD',
            'vendor' => 'Kingston',
            'model' => 'Barracuda 9',
            'description' => 'enter arbitrary text about Kingston'
        ],
    ];

    // GET  /rest
    // GET  /?controller=rest
    public function actionGet ()
    {
        echo json_encode($this->db);
    }
    // GET  /rest/10
    // GET  /?controller=rest&id=10
    public function actionView ()
    {
        echo json_encode($this->db[$_GET['id']]);
    }
    // POST /rest               | request payload (POST_DATA): {"name":"SSD","vendor":"seagate","model":"dsfg34"}
    // POST /?controller=rest   | request payload (POST_DATA): {"name":"SSD","vendor":"seagate","model":"dsfg34"}
    public function actionCreate ($requestPayload)
    {
        file_put_contents('./log.txt', $requestPayload);
//        array_push($this->db, json_decode($requestPayload, true));
        array_push($this->db, $requestPayload);
        end($this->db);
        echo json_encode($this->db);
//        echo json_encode(['id' => key($this->db)]);
    }
    // PUT  /rest/10                | request payload (POST_DATA): {"model":"Barracuda 90"}
    // PUT  /?controller=rest&id=10 | request payload (POST_DATA): {"model":"Barracuda 90"}
    public function actionUpdate ()
    {
        $data = getRequestPayload ();
        $data = json_decode($data, true);
        $this->db[$_GET['id']] = array_merge($this->db[$_GET['id']], $data);
    }
    // DELETE   /rest/10
    // DELETE   /?controller=rest&id=10
    public function actionDelete ()
    {
        unset($this->db[$_GET['id']]);
    }
}