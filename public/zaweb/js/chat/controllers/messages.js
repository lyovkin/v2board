chat.controller('MessagesCtrl', function($scope, Messages) {
    $scope.app = {};

    $scope.app.BrainSocket = new BrainSocket(
        new WebSocket('ws://localhost:8081'),
        new BrainSocketPubSub()
    );

    $scope.app.BrainSocket.Event.listen('generic.event', function (msg) {
        console.log(msg);
        var message = {
            user: {
                user_name: msg.client.data.user_name
            },
            message: msg.client.data.message,
            id: msg.client.data.id
        };
        $scope.messages.push(message);
        $scope.$apply();
        $("#message_text").val('').focus();
    });

    /**
     * Create new message
     *
     * @param message
     */
    $scope.sendMessage = function(message, user) {
        Messages.sendMessage.charge({
            message: message
        }, function(data){

            $scope.app.BrainSocket.Event.listen('generic.event', function (msg) {
            });

            $scope.app.BrainSocket.message('generic.event', {
                message: message,
                user: user
            })

        });
    };

    /**
     * Get all mesages
     *
     * @param limit
     */
    $scope.getMessages = function(limit) {
        var limit = limit || 20;
        Messages.getMessages.get({
            limit: limit
        }, function(data) {
            $scope.messages = data;
        })
    };

    /**
     * Delete message
     *
     * @param id
     */
    $scope.deleteMessage = function(id) {
        Messages.deleteMessage.charge({
            id: id
        }, function(data) {
            $("[data-message-id="+id+"]").fadeOut();
        })
    }





});