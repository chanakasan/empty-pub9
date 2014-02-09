var FavoriteItem = Backbone.Model.extend({
    urlRoot: '/app_dev.php/api/v1/favorites',
    defaults: {
        name: '',
        url: '',
        tags: []
    }
});