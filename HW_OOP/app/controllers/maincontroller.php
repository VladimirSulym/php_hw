<?php


class maincontroller extends controller
{
    public function actionIndex ()
    {
        echo '<div style="background-color: aquamarine"> I am INDEX action in maincontroller </div>';
        $layout = $this->renderPage([
            'categories' => [
                ['link' => '/category/posuda', 'name' => 'Посуда'],
                ['link' => '/category/posuda', 'name' => 'Посуда'],
                ['link' => '/category/posuda', 'name' => 'Посуда'],
                ['link' => '/category/posuda', 'name' => 'Посуда'],
                ['link' => '/category/posuda', 'name' => 'Посуда'],
                ['link' => '/category/posuda', 'name' => 'Посуда'],
                ['link' => '/category/posuda', 'name' => 'Посуда']
                ]
        ]);
        echo $layout;
    }

    public function actionInfo ()
    {
        echo '<div style="background-color: #9758b1"> I am INFO action in maincontroller </div>';
    }
}