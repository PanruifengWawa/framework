<?php

return array(
  'title' => '职位',
  'single' => '职位',
  'model' => 'App\Position',
  'columns' => array(
    'id' => array(
      'title' => '编号'
    ),
    'title' => array(
      'title' => '名称'
    )
  ),
  'edit_fields' => array(
    'title' => array(
      'title' => '名称',
      'type' => 'text'
    )
  )
);