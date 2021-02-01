<?php defined('MW_INSTALLER_PATH') || exit('No direct script access allowed');



class WelcomeController extends Controller
{
public function actionIndex()
{
// start clean
$_SESSION = array();

$this->validateRequest();

if (getSession('welcome')) {
redirect('index.php?route=requirements');
}

$this->data['marketPlaces'] = $this->getMarketPlaces();

$this->data['pageHeading'] = 'Welcome';
$this->data['breadcrumbs'] = array(
'Welcome' => 'index.php?route=welcome',
);

$this->render('welcome');
}

protected function validateRequest()
{
if (!getPost('next')) {
return;
}

$licenseData = array(
'first_name' => 'null',
'last_name' => 'jungle',
'email' => 'nulljungle@gmail.com',
'market_place' => 'envato',
'purchase_code' => 'NullJungle.com',
);

setSession('license_data', $licenseData);
setSession('welcome', 1);
}

public function getMarketPlaces()
{
return array(
'envato' => 'Envato Market Places',
'mailwizz' => 'Mailwizz Website',
);
}

}