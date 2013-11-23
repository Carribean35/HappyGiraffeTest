<?php
/**
 *
 * ImagesController class
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
class ImagesController extends EController
{
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionView($id)
	{
		$model = Images::model()->findByPk($id);
		
		$this->render('view', array('model' => $model));
	}
}