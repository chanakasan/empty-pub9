var Favorites = Backbone.Collection.extend({
    comparator: 'name',
    model: FavoriteItem,
    url: '/api/v1/favorites'
});