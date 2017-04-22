<?php

class News{

    public static function getNewsItemById($id){

        $id = intval($id);

        if($id) {

//            $host = 'gvozdyak.mysql.ukraine.com.ua';
//            $dbname = 'gvozdyak_mvc';
//            $user = 'gvozdyak_mvc';
//            $password = 'p92klfh9';
//            $db = new PDO("mysql:host=$host;dbname=$dbname;", $user, $password);

            $db = Db::getConnection();

            $result = $db->query('SELECT * from news WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }

    }

    public static function getNewsList(){

//        $host = 'gvozdyak.mysql.ukraine.com.ua';
//        $dbname = 'gvozdyak_mvc';
//        $user = 'gvozdyak_mvc';
//        $password = 'p92klfh9';
//        $db = new PDO("mysql:host=$host;dbname=$dbname;", $user, $password);

        $newsList = array();

        $db = Db::getConnection();

        $result = $db->query('SELECT id, title, date, short_content '
            . 'FROM news '
            . 'ORDER BY date DESC '
            . 'LIMIT 10');

        $i = 0;

        while ($row = $result->fetch()){
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }
        return $newsList;
    }
}