window.FavoritesView = Backbone.View.extend({

    template: Handlebars.compile($('#favorites-list-template').text()),

    initialize: function () {
        this.listenTo(this.collection, "reset", this.render);
        this.listenTo(this.collection, "add", this.render);
        this.listenTo(this.collection, "remove", this.render);
    },

    render: function () {
        this.$el.html(this.template(this.collection));
        return this;
    }

});