<?php


/**
 * GET Section
 */



get('Admin/NewsLetter','NewsLetter@index');
get('Admin/NewsLetter/{page}','NewsLetter@page');



/**
 * POST Section
 */

post('addEmailNewsLetter','NewsLetter@addEmailNewsLetter');
