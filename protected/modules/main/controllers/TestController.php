<?php
 
class TestController extends CController
{
    public function actionSendMail()
    {
        MailerModule::sendMail("artem-moscow@yandex.ru", "Mailer Тест", "Все пиздато");
    }


	public function actionTestDbExport() 
	{
		
	}		public function actionA(){	//Yii::import('application.components.dumpDB');		$dumper = new dumpDB();		echo $dumper->getDump();	}
}
