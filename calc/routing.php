<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('credit'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('credit', 'CreditCtrl');
//Utils::addRoute('action_name', 'controller_class_name');
