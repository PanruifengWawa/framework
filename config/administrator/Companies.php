<?php

return array(
  'title' => '公司',
  'single' => '公司',
  'model' => 'App\Company',
  'columns' => array(
    'id' => array(
      'title' => '编号'
    ),
    'name' => array(
      'title' => '名称'
    ),
    'description' => array(
      'title' => '描述'
    )
  ),
  'edit_fields' => array(
    'name' => array(
      'title' => '名称',
      'type' => 'text'
    ),
    'description' => array(
      'title' => '描述',
      'type' => 'text'
    )
  )
);