<?php
return array(
			'product/([0-9]+)'=> 'product/view/$1',
			'catalog/page-([0-9]+)'=> 'catalog/index/$1',
			'catalog'=>'catalog/index',
			'user/register'=>'user/register',
			'user/login'=>'user/login',
			'user/logout'=>'user/logout',
            // basket panel
            'basket/order'=>'basket/order',
            'basket/delete/([0-9]+)'=>'basket/delete/$1',
			'basket/addAjax/([0-9]+)'=>'basket/addAjax/$1',
			'basket'=>'basket/index',
			// category view
            'category/([0-9]+)/page-([0-9]+)'=>'catalog/category/$1/$2',
			'category/([0-9]+)'=>'catalog/category/$1',
			// cabinet view
            'cabinet/edit'=>'cabinet/edit',
			'cabinet'=>'cabinet/index',
			// contact view
            'contact'=>'site/contact',
            // product CRUD
            'evkazolinAdminka/product/create'=>'adminProduct/create',
            'evkazolinAdminka/product/update/([0-9]+)'=>'adminProduct/update/$1',
            'evkazolinAdminka/product/delete/([0-9]+)'=>'adminProduct/delete/$1',
            'evkazolinAdminka/product/page-([0-9]+)'=>'adminProduct/index/$1',
            'evkazolinAdminka/product'=>'adminProduct/index',
            // category CRUD
            'evkazolinAdminka/category/create'=>'adminCategory/create',
            'evkazolinAdminka/category/update/([0-9]+)'=>'adminCategory/update/$1',
            'evkazolinAdminka/category/delete/([0-9]+)'=>'adminCategory/delete/$1',
            'evkazolinAdminka/category'=>'adminCategory/index',
            // order CRUD
            'evkazolinAdminka/order/update/([0-9]+)'=>'adminOrder/update/$1',
            'evkazolinAdminka/order/delete/([0-9]+)'=>'adminOrder/delete/$1',
            'evkazolinAdminka/order/view/([0-9]+)'=>'adminOrder/view/$1',
            'evkazolinAdminka/order'=>'adminOrder/index',
            // Admin panel
            'evkazolinAdminka'=>'admin/index',
			''=>'site/index'
			);
?>