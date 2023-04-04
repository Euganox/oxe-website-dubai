(function($, window, document) {
    
    var pluginName = 'fatNav',
    defaults = {};
    
    function Plugin(options) {
        this.settings = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }

    function getLocale() {
        let urlArr = document.location.pathname.split('/');

        if (urlArr[1] === 'ru' || urlArr[1] === 'RU') {
            return 'RU';
        } else {
            return 'EN'
        }
    }

    let nameMenu = getLocale() === 'RU' ? 'меню' : 'menu';

    $.extend(Plugin.prototype, {
        
        init: function() {

            var self = this;
            var $nav = this.$nav = $('.fat-nav');
            var $hamburger = this.$hamburger = $('<a class="hamburger"><div class="hamburger__icon"></div> <div class="hamburger__text fz-20-px">' + nameMenu + '</div></a>');
            
            this._bodyOverflow = $('body').css('overflow');
            
            $('.for-nav').append($hamburger);
            
            $().add($hamburger).add($nav.find('a')).on('click', function(e) {
                self.toggleNav();
            });
            
        },
        
        toggleNav: function() {
            
            var self = this;

            this.$nav.fadeToggle(400);
			
			self.toggleBodyOverflow();

            $().add(this.$hamburger).add(this.$nav).toggleClass('active');
        },
        
        toggleBodyOverflow: function() {
            
            var self = this;
			
			var $body = $('body');
            
            $body.toggleClass('no-scroll');
			
			var isNavOpen = $body.hasClass('no-scroll');

            $body.css('overflow', isNavOpen ? 'hidden' : self._bodyOverflow);
			
        }
        
    });
    
    if (typeof $[pluginName] === 'undefined') {
        
        $[pluginName] = function(options) {
            return new Plugin(this, options);
        };
        
    }

}(jQuery, window, document));