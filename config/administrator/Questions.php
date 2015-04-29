<?php

return array(
  'title' => '问题',
  'single' => '问题',
  'model' => 'App\Question',
  'columns' => array(
    'id' => array(
      'title' => '编号'
    ),
    'content' => array(
      'title' => '内容'
    ),
    'user' => array(
      'title' => '用户',
      'relationship' => 'user',
      'select' => 'name'
    )
  ),
  'edit_fields' => array(
    'content' => array(
      'title' => '内容',
      'type' => 'text'
    ),
    'user' => array(
      'title' => '用户',
      'type' => 'relationship',
      'name_field' => 'name'
    )
  )
);