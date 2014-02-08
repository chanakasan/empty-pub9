var FavoriteItem = Backbone.Model.extend({
    urlRoot: '/api/v1/favorites',
    defaults: {
        name: '',
        url: '',
        tags: ''
    }
});