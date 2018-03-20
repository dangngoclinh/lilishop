<?php

namespace App\Library;

class Breadcrumbs
{
    private $data;

    public function __construct()
    {
    }

    public function addBC($name, $link, $type = true)
    {
        $this->data[] = ['name' => $name, 'link' => $link, 'type' => $type];

    }

    public function toString()
    {
        $result = '';
        foreach ($this->data as $key => $value) {
            if ($value['type']) {

                $result .= '<li><a href="' . $value['link'] . '">' . $value['name'] . '</a></li>';
            } else {
                $result .= '<li>' . $value['name'] . '</li>';
            }
        }
        return $result;
    }


}