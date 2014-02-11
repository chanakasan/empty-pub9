var FavoriteItemDetails = Backbone.View.extend({

    template: Handlebars.compile($('#favorites-details-template').text()),

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
        this.$el.html(this.template(this.model.attributes));
        this.delegateEvents({
            'click .btn-danger': 'deleteItem'
        });
        return this;
    }
});