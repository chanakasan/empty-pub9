window.BtnView = Backbone.View.extend({
    events: {
        'click': 'add'
    },

    initialize: function() {
        _.bindAll(this);
    },
    add: function(){alert('added')}
});