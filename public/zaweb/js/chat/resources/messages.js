chat.factory('Messages', function ($resource) {
    return {

        /**
         * Create message
         */
        sendMessage: $resource('/chat/messages/create', {}, {
            charge: {
                method: "PUT",
                isArray: false
            }
        }),

        /**
         * Get messages with limit
         *
         * @param limit=20
         */
        getMessages: $resource('/chat/messages/get/:limit', {limit:20}, {
            get: {
                method: "GET",
                isArray: true
            }
        }),

        deleteMessage: $resource('/chat/messages/delete/:id', {}, {
            charge: {
                method: 'DELETE',
                isArray: false
            }
        })
    }
});
