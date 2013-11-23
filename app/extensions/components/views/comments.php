<h2>Комментарии</h2>
<ul class="comments" data-bind="foreach: comments">
	<li class="comment well" data-bind="css: 'level' + level">
		<div class="name" data-bind="text: name"></div>
		<div class="email" data-bind="text: email"></div>
		<div class="text" data-bind="html: text"></div>
<?php if (!Yii::app()->user->isGuest) : ?>
		<a href="#" class="pull-right" data-bind="click: $parent.answer">Ответить</a>
		<div class="answer_comment" data-bind="template: { name: 'add-template' }"></div>
<?php endif;?>
	</li>
</ul>

<?php if (!Yii::app()->user->isGuest) : ?>
<form class="clearfix">
	<textarea class="input-block-level" name="Commnet[text]"></textarea>
	<button class="btn btn-primary pull-right" data-bind="click: save" id="newComment">Комментировать</button>
</form>

<script type="text/html" id="add-template">
    <form class="clearfix">
		<textarea class="input-block-level" name="Commnet[text]"></textarea>
		<button class="btn btn-primary pull-right" data-bind="click: $parent.save" id="answerComment">Комментировать</button>
	</form>
</script>

<?php endif;?>

<script language="javascript">

	$(document).ready(function() {

		var module_id = <?php echo $module_id;?>;
		var item_id = <?php echo $item_id;?>;
		var user_id = <?php echo Yii::app()->user->isGuest ? 0 : Yii::app()->user->id;?>;

		function Comment(data) {
		    this.id = data.id;
		    this.name = data.name;
		    this.email = data.email;
		    this.text = data.text;
		    this.level = data.level;
		    this.path = data.path;
		    this.module_id = data.module_id;
		    this.item_id = data.item_id;
		}

		// Overall viewmodel for this screen, along with initial state
		function CommentsViewModel() {
		    var self = this;

		    self.comments = ko.observableArray([]);

	    	$.ajax({
				'type' : 'POST',
				'url' : '/comments/getComments/',
				'data' : {module_id : module_id, item_id : item_id},
				'dataType' : 'json',
				'success' : function(response) {
					var mappedComments = $.map(response, function(item) {	
						return new Comment(item)
					});
		       		self.comments(mappedComments);
				}
			});

			self.answer = function(parent, event) {
 				obj = $(event.target);
 				obj.parent().find(".answer_comment").show();
			}

			self.save = function(parent, event) {
		    	obj = $(event.target);
				id = obj.attr("id");

		    	$.ajax({
					'type' : 'POST',
					'url' : '/comments/add/',
					'data' : {	'Comment[module_id]' : module_id, 
								'Comment[item_id]' : item_id,
								'Comment[path]' : (id == 'newComment' ? '/' : parent.path),
								'Comment[text]' : obj.parent().find("textarea").val(),
								'Comment[parent_id]' : (id == 'newComment' ? 0 : parent.id),
								},
					'dataType' : 'json',
					'success' : function(response) {
						com = new Comment(response);
						if (id == 'newComment') {
							self.comments.push(com);
						} else {
							arr = self.comments.slice(0);
							parentIndex = self.comments.indexOf(parent);
							newIndex = -1;
							for (i = parentIndex + 1; i < arr.length; i++) {
								if (arr[parentIndex].level == arr[i].level) {
									newIndex = i;
									break;
								}
							}

							if (newIndex < 0)
								newIndex = parentIndex + 1;
							
							self.comments.splice(newIndex, 0, com);
							obj.parent().parent().hide();
							obj.parent().find("textarea").val("");
						}
					}
				});
			}

		}
	
		ko.applyBindings(new CommentsViewModel());

	})

</script>