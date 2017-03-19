angular.module('commentService', [])

    .factory('Comment', function($http) {

        return {

            //get all comments
            get : function() {
              return $http.get('/api/v1/comments');
            },


            //Save a comment
            save : function(commentData) {

                return $http({
                    method: 'POST',
                    url: '/api/v1/comments',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data: $.param(commentData)
                });
            },

            //Delete Comment
            destroy: function($id) {
                return $http.delete('/api/v1/comments/' + $id);
            }
        }
    });