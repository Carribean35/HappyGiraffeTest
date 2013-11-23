<?php
/**
 *
 * CommentsController class
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
class CommentsController extends EController
{
	
	public function filters()
	{
		return array(
			'accessControl',
		);
	}
	
	public function accessRules()
	{
		return array(
				array('deny',
						'actions'=>array('add'),
						'users'=>array('?'),
				),
				array('allow',
						'actions'=>array('add'),
						'users'=>array('@'),
				),
		);
	}
	
	public function actionAdd() {
		if(isset($_POST['Comment'])) {
			$model = new Comments();
			$model->attributes=$_POST['Comment'];
			
			$preg_autolinks = array(
			    'pattern' => array(
			        "'[\w\+]+://[A-z0-9\.\?\+\-/_=&%#:;]+[\w/=]+'si",
			        "'([^/])(www\.[A-z0-9\.\?\+\-/_=&%#:;]+[\w/=]+)'si",
			    ),
			    'replacement' => array(
			        '<a href="$0" target="_blank" rel="nofollow">$0</a>',
			        '$1<a href="http://$2" target="_blank" rel="nofollow">$2</a>',
			));
			$search = $preg_autolinks['pattern'];
			$replace = $preg_autolinks['replacement'];
			
			$model->text = preg_replace($search, $replace, $model->text);
						
			
			$model->user_id = Yii::app()->user->id;
			if ($model->save()) {
				$model->path .= $model->id.'/';
				$model->save();
				
				if (Yii::app()->request->isAjaxRequest) {
					echo CJSON::encode(
							array('id' => $model->id,
									'name' => Yii::app()->user->name,
									'email' => Yii::app()->user->email,
									'text' => $model->text,
									'path' => $model->path,
									'module_id' => $model->module_id,
									'item_id' => $model->item_id,
									'level' => (substr_count($model->path, '/') - 2)
							)
					);
					Yii::app()->end();
				}
			}
		}
	}
	
	public function actionGetComments() {
		if(isset($_POST['module_id']) && isset($_POST['item_id'])) {
			$module_id = $_POST['module_id'];
			$item_id = $_POST['item_id'];
			$criteria=new CDbCriteria;
			$criteria->condition = 'module_id = :module_id AND item_id = :item_id';
			$criteria->params = array(':module_id' => $module_id, ':item_id' => $item_id);
			$criteria->with = array('user');
			$criteria->order = 'path';
			$comments = Comments::model()->findall($criteria);
			
			$ret = array();
			foreach($comments AS $comment) {
				$ret[] = array('id' => $comment->id,
								'name' => $comment->user->name,
								'email' => $comment->user->email,
								'text' => $comment->text,
								'path' => $comment->path,
								'module_id' => $comment->module_id,
								'item_id' => $comment->item_id,
								'level' => (substr_count($comment->path, '/') - 2),
				);
			}
			
			echo CJSON::encode(
					$ret
			);
			Yii::app()->end();
		}
	}
	
}