window.Favorites = Backbone.Collection.extend({
    comparator: 'name',
    model: FavoriteItem,
    url: '/app_dev.php/api/v1/favorites'
});