<?php



get('/', "Me@sayHello");
get('admin/{username}/{age}', "Me@showV");
get('admin/me/{id}/page/{pageNumber}/ss', 'Me@show');
get('admin/me', 'Me@sayHello');
get('admin/page/{ff}', 'Me@show');
post('admin/meUpdate', 'Me@post');
post('admin/meUpdate', 'Me@post');

post('post', 'Me@post');
