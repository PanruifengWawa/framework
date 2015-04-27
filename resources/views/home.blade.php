@extends('app')

@section('content')
  <script>
  <?php 
    $questions = $questions->toJson();
  ?>
  window.iu.data = {
    questions: <?php echo $questions; ?>
  };
  </script>
  <div id="J_index"></div>
@endsection


@section('scripts')
  <script src="/UI/home.bundle.js"></script>
@endsection