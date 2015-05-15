<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsCompanyToUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->boolean('is_company')->default(false);
			$table->integer('company_id')
				->unsigned()
				->nullable();
			$table->foreign('company_id')
				->references('id')
				->on('companies')
				->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropForeign('users_company_id_foreign');
			$table->dropColumn(['company_id']);
			$table->dropColumn(['is_company']);
		});
	}

}
