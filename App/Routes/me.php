<?php

/**
 * GET section
 */

get('Admin/EditMe', 'Me@editPage');



/**
 * POST section
 */


post('Admin/EditMe/UploadImage', 'Me@uploadMyImage');
post('Admin/EditMe/MeUpdate', 'Me@update');
