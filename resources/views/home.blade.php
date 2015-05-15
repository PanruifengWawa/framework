@extends('app')

@section('content')
  <script>
  <?php 
    $questions = $questions->toJson();
  ?>
  window.iu.data = {
    questions: <?php echo $questions; ?>,
    showProfile: <?php echo $show_profile ? 'true' : 'false'; ?>
  };
  </script>
  <div id="J_index"></div>
@endsection


@section('scripts')
  <script src="/UI/home.bundle.js"></script>
@endsection