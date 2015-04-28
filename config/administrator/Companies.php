<?php

return array(
  'title' => 'Companies',
  'single' => 'company',
  'model' => 'App\Company',
  'columns' => array(
    'id',
    'name' => array(
      'title' => 'Name'
    ),
    'email'
  ),
  'edit_fields' => array(
    'name' => array(
      'title' => 'Name',
      'type' => 'text'
    )
  )
);