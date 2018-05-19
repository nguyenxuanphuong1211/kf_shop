<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(TableBrandsSeeder::class);
        $this->call(TableCategoriesSeeder::class);
        $this->call(TableBillsSeeder::class);
        $this->call(TableCustomersSeeder::class);
        $this->call(TableProductsSeeder::class);
        $this->call(TableImagesSeeder::class);
        $this->call(TableBill_detailSeeder::class);
    }
}

    class TableBrandsSeeder extends Seeder
	{
	    /**
	     * Run the database seeds.
	     *
	     * @return void
	     */
	    public function run()
	    {
	      DB::table('brands')->insert([
	        ['id' =>1, 'name' => 'Apple' , 'image' => 'defaut.png'],
	        ['id' =>2, 'name' => 'Samsung' , 'image' => 'defaut.png'],
	        ['id' =>3, 'name' => 'Sony' , 'image' => 'defaut.png'],
	        ['id' =>4, 'name' => 'LG' , 'image' => 'defaut.png'],
	        ['id' =>5, 'name' => 'Nokia' , 'image' => 'defaut.png']
	      ]);
	    }
	}


	class TableCategoriesSeeder extends Seeder
	{
	    /**
	     * Run the database seeds.
	     *
	     * @return void
	     */
	    public function run()
	    {
	      DB::table('categories')->insert([
	        ['id' =>1, 'name' => 'Laptop' ],
	        ['id' =>2, 'name' => 'tablet' ],
	        ['id' =>3, 'name' => 'smart phone' ],
	        ['id' =>4, 'name' => 'Watch'  ]
	      ]);
	    }
	}
	
	class TableBillsSeeder extends Seeder
		{
		    /**
		     * Run the database seeds.
		     *
		     * @return void
		     */
		    public function run()
		    {
		      DB::table('bills')->insert([
		        ['id' =>1, 'date_order' => '2018-12-12', 'total' => '12000000', 'order_address' => '123 park - london', 'note' => 'note message...', 'status' => '0', 'order_code' => 'ABCFDA' ],
		  
		        ['id' =>2, 'date_order' => '2018-10-12', 'total' => '13000000', 'order_address' => '123 park - london', 'note' => 'note message...', 'status' => '0', 'order_code' => 'ABCFDB' ],
		       
		        ['id' =>3, 'date_order' => '2018-11-12', 'total' => '14000000', 'order_address' => '123 park - london', 'note' => 'note message...', 'status' => '0', 'order_code' => 'ABCFDC' ],
		       
		        ['id' =>4, 'date_order' => '2018-9-12', 'total' => '15000000', 'order_address' => '123 park - london', 'note' => 'note message...', 'status' => '0', 'order_code' => 'ABCFDD' ],
		        
		        ['id' =>5, 'date_order' => '2018-7-12', 'total' => '16000000', 'order_address' => '123 park - london', 'note' => 'note message...', 'status' => '0', 'order_code' => 'ABCFDE' ]

		      ]);
		    }
		}

		class TableCustomersSeeder extends Seeder
		{
		    /**
		     * Run the database seeds.
		     *
		
		     * @return void
		     */
		    public function run()
		    {
		      DB::table('custormers')->insert([
		        ['id' =>1, 'first_name' => 'Phuong', 'last_name' => 'Nguyen', 'email' => 'admin@gmail.com', 'phone_number' => '01222222227', 'bill_id' => '1' ],
		  
		  		['id' =>2, 'first_name' => 'Phuong', 'last_name' => 'Nguyen', 'email' => 'admin@gmail.com', 'phone_number' => '01222222227', 'bill_id' => '2' ],
				
				['id' =>3, 'first_name' => 'Phuong', 'last_name' => 'Nguyen', 'email' => 'admin@gmail.com', 'phone_number' => '01222222227', 'bill_id' => '3' ],
				
				['id' =>4, 'first_name' => 'Phuong', 'last_name' => 'Nguyen', 'email' => 'admin@gmail.com', 'phone_number' => '01222222227', 'bill_id' => '4' ],
				
				['id' =>5, 'first_name' => 'Phuong', 'last_name' => 'Nguyen', 'email' => 'admin@gmail.com', 'phone_number' => '01222222227', 'bill_id' => '5' ]
		  
		        

		      ]);
		    }
		}

		class TableProductsSeeder extends Seeder
		{
		    /**
		     * Run the database seeds.
		     *
			 
		     * @return void
		     */
		    public function run()
		    {
		      DB::table('products')->insert([
		        ['id' =>1, 'name' => 'Iphone 6', 'description_detail' => 'description detail product', 'description_brief' => 'description brief product', 'hot' => '0', 'new' => '0', 'deals' =>'0', 'quantity' => '10', 'unit_price' => '14000000', 'promotion_price' =>'13500000', 'unit' => 'cay', 'brand_id'=> '1', 'category_id' =>'3' ],
			  ['id' =>2, 'name' => 'Iphone 6S', 'description_detail' => 'description detail product', 'description_brief' => 'description brief product', 'hot' => '0', 'new' => '0', 'deals' =>'0', 'quantity' => '10', 'unit_price' => '14000000', 'promotion_price' =>'13500000', 'unit' => 'cay', 'brand_id'=> '1', 'category_id' =>'3' ],
			  ['id' =>3, 'name' => 'Iphone 5', 'description_detail' => 'description detail product', 'description_brief' => 'description brief product', 'hot' => '0', 'new' => '0', 'deals' =>'0', 'quantity' => '10', 'unit_price' => '14000000', 'promotion_price' =>'13500000', 'unit' => 'cay', 'brand_id'=> '1', 'category_id' =>'3' ],
			  ['id' =>4, 'name' => 'Iphone 5S', 'description_detail' => 'description detail product', 'description_brief' => 'description brief product', 'hot' => '0', 'new' => '0', 'deals' =>'0', 'quantity' => '10', 'unit_price' => '14000000', 'promotion_price' =>'13500000', 'unit' => 'cay', 'brand_id'=> '1', 'category_id' =>'3' ],
			  ['id' =>5, 'name' => 'Iphone 7', 'description_detail' => 'description detail product', 'description_brief' => 'description brief product', 'hot' => '0', 'new' => '0', 'deals' =>'0', 'quantity' => '10', 'unit_price' => '14000000', 'promotion_price' =>'13500000', 'unit' => 'cay', 'brand_id'=> '1', 'category_id' =>'3' ]
			  
		 
		      ]);
		    }
		}

		class TableImagesSeeder extends Seeder
		{
		    /**
		     * Run the database seeds.
		     *
		     * @return void
		     */
		    public function run()
		    {
		      DB::table('images')->insert([
		        ['id' =>1, 'name' => 'default.png', 'product_id' => '1' ],
		        ['id' =>2, 'name' => 'default.png', 'product_id' => '1' ],
		        ['id' =>3, 'name' => 'default.png', 'product_id' => '1' ],
		        ['id' =>4, 'name' => 'default.png', 'product_id' => '1' ],
		        
		      ]);
		    }
		}


		class TableBill_detailSeeder extends Seeder
		{
		    /**
		     * Run the database seeds.
		     *
		     * $table->increments('id');
            $table->integer('quantity');
            $table->float('unit_price',30);

            $table->integer('bill_id')->unsigned()->nullable();
            $table->foreign('bill_id')->references('id')->on('Bills');

            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('Products');
		     * @return void
		     */
		    public function run()
		    {
		      DB::table('bill_detail')->insert([
		        
		        
		        ['id' =>4, 'quantity' => '13500000', 'unit_price' => '13500000', 'bill_id' => '1', 'product_id' => '1' ]
		        
		      ]);
		    }
		}


