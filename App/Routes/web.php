<?php

/**
 * ADMIN PANEL ROUTING
 */

/**
 * GET section
 */

get('Admin', 'Admin@index');
get('Admin/EditMe', 'Me@editPage');


/**
 * POST section
 */


post('Admin/EditMe/UploadImage', 'Me@uploadMyImage');
post('Admin/EditMe/MeUpdate', 'Me@update');


/**
 * Website Routes
 */

/**
 * GET Section
 */
get('/','Me@layout');

/**
 * POST Section
 */

post('addEmailNewsLetter','NewsLetter@addEmailNewsLetter');