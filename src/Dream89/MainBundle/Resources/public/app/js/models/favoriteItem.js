window.FavoriteItem = Backbone.Model.extend({
    idAttribute: "name",
    urlRoot: '/app_dev.php/api/v1/favorites',
    defaults: {
        name: '',
        url: '',
        tags: []
    }
});