@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app')
@section('title')
Чат
@stop
@section('content')
<div class="col-md-8" ng-app="chat">
	<div class="block-heading">
		<h4><span class="heading-icon"><i class="fa fa-comment"></i></span>Чат</h4>
	</div>
	<div class="chat"  ng-controller="MessagesCtrl">
		<div class="chat-log">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<span class="glyphicon glyphicon-comment"></span> Chat
				</div>
				<div class="panel-body"   ng-init="getMessages()">
					<ul class="chat-area">
						<div class="chat-body clearfix" ng-repeat="message in messages" data-message-id="[[ message.id ]]">
							<div class="header">
								<strong class="primary-font">[[ message.user.user_name ]]</strong> <small class="pull-right text-muted">
								@if(Auth::user()->hasRole('admin'))
								<a style="cursor:pointer;" ng-click="deleteMessage([[message.id]])">Удалить</a>
								@endif
								<span class="glyphicon glyphicon-time"></span>[[ message.created_at ]]</small>
							</div>
							<p>
								[[ message.message ]]
							</p>
						</div>
					</ul>
				</div>
				<div class="panel-footer">
					<div class="input-group">
						<input id="message_text" type="text" ng-model="message" class="form-control input-sm" placeholder="Сообщение" type="text">
						<span class="input-group-btn" style="vertical-align: 0px;">
							<input type="hidden" ng-init="user='{{ md5(Auth::user()->user_name) }}'">
							<button id="message_send"  ng-click="sendMessage(message, user)" class="btn btn-primary " style="margin-left: 10px">
							Отправить</button>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop