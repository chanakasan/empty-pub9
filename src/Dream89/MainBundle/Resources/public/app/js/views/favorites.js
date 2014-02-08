var FavoritesView = Backbone.View.extend({

    initialize: function  () {
        this.listenTo(this.collection, "reset", this.render);
        this.listenTo(this.collection, "add", this.render);
        this.listenTo(this.collection, "remove", this.render);
    },

    render: function () {
        this.$el.html(Handlebars.templates.menu(this.collection));
        return this;
    }

});