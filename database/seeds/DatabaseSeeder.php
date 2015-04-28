<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('questions')->delete();
        DB::table('users')->delete();
        DB::table('positions')->delete();
        DB::table('companies')->delete();

        Eloquent::unguard();

        /* Seed user */
        $user = new App\User;
        $user->email = 'test1@interu.com';
        $user->avatar = 'http://placehold.it/80x80';
        $user->name = 'John Wu';
        $user->password = 'e10adc3949ba59abbe56e057f20f883e';
        $user->save();

        /* Seed company */
        $company = App\Company::create(array(
            'name' => 'IBM',
            'email' => 'ibm@company.com',
            'password' => 'e10adc3949ba59abbe56e057f20f883e',
            'description' => 'A big company'
        ));

        /* Seed position */
        $position = App\Position::create(array(
            'title' => 'Front-end Engineer'
        ));

        /* Seed question */
        $questions = [];
        for ( $i = 0 ; $i < 100 ; $i++ ) {
            $questions[$i] = App\Question::create(array(
                'user_id' => $user->id,
                'content' => '请问在Backbone.js中怎么创建一个Model？' . $i,
                ));
            $questions[$i]->companies()->save($company);
            $questions[$i]->positions()->save($position);
        }

        /* Seed comment */
        for ( $i = 0; $i < 5; $i ++ ) {
            $comment = App\Comment::create(array(
                'user_id' => $user->id,
                'question_id' => $questions[0]->id,
                'content' => '这是一个评论' . $i
            ));
            $comment->save();
        }
	}

}
