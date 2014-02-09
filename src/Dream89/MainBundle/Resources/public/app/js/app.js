var AppRouter = Backbone.Router.extend({
    routes: {
        "app_dev.php": "list",
        "app_dev.php/favorites/:item": "itemDetails"
    },

    initialize: function  () {
        this.favorites = new Favorites();

        this.favoriteItemModel = new FavoriteItem();
        this.favoriteItemView = new FavoriteItemDetails(
            {
                model: this.favoriteItemModel
            }
        );

        // Fetch items
        this.favorites.fetch();
        this.favoritesView = new FavoritesView({collection: this.favorites});
        $('#app').html(this.favoritesView.render().el);
    },

    list: function () {
        $('#app').html(this.favoritesView.render().el);
    },

    itemDetails: function (item) {
        this.favoriteItemView.model = this.favorites.get(item);
        $('#app').html(this.favoriteItemView.render().el);
    }
});

var app = new AppRouter();

$(function() {
    Backbone.history.start();
});