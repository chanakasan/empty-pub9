window.FavoriteItemForm = Backbone.View.extend({

    template: Handlebars.compile($('#favorites-form-template').text()),

    render: function  () {
        this.$el.html(this.template());
        this.delegateEvents({
            'click .btn-primary': 'save'
        });
        return this;
    },

    save: function () {
        this.setModelData();

        this.model.save(this.model.attributes,
            {
                success: function (model) {
                    app.favorites.add(model);
                    app.navigate('favorites/' + model.get('name'), {trigger: true});
                }
            }
        );
    },

    setModelData: function  () {
        this.model.set({
            name: this.$el.find('input[name="name"]').val(),
            tags: this.$el.find('input[name="tags"]').val(),
            id: null,
            url: this.$el.find('input[name="url"]').val()
        });
    }

});
