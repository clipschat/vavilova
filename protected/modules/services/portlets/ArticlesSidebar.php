<?php

class ServicesSidebar extends Portlet
{
	public function renderContent() 
	{	
		$section = ServiceSection::model()->findByAttributes(array('in_sidebar' => 1));
		if (!$section) 
		{
			return;	
		}		

		$services = Service::model()->last()->limit(3)->findAllByAttributes(array('section_id' => $section->id));
        if (!$services)
        {
            return;
        }
  
		$this->render('ServicesSidebar', array(
			'section'  => $section,
			'services' => $services
		));
	}
}
