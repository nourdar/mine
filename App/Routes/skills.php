<?php
/**
 * GET section
 */


get('Admin/EditMe/Skills', 'Skills@index');
get('Admin/EditMe/Skills/Add', 'Skills@add');
get('Admin/EditMe/Skills/Select/{id}', 'Skills@selectText');
get('Admin/EditMe/Skills/Edit/{id}', 'Skills@edit');
get('Admin/EditMe/Skills/Delete/{id}', 'Skills@delete');

/**
 * POST section
 */


post('Admin/EditMe/Skills/Insert', 'Skills@insert');
post('Admin/EditMe/Skills/update', 'Skills@update');
post('Admin/EditMe/Skills/IsShow', 'Skills@updateIsShow');

