<?php


use lesha724\youtubewidget\Youtube;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\News */
//\yii\helpers\VarDumper::dump($modelel,12,true);die();

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>


<table class="table table-striped" style="border: 1px solid black">

    <tr style="border: 1px solid black">
        <th style="border: 1px solid black" scope="row bg-dark">id</th>
        <td><?= $model->id ?></td>
    </tr>
    <tr style="border: 1px solid black">
        <th style="border: 1px solid black" scope="row bg-dark">Title uz</th>
        <td><?= $model->title_uz ?></td>

    </tr>
    <tr style="border: 1px solid black">
        <th style="border: 1px solid black" scope="row bg-dark">Title en</th>
        <td><?= $model->title_en ?></td>

    </tr>
    <tr style="border: 1px solid black">
        <th style="border: 1px solid black" scope="row bg-dark">Desc uz</th>
        <td><?= $model->desc_uz ?></td>

    </tr>
    <tr style="border: 1px solid black">
        <th style="border: 1px solid black" scope="row bg-dark">Desc en</th>
        <td><?= $model->desc_en ?></td>

    </tr>
    <tr style="border: 1px solid black">
        <th style="border: 1px solid black" scope="row bg-dark">image</th>
        <td style="height: 300px">
            <img
                    src="/uploads/storage/data/logo.jpg"
                    alt="thumb" width="200px" height="150px"
            >
        </td>


    </tr>

</table>

































































