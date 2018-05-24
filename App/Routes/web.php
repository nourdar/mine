<?php



get('/',"Me@sayhello");
get('admin',"Me@sayhello");
get('admin/me','Me@show');
post('admin/meUpdate','Me@post');

post('post','Me@post');
