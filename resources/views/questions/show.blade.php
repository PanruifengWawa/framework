<<<<<<< HEAD
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/27
 * Time: 10:01
 */

@extends('app')

@section('content')
<script>
window.iu.data ={};
window.iu.data.question = <?php echo $question; ?>
</script>
<div id="J_questions-show"></div>
@endsection


@section('scripts')
<script src="/UI/questions-show.bundle.js"></script>
@endsection

