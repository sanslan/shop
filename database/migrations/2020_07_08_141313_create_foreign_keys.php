<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('staffs', function($table) {
            $table->foreign('role_id')->references('id')->on('staff_roles');
        });

        Schema::table('shop_users', function($table) {
            $table->foreign('role_id')->references('id')->on('shop_user_roles');
            $table->foreign('shop_id')->references('id')->on('shops');
        });

        Schema::table('navigations', function($table) {
            $table->foreign('role_id')->references('id')->on('staff_roles');
        });

        Schema::table('country_translates', function($table) {
            $table->foreign('country_id')->references('id')->on('countries');
        });

        Schema::table('cities', function($table) {
            $table->foreign('country_id')->references('id')->on('countries');
        });

        Schema::table('city_translates', function($table) {
            $table->foreign('city_id')->references('id')->on('cities');
        });

        Schema::table('states', function($table) {
            $table->foreign('city_id')->references('id')->on('cities');
        });

        Schema::table('state_translates', function($table) {
            $table->foreign('state_id')->references('id')->on('states');
        });

        Schema::table('schedule_week_translates', function($table) {
            $table->foreign('schedule_week_id')->references('id')->on('schedule_weeks');
        });

        Schema::table('sub_categories', function($table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('parent_id')->references('id')->on('sub_categories');
        });

        Schema::table('category_translates', function($table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('sub_category_translates', function($table) {
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
        });

        Schema::table('shops', function($table) {
            $table->foreign('status_id')->references('id')->on('shop_statuses');
            $table->foreign('account_id')->references('id')->on('accounts');
        });

        Schema::table('shop_categories', function($table) {
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('shop_branches', function($table) {
            $table->foreign('status_id')->references('id')->on('shop_branch_statuses');
            $table->foreign('sub_account_id')->references('id')->on('sub_accounts');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('schedule_start_week_id')->references('id')->on('schedule_weeks');
            $table->foreign('schedule_end_week_id')->references('id')->on('schedule_weeks');
        });

        Schema::table('shop_branch_contacts', function($table) {
            $table->foreign('branch_id')->references('id')->on('shop_branches');
        });

        Schema::table('sub_accounts', function($table) {
            $table->foreign('account_id')->references('id')->on('accounts');
        });

        Schema::table('user_addresses', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('products', function($table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('shop_branch_id')->references('id')->on('shop_branches');
        });

        Schema::table('product_translates', function($table) {
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::table('product_images', function($table) {
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::table('options', function($table) {
            $table->foreign('subcategory_id')->references('id')->on('sub_categories');
        });

        Schema::table('option_translates', function($table) {
            $table->foreign('option_id')->references('id')->on('options');
        });

        Schema::table('option_values', function($table) {
            $table->foreign('option_id')->references('id')->on('options');
        });

        Schema::table('option_value_translates', function($table) {
            $table->foreign('value_id')->references('id')->on('option_values');
        });

        Schema::table('product_options', function($table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('product_image_id')->references('id')->on('product_images');
        });

        Schema::table('product_option_values', function($table) {
            $table->foreign('product_option_id')->references('id')->on('product_options');
            $table->foreign('option_id')->references('id')->on('options');
            $table->foreign('value_id')->references('id')->on('options_values');
        });

        Schema::table('custom_option_values', function($table) {
            $table->foreign('product_option_id')->references('id')->on('product_options');
            $table->foreign('custom_option_id')->references('id')->on('custom_options');
            $table->foreign('custom_value_id')->references('id')->on('custom_values');
        });

        Schema::table('custom_option_translates', function($table) {
            $table->foreign('custom_option_id')->references('id')->on('custom_options');
        });

        Schema::table('custom_values', function($table) {
            $table->foreign('option_id')->references('id')->on('custom_options');
        });

        Schema::table('custom_value_translates', function($table) {
            $table->foreign('custom_value_id')->references('id')->on('custom_values');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreign_keys');
    }
}
