<?php


require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('sige', 'hosting', false);
sfContext::createInstance($configuration)->dispatch();
