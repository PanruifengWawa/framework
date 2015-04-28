@extends('app')

@section('content')
<script>
window.iu.data ={};
window.iu.data.question = {
  id: 1, 
  created_at: "2015-04-28 03:15:14", 
  updated_at: "2015-04-28 03:15:14", 
  content: "请问在Backbone.js中怎么创建一个Model？0", 
  user_id: 1,
  user: {
    avatar: "http://placehold.it/80x80",
    created_at: "2015-04-28 03:15:14",
    email: "test1@interu.com",
    id: 1,
    name: "John Wu",
    updated_at: "2015-04-28 03:15:14"
  },
  comments: [
    {
      id: 1,
      created_at: "2015-04-28 03:15:14",
      updated_at: "2015-04-28 03:15:14",
      content: "This is a comment! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio cupiditate repellendus hic pariatur. Vitae, omnis iure enim, repudiandae a provident quae, odit amet cupiditate ab labore quod natus sit quia.",
      user_id: 2,
      user: {
        avatar: "http://placehold.it/80x80",
        created_at: "2015-04-28 03:15:14",
        email: "test1@interu.com",
        id: 1,
        name: "John Wu",
        updated_at: "2015-04-28 03:15:14"
      },
      question_id: 1
    },
    {
      id: 2,
      created_at: "2015-04-28 03:15:14",
      updated_at: "2015-04-28 03:15:14",
      content: "Another comment! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio cupiditate repellendus hic pariatur. Vitae, omnis iure enim, repudiandae a provident quae, odit amet cupiditate ab labore quod natus sit quia.",
      user_id: 2,
      user: {
        avatar: "http://placehold.it/80x80",
        created_at: "2015-04-28 03:15:14",
        email: "test1@interu.com",
        id: 1,
        name: "John Wu",
        updated_at: "2015-04-28 03:15:14"
      },
      question_id: 1
    }
  ],
  companies: [
    {
      id: 1,
      created_at: "2015-04-28 03:15:14",
      updated_at: "2015-04-28 03:15:14",
      name: "IBM",
      email: "ibm@company.com",
      password: "e10adc3949ba59abbe56e057f20f883e",
      description: "A big company"
    }
  ]
};
</script>
<div id="J_questions-show"></div>
@endsection


@section('scripts')
<script src="/UI/questions-show.bundle.js"></script>
@endsection