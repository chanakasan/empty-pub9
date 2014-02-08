var FavoriteItemDetails = Backbone.View.extend({


    initialize: function  () {
        this.listenTo(this.model, "change", this.render);
    },

    deleteItem: function () {
        this.model.destroy(
            {
                success: function (model) {
                    app.favorites.remove(model.get('id'));
                    app.navigate("", {trigger: true});
                }
            }
        );
    },

    render: function () {
        this.$el.html(Handlebars.templates.details(this.model.attributes));
        this.delegateEvents({
            'click .btn-danger': 'deleteItem'
        });
        return this;
    }
});