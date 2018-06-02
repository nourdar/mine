<?php


/**
 * GET section
 */
get('/', "Me@sayHello");
get('admin/{username}/{age}', "Me@showV");
get('admin/me/{id}/page/{pageNumber}/ss', 'Me@show');
get('admin/me', 'Me@editPage');
get('admin/page/{ff}', 'Me@show');

/**
 * POST section
 */

post('admin/meUpdate', 'Me@post');
post('admin/meUpdate', 'Me@post');
post('post', 'Me@post');


post('Admin/EditMe/uploadImage', 'Me@uploadMyImage');
post('test', 'Me@testUpload');
