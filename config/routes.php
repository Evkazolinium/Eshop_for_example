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
            'platform/([0-9]+)/page-([0-9]+)'=>'catalog/platform/$1/$2',
			'platform/([0-9]+)'=>'catalog/platform/$1',
            'genre/([0-9]+)/page-([0-9]+)'=>'catalog/genre/$1/$2',
			'genre/([0-9]+)'=>'catalog/genre/$1',
            
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
            'evkazolinAdminka/platform/create'=>'adminPlatform/create',
            'evkazolinAdminka/platform/update/([0-9]+)'=>'adminPlatform/update/$1',
            'evkazolinAdminka/platform/delete/([0-9]+)'=>'adminPlatform/delete/$1',
            'evkazolinAdminka/platform'=>'adminPlatform/index',
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