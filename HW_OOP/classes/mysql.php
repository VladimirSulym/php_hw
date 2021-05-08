<?php


class mysql
{
    private $connect = false;
    public function connect ($bdParams = [])
    {
        $this->connect = new PDO(
            'mysql:dbname='.$bdParams['name'].';
            host='.$bdParams['host'].';
            port='.$bdParams['port'].';
            charset=utf8mb4',
            $bdParams['login'],
            $bdParams['password'],
        );
    }
    public function query ($sql)
    {
        $res = $this->connect->query($sql);
        return $res->fetch(PDO::FETCH_ASSOC);
    }

    public function querySelect ($sql)
    {
        $res = $this->connect->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);
//        $out = [];
//        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
//            $out[$row['id']]=$row;
//        }
//        return $out;
    }
}