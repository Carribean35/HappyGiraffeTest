<?php
class CommentsWiget extends CWidget
{
	
	public $params = array();
	
	public function run()
	{
		$this->renderContent();
	}

	protected function renderContent()
	{
		$this->render('comments', $this->params);
	}
}