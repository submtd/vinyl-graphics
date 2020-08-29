require('./bootstrap.js');

let app = new vue({

    el: '#app',

    data: {
        colors: [],
        borderColors: [],
        fonts: [],
        selectedColor: null,
        selectedBorderColor: null,
        selectedFont: null,
        text: '',
        quantity: 1
    },

    computed: {

        color: function() {
            var app = this;
            return this.colors.find(function(color) {
                return color.id === app.selectedColor;
            });
        },

        borderColor: function() {
            var app = this;
            return this.colors.find(function(color) {
                return color.id === app.selectedBorderColor;
            });
        },

        font: function() {
            var app = this;
            return this.fonts.find(function(font) {
                return font.id === app.selectedFont;
            });
        },

        price: function() {
            var chars = this.text.length;
            return (chars * this.color.attributes.cost_per_character) + (chars * this.borderColor.attributes.border_cost_per_character) * this.font.attributes.cost_multiplier * this.quantity;
        }

    },

    watch: {

        color: function() {
            this.updateFontAttributes();
        },

        borderColor: function() {
            this.updateFontAttributes();
        },

        font: function() {
            this.updateFontAttributes();
        }

    },

    mounted() {
        this.getColors();
        this.getFonts();
        this.updateFontAttributes();
    },

    methods: {

        getColors() {
            var app = this;
            axios.get('/api/v1/colors').then(response => {
                response.data.data.forEach(function(item) {
                    if(app.selectedColor == null && item.attributes.enabled_for_color) {
                        app.selectedColor = item.id;
                    }
                    else if(app.selectedBorderColor == null && item.attributes.enabled_for_border) {
                        app.selectedBorderColor = item.id;
                    }
                    if(item.attributes.enabled_for_color) {
                        app.colors.push(item);
                    }
                    if(item.attributes.enabled_for_border) {
                        app.borderColors.push(item);
                    }
                });
            }).catch(error => {
                console.log(error);
            });
        },

        getFonts() {
            var app = this;
            axios.get('/api/v1/fonts').then(response => {
                response.data.data.forEach(function(item) {
                    if(app.selectedFont == null) {
                        app.selectedFont = item.id;
                    }
                    app.fonts.push(item);
                });
            }).catch(error => {
                console.log(error);
            });
        },

        updateFontAttributes() {
            var svg = document.querySelector('svg');
            var text = svg.getElementById('text');
            text.setAttribute('fill', this.color.attributes.color_code);
            text.setAttribute('stroke', this.borderColor.attributes.color_code);
        }
    }

});
